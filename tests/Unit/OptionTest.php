<?php

namespace Tests\Unit;

use Clob\Option;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OptionTest extends TestCase
{
    /** @test */
    function can_get_description_trimmed()
    {
    	$post = factory(Option::class)->make([
	    	'description' => 'This is a sample description.
It has newlines to ensure that trimming is working.',
	    ]);

	    $expected = 'This is a sample description. It has newlines to ensure that trimming is working.';

	    $this->assertEquals($expected, $post->description_trimmed);
    }
}
