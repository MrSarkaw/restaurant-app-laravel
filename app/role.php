<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class role extends Model
{
    
    protected $fillable=['name'];

    public function users()
    {
        return $this->hasOne(User::class, 'role_id');
    }



}
