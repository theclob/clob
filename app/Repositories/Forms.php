<?php

namespace Clob\Repositories;

use Clob\Post;
use Clob\User;
use Carbon\Carbon;
use Clob\Repositories\Options as OptionRepository;

class Forms extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Forms Repository
    |--------------------------------------------------------------------------
    |
    | This class handles interacting with forms data in the database.
    |
    */
    protected const ITEMS_PER_PAGE = 10;

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
     * Get all forms, alphabetical by title.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Post::forms()->alpha()->get();
    }

    /**
     * Get paged forms in alphabetical order by title.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paged()
    {
    	return Post::forms()->alpha()->paginate(self::ITEMS_PER_PAGE);
    }

    /**
     * Set form data values from passed array.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\Post
     */
    private function setFormData(Post $post, $data)
    {
        $post->type = 'form';
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
     * Create a new form.
     *
     * @param \Clob\User $user
     * @param array $data
     * @return \Clob\Post
     */
    public function create(User $user, $data)
    {
        $post = $this->setFormData(new Post, $data);
        $user->posts()->save($post);

        return $post;
    }

    /**
     * Update an existing form.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\Post
     */
    public function update(Post $post, $data)
    {
        $post = $this->setFormData($post, $data);
        $post->save();

        return $post;
    }

    /**
     * Delete an existing form.
     *
     * @param \Clob\Post $post
     * @return void
     */
    public function delete(Post $post)
    {
        $post->delete();
    }
}