<?php

namespace Clob;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
	/**
     * Post this submission belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post()
    {
    	return $this->belongsTo('Clob\Post');
    }
}
