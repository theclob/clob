<?php

namespace Clob;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function menuable()
    {
    	return $this->morphTo('menuable');
    }
}
