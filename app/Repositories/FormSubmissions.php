<?php

namespace Clob\Repositories;

use Carbon\Carbon;
use Clob\FormSubmission;
use Clob\Post;
use Clob\Repositories\Options as OptionRepository;
use Clob\User;

class FormSubmissions extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Form Submissions Repository
    |--------------------------------------------------------------------------
    |
    | This class handles interacting with form submissions data in the database.
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
     * Get all form submissions, alphabetical by title.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return FormSubmission::all();
    }

    /**
     * Get paged form submissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paged(Post $form)
    {
    	return $form->form_submissions()->paginate(self::ITEMS_PER_PAGE);
    }

    /**
     * Create a new form submission.
     *
     * @param \Clob\Post $post
     * @param array $data
     * @return \Clob\FormSubmission
     */
    public function create(Post $post, $data)
    {
        $submission = new FormSubmission;
        $submission->name = $data['name'];
        $submission->email = $data['email'];
        $submission->message = $data['message'];
        $post->form_submissions()->save($submission);

        return $submission;
    }

    /**
     * Delete an existing form.
     *
     * @param \Clob\FormSubmission $submission
     * @return void
     */
    public function delete(FormSubmission $submission)
    {
        $submission->delete();
    }
}