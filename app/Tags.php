<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Tags extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'user', 'image'];


    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
