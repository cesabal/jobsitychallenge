<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hidden_tweets extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hidden_tweets';

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
    protected $fillable = ['tweetid', 'userid'];
}
