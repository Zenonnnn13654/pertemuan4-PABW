<?php

namespace App\Models;

use app\models\parkingslot;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable = [
        'nama_area',
        'lokasi',
        'kapasitas',
    ];

    public function parkingSlots()
    {
        return $this->hasMany(ParkingSlot::class);
    }
}