<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'title',
        'body',
        'user_id',
        'enabled',
        'slug',
        'image'
    ];
    

    public function user (){
        return $this->belongsTo(User::class);
    }
}
