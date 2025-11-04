<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cargo_name',
        'tracking_number',
        'weight',
        'origin_port',
        'destination_port',
        'status',
        'is_active',
    ];
}
