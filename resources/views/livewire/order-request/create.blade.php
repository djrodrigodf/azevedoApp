<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('orderRequest.item_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="item_name">{{ trans('cruds.orderRequest.fields.item_name') }}</label>
        <input class="form-control" type="text" name="item_name" id="item_name" required wire:model.defer="orderRequest.item_name">
        <div class="validation-message">
            {{ $errors->first('orderRequest.item_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderRequest.fields.item_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderRequest.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.orderRequest.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="orderRequest.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('orderRequest.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderRequest.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderRequest.required_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="required_date">{{ trans('cruds.orderRequest.fields.required_date') }}</label>
        <x-date-picker class="form-control" required wire:model="orderRequest.required_date" id="required_date" name="required_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('orderRequest.required_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderRequest.fields.required_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderRequest.requester_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="requester">{{ trans('cruds.orderRequest.fields.requester') }}</label>
        <x-select-list class="form-control" required id="requester" name="requester" :options="$this->listsForFields['requester']" wire:model="orderRequest.requester_id" />
        <div class="validation-message">
            {{ $errors->first('orderRequest.requester_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderRequest.fields.requester_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.order-requests.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>