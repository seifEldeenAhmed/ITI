<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User ;
class SocialUser extends Model
{
    use HasFactory;
    protected $fillable=[
        'provider',
        'provider_user_id',
        'token'
    ];


    // public function user(){
    //     return $this->hasOne(User::class);
    // }
}
