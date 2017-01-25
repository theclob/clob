<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Clob\Post;
use Clob\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PostTest extends TestCase
{
	protected const HTML_LOREM = <<<STR
<h1>Lorem ipsum dolor sit amet.</h1>
<p>Consectetur <code>adipisicing elit</code>, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation <em>ullamco</em> laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in <strong>reprehenderit</strong> in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
STR;

	/** @test */
	function can_get_published_at_formatted()
	{
	    $post = factory(Post::class)->make([
	    	'published_at' => Carbon::parse('2016-12-25 8:15pm'),
	    ]);

	    $this->assertEquals('December 25, 2016', $post->published_at_formatted);
	}

	/** @test */
	function can_get_published_at_long_formatted()
	{
	    $post = factory(Post::class)->make([
	    	'published_at' => Carbon::parse('2016-12-25 8:15pm'),
	    ]);

	    $this->assertEquals('25th December 2016 @ 8:15pm', $post->published_at_long_formatted);
	}

	/** @test */
	function can_get_published_at_feed_format()
	{
	    $post = factory(Post::class)->make([
	    	'published_at' => Carbon::parse('2016-12-25 8:15pm'),
	    ]);

	    $this->assertEquals('Sun, 25 Dec 2016 20:15:00 +0000', $post->published_at_feed_format);
	}

	/** @test */
	function can_get_published_at_opengraph_format()
	{
	    $post = factory(Post::class)->make([
	    	'published_at' => Carbon::parse('2016-12-25 8:15pm'),
	    ]);

	    $this->assertEquals('2016-12-25T20:15:00+00:00', $post->published_at_opengraph_format);
	}

	/** @test */
	function can_get_updated_at_opengraph_format()
	{
	    $post = factory(Post::class)->make([
	    	'updated_at' => Carbon::parse('2016-12-25 8:15pm'),
	    ]);

	    $this->assertEquals('2016-12-25T20:15:00+00:00', $post->updated_at_opengraph_format);
	}

	/** @test */
	function can_get_snippet()
	{
	    $post = factory(Post::class)->make([
	    	'html_content' => self::HTML_LOREM
	    ]);

	    $expected = 'Lorem ipsum dolor sit amet.
Consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in volup...';

	    $this->assertEquals($expected, $post->snippet);
	}

	/** @test */
	function can_get_title_opengraph()
	{
	    $post = factory(Post::class)->make([
	    	'title' => 'Lorem ipsum dolor sit amet. Consectetur adipisicing elit, '
	    	. 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
	    	. 'Ut enim ad minim veniam, quis no'
	    ]);

	    $expected = 'Lorem ipsum dolor sit amet. Consectetur adipisicing elit,...';

	    $this->assertEquals($expected, $post->title_opengraph);
	}

	/** @test */
	function can_get_html_content_opengraph()
	{
	    $post = factory(Post::class)->make([
	    	'html_content' => self::HTML_LOREM
	    ]);

	    $expected = 'Lorem ipsum dolor sit amet. Consectetur adipisicing elit, '
	    	. 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
	    	. 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris '
	    	. 'nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in '
	    	. 'reprehenderit in voluptate velit esse c...';

	    $this->assertEquals($expected, $post->html_content_opengraph);
	}

	/** @test */
	function can_get_html_content_meta_description()
	{
	    $post = factory(Post::class)->make([
	    	'html_content' => self::HTML_LOREM
	    ]);

	    $expected = 'Lorem ipsum dolor sit amet. Consectetur adipisicing elit, '
	    	. 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
	    	. 'Ut enim ad minim veniam, quis no...';

	    $this->assertEquals($expected, $post->html_content_meta_description);
	}
}