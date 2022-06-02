<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryHotel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotels_id', 'id');
    }
}
