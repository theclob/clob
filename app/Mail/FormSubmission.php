<?php

namespace Clob\Mail;

use Clob\FormSubmission as FormSubmissionModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class FormSubmission extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The form submission instance.
     *
     * @var $submission
     */
    public $submission;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FormSubmissionModel $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to(config('mail.inbound_to.address'), config('mail.inbound_to.name'))
            ->replyTo($this->submission->email, $this->submission->name)
            ->subject(trans('blog.form.email_subject', ['title' => $this->submission->post->title]))
            ->markdown('email.blog.form.submission');
    }
}
