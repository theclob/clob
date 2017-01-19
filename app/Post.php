<?php

namespace Clob;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
    	return $this->belongsTo('Clob\User');
    }
}
