<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entries';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'author'];

    public function author()
    {
        return $this->belongsTo('App\User', 'id', 'author');
    }
    
}
