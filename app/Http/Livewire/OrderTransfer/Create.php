<?php

namespace App\Http\Livewire\OrderTransfer;

use App\Models\OrderTransfer;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public OrderTransfer $orderTransfer;

    public function mount(OrderTransfer $orderTransfer)
    {
        $this->orderTransfer = $orderTransfer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.order-transfer.create');
    }

    public function submit()
    {
        $this->validate();

        $this->orderTransfer->save();

        return redirect()->route('admin.order-transfers.index');
    }

    protected function rules(): array
    {
        return [
            'orderTransfer.item' => [
                'string',
                'required',
            ],
            'orderTransfer.date_request' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'orderTransfer.request_by_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'orderTransfer.approver_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['request_by']  = User::pluck('name', 'id')->toArray();
        $this->listsForFields['approver_by'] = User::pluck('name', 'id')->toArray();
    }
}
