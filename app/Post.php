<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'image', 'body', 'title'
    ];
    public $rules = [
      'user_id'=>'required|exists:users,id',
      'category_id'=>'required|exists:post_categories,id',
      'title'=>'required|min:10',
      'body'=>'required',
      'image'=>'image'
    ];
    public function category(){

        return $this->belongsTo(PostCategory::class, 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
