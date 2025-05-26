<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'payment_method',
        'payment_report_generated_counter',
        'payment_file',
        'enterprise_service_uuid ',
        'customer_uuid'
    ];
}
