<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'image';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path', 'user'];

    public function tags()
    {
        return $this->hasMany(Tags::class,'image');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getDescription()
    {
        $desc = '';

        foreach($this->tags()->get() as $tag){
            $desc.= $tag->value.' <br>';
        }

        $desc.= 'Hochgeladen am '.$this->created_at;

        return $desc;
    }
}
