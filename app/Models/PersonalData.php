<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'fullname',
        'birthday',
        'phone_number',
        'address',
        'customer_uuid',
        'employee_uuid',
    ];

    public function employee () {
        return $this->belongsTo(Employee::class, 'employee_uuid', 'uuid');
    }

      public function customer () {
        return $this->belongsTo(Customer::class, 'customer_uuid', 'uuid');
    }
}
