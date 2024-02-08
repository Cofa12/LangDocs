<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
      'name',
      'email',
      'password',
      'image',
        'confirmation_token',
        'email_verified_at'
    ];

    public function post(){
        return $this->hasMany(Post::class,'admin_id');
    }
}
