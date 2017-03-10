<?php

namespace Clob\Repositories;

use Clob\Post;
use Clob\User;
use Carbon\Carbon;
use Clob\Repositories\Options as OptionRepository;

class Pages extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Pages Repository
    |--------------------------------------------------------------------------
    |
    | This class handles interacting with pages data in the database.
    |
    */

    /**
     * Repository constructor
     * Inject the OptionRepository so we can read options from the database.
     *
     * @param \Clob\Repositories\Options $options
     * @return void
     */
    public function __construct(OptionRepository $options)
    {
        $this->options = $options->getBlogSettings();
    }

    /**
     * Get all pages in alphabetical order by title.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
    	return Post::pages()->alpha()->get();
    }

    /**
     * Set page data values from passed array.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\Post
     */
    private function setPageData(Post $post, $data)
    {
        $post->type = 'page';
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->subtitle = $data['subtitle'];
        $post->markdown_content = $data['markdown_content']; // The PostObserver class auto-converts this to HTML
        $post->seo_title = $data['seo_title'];
        $post->seo_description = $data['seo_description'];
        $post->seo_image_url = $data['seo_image_url'];

        return $post;
    }

    /**
     * Create a new page.
     *
     * @param \Clob\User $user
     * @param array $data
     * @return \Clob\Post
     */
    public function create(User $user, $data)
    {
        $post = $this->setPageData(new Post, $data);
        $user->posts()->save($post);

        return $post;
    }

    /**
     * Update an existing page.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\Post
     */
    public function update(Post $post, $data)
    {
        $post = $this->setPageData($post, $data);
        $post->save();

        return $post;
    }

    /**
     * Delete an existing page.
     *
     * @param \Clob\Post $post
     * @return void
     */
    public function delete(Post $post)
    {
        $post->delete();
    }
}