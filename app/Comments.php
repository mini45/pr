<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'news_id', 'comment'];

    public function news()
    {
        return $this->hasOne(News::class,'id','user_id');
    }

    public function author()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
