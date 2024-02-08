<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'history',
        'post_background',
        'admin_id',
        'tags',
        'admin_id',
        'docs_link'
    ];

    public function tag(){
        return $this->hasMany(Tag::class,'post_id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
}
