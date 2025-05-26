<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class EnterpriseService extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'service_name',
        'service_price',
        'enterprise_uuid'
    ];
}
