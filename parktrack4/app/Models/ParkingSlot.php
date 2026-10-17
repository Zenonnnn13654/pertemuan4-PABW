<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    protected $table = 'parking_slots';

    protected $fillable = [
        'area_id',
        'kode_slot',
        'status',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}