<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Clob\FormSubmission;
use Illuminate\Http\Request;
use Clob\Http\Requests\SaveForm;
use Clob\Http\Controllers\Controller;
use Clob\Repositories\Forms as FormRepository;
use Clob\Repositories\FormSubmissions as FormSubmissionRepository;

class FormController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Form Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles adding, editing and deleting forms using
    | the clob Admin.
    |
    */

    /**
     * The forms repository instance.
     */
    protected $forms;

    /**
     * The form submissions repository instance.
     */
    protected $submissions;

    protected const ALLOWED_FIELDS = [
        'title', 'slug', 'subtitle', 'markdown_content',
        'seo_title', 'seo_description', 'seo_image_url'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FormRepository $forms, FormSubmissionRepository $submissions)
    {
        $this->forms = $forms;
        $this->submissions = $submissions;

        $this->middleware('auth');
    }

    /**
     * Form Index
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $forms = $this->forms->paged();

        return view('admin.form.index', compact('forms'));
    }

    /**
     * Add New Form Page
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
    	return view('admin.form.add');
    }

    /**
     * Edit Form Page
     *
     * @param Post $form
     * @return \Illuminate\View\View
     */
    public function edit(Post $form)
    {
        return view('admin.form.edit')->with(compact('form'));
    }

    /**
     * Form Submissions Page
     *
     * @param Post $form
     * @return \Illuminate\View\View
     */
    public function submissions(Post $form)
    {
        $submissions = $this->submissions->paged($form);

        return view('admin.form.submissions')->with(compact('form', 'submissions'));
    }

    /**
     * Form Submission Show Page
     *
     * @param Post $form
     * @param FormSubmission $submission
     * @return \Illuminate\View\View
     */
    public function submission(Post $form, FormSubmission $submission)
    {
        return view('admin.form.submission')->with(compact('form', 'submission'));
    }

    /**
     * Insert a new form
     *
     * @param \Clob\Http\Requests\SaveForm $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaveForm $request)
    {
        $user = $request->user();
        $formData = $request->only(self::ALLOWED_FIELDS);

        $form = $this->forms->create($user, $formData);

        if($request->menu_label) {
            $form->menu_items()->create([
                'menuable_type' => 'form',
                'label' => $request->menu_label,
            ]);
        }

    	return redirect()->route('admin.form.index')->withStatus(trans('admin.form.add_success'));
    }

    /**
     * Update an existing form
     *
     * @param \Clob\Http\Requests\SaveForm $request
     * @param \Clob\Post $form
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaveForm $request, Post $form)
    {
        // Handle delete form request
        if($request->has('action') && $request->action === 'delete') {
            $this->forms->delete($form);

            return redirect()->route('admin.form.index')->withStatus(trans('admin.form.delete_success'));
        }

        $formData = $request->only(self::ALLOWED_FIELDS);
        $successMsg = trans('admin.form.edit_success');

        $this->forms->update($form, $formData);

        return redirect()->route('admin.form.index')->withStatus($successMsg);
    }
}
