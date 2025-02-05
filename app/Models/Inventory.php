<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_name',
        'serial_number',
        'sid_sidwan',
        'sid_connectivity',
        'customer_name',
        'hostname_edge',
        'edge_type',
        'qr_code',
    ];
}
