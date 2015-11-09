<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';

    protected $fillable = ['user_id', 'heading', 'text'];

    public function author()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

}
