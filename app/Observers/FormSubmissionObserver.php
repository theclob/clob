<?php

namespace Clob\Observers;

use Clob\FormSubmission;
use Clob\Mail\FormSubmission as FormSubmissionMailer;
use Illuminate\Support\Facades\Mail;

class FormSubmissionObserver
{
	/**
	 * Send email notification of form submission
	 *
	 * @param \Clob\formSubmission $submission
	 * @return void
	 */
	public function creating(FormSubmission $submission)
	{
		Mail::send(new FormSubmissionMailer($submission));
	}
}