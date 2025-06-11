<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

     public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
/*
     public function tag(){
        return $this->belongsToMany('App\Tag', 'post_tag');
    }
*/

protected function image(): Attribute{
    return Attribute::make(
        get: fn($value)=> asset('storage/'.$this->thumnail),
    );
}
   
 public function displayDate(){
        return $this->created_at->format('F d, Y');
    }
}
