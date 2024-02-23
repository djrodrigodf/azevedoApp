<?php

namespace App\Http\Requests;

use App\Models\OrderTransfer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderTransferRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('order_transfer_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'item' => [
                'string',
                'required',
            ],
            'date_request' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'request_by_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'approver_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
