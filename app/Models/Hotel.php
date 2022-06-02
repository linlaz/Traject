<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function galleries_hotel(){
        return $this->hasMany(GalleryHotel::class, 'hotels_id', 'id');
    }
}
