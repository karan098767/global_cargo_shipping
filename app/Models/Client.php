<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'address',
        'country',
        'is_active',
    ];

    // A client can have many shipments
    public function shipments()
    {
        return $this->belongsTo(Shipment::class);
    }
}
