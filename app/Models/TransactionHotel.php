<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHotel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function hotel(){
        return $this -> belongsTo(Hotel::class, 'hotels_id', 'id');
    }

    public function user(){
        return $this -> belongsTo(User::class, 'users_id', 'id');
    }
}
