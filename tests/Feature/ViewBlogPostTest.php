<?php

namespace Tests\Feature;

use Clob\Post;
use Clob\User;
use Clob\Option;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ViewBlogPostTest extends TestCase
{
	use DatabaseMigrations;

	protected $user;
	protected $options;

	public function setUp()
	{
		parent::setUp();

		$this->user = factory(User::class)->create();
		$this->options = factory(Option::class)->create();
	}

   /** @test */
   function user_can_view_published_blog_post()
   {
    	$post = factory(Post::class)->states('published')->create([
       		'user_id' => $this->user->id,
       	]);

       	$response = $this->get('/' . $post->slug);

       	$response->assertStatus(200);
   }

   /** @test */
   function user_cannot_view_unpublished_blog_post()
   {
		$post = factory(Post::class)->states('unpublished')->create([
			'user_id' => $this->user->id,
		]);

		$response = $this->get('/' . $post->slug);

		$response->assertStatus(404);
   }

   /** @test */
   function user_cannot_view_future_blog_post()
   {
		$post = factory(Post::class)->states('future')->create([
			'user_id' => $this->user->id,
		]);

		$response = $this->get('/' . $post->slug);

		$response->assertStatus(404);
   }
}