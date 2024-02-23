<?php

namespace App\Http\Requests;

use App\Models\OrderRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('order_request_create'),
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
            'item_name' => [
                'string',
                'required',
            ],
            'amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'required_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'requester_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }
}
