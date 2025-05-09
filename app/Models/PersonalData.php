<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasUuids;
    protected $fillable = [
        'fullname',
        'birthday',
        'phone_number',
        'address',
        'customer_uuid',
        'employee_uuid',
    ];
}
