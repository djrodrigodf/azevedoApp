<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTransfer extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'order_transfers';

    protected $fillable = [
        'item',
        'date_request',
        'request_by_id',
        'approver_by_id',
    ];

    protected $dates = [
        'date_request',
        'date_processed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $orderable = [
        'id',
        'item',
        'date_request',
        'date_processed',
        'cost_center',
        'request_by.name',
        'approver_by.name',
    ];

    public $filterable = [
        'id',
        'item',
        'date_request',
        'date_processed',
        'cost_center',
        'request_by.name',
        'approver_by.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateRequestAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateRequestAttribute($value)
    {
        $this->attributes['date_request'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateProcessedAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDateProcessedAttribute($value)
    {
        $this->attributes['date_processed'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function requestBy()
    {
        return $this->belongsTo(User::class);
    }

    public function approverBy()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
