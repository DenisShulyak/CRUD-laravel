<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{

    public $rules =[
      'name'=>'required|min:5',
      'user_id'=>'required|exists:users,id'
    ];

    protected $fillable=[
        'name', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);

    }
}
