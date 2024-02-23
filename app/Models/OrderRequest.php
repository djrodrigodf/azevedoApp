<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderRequest extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'order_requests';

    protected $fillable = [
        'item_name',
        'amount',
        'required_date',
        'requester_id',
    ];

    protected $dates = [
        'required_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $orderable = [
        'id',
        'item_name',
        'amount',
        'required_date',
        'requester.name',
    ];

    public $filterable = [
        'id',
        'item_name',
        'amount',
        'required_date',
        'requester.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getRequiredDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setRequiredDateAttribute($value)
    {
        $this->attributes['required_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function requester()
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
