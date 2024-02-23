<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('orderTransfer.item') ? 'invalid' : '' }}">
        <label class="form-label required" for="item">{{ trans('cruds.orderTransfer.fields.item') }}</label>
        <textarea class="form-control" name="item" id="item" required wire:model.defer="orderTransfer.item" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('orderTransfer.item') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderTransfer.fields.item_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderTransfer.date_request') ? 'invalid' : '' }}">
        <label class="form-label required" for="date_request">{{ trans('cruds.orderTransfer.fields.date_request') }}</label>
        <x-date-picker class="form-control" required wire:model="orderTransfer.date_request" id="date_request" name="date_request" picker="date" />
        <div class="validation-message">
            {{ $errors->first('orderTransfer.date_request') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderTransfer.fields.date_request_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderTransfer.request_by_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="request_by">{{ trans('cruds.orderTransfer.fields.request_by') }}</label>
        <x-select-list class="form-control" required id="request_by" name="request_by" :options="$this->listsForFields['request_by']" wire:model="orderTransfer.request_by_id" />
        <div class="validation-message">
            {{ $errors->first('orderTransfer.request_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderTransfer.fields.request_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderTransfer.approver_by_id') ? 'invalid' : '' }}">
        <label class="form-label" for="approver_by">{{ trans('cruds.orderTransfer.fields.approver_by') }}</label>
        <x-select-list class="form-control" id="approver_by" name="approver_by" :options="$this->listsForFields['approver_by']" wire:model="orderTransfer.approver_by_id" />
        <div class="validation-message">
            {{ $errors->first('orderTransfer.approver_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderTransfer.fields.approver_by_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.order-transfers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>