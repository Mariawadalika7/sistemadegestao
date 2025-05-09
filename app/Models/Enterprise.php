<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Enterprise extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'enterprise_name',
        'phone_number',
        'email',
        'address',
        'logo',
    ];
}
