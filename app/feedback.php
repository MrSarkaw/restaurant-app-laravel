<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class feedback extends Model
{
    protected $fillable=['feedback','user_id'];

    public function user(){
        return $this->belongTo(User::class,'user_id');
    }
}
