@component('mail::message')
# @lang('blog.form.email_subject', ['title' => $submission->post->title])

**@lang('blog.form.name'):** {{ $submission->name }}<br>
**@lang('blog.form.email'):** {{ $submission->email }}

**@lang('blog.form.message'):**<br>
{{ $submission->message }}

@lang('blog.form.email_thanks')<br>
{{ config('app.name') }}
@endcomponent