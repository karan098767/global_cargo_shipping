<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;


    protected $fillable = [
      'name',
       'registration_number',
       'capacity_in_tonnes',
       'type',
       'status',
    ];
    public function crew()
    {
        return $this->belongsTo(Crew::class, 'ship_id');
    }
}
                      