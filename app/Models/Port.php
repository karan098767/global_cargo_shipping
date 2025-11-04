<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'code',
        'location',
        'is_active',
    ];

    // Optional: relationships (if shipments reference ports)
    public function shipmentsOrigin()
    {
        return $this->belongTo(Shipment::class, 'origin_port_id');
    }

    public function shipmentsDestination()
    {
        return $this->belongTo(Shipment::class, 'destination_port_id');
    }
}
