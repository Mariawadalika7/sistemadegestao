<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class EnterpriseService extends Model
{
    use HasUuids;

    protected $fillable = [
        'service_name',
        'service_price',
        'enterprise_uuid'
    ];
}
