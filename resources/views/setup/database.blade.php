@extends('setup.layout', ['title' => 'Database Setup', 'step' => 1])

@section('content')		
	<p>Welcome to <strong>clob</strong>! Let's get you up and running.</p>
	<p>First, we need to make sure your database is configured correctly so we can install some tables. Below are the environment variables we've detected on your Web server that point to your database. Please review these details and make sure they're correct.</p>	
@endsection

@section('table')
	<table class="table table-bordered">
		<colgroup>
			<col style="width:50%">
			<col style="width:50%">
		</colgroup>
		<tbody>
			@foreach($vars as $var)
				<tr>
					<td><strong>{{ $var }}</strong></td>
					<td class="text-right">{{ env($var) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('after-table')
	<p>If the above information looks correct, click <strong>Next</strong> and we'll install clob's tables in your database. Otherwise, please change your Web server's environment variables to the correct values and <a href="{{ url()->current() }}">try again</a>.</p>
@endsection

@section('footer')
	<a href="{{ route('setup.database') }}" class="btn btn-primary">Next &raquo;</a>
@endsection