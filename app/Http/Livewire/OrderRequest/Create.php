<?php

namespace App\Http\Livewire\OrderRequest;

use App\Models\OrderRequest;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public OrderRequest $orderRequest;

    public function mount(OrderRequest $orderRequest)
    {
        $this->orderRequest = $orderRequest;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.order-request.create');
    }

    public function submit()
    {
        $this->validate();

        $this->orderRequest->save();

        return redirect()->route('admin.order-requests.index');
    }

    protected function rules(): array
    {
        return [
            'orderRequest.item_name' => [
                'string',
                'required',
            ],
            'orderRequest.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'orderRequest.required_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'orderRequest.requester_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['requester'] = User::pluck('name', 'id')->toArray();
    }
}
