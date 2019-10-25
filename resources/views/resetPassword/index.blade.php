@extends('layouts.login')

@section('pagetitle') Reset Password @endsection	

@section('legend')
<h2>Reset Password</h2>
@endsection

@section('content')

<style type="text/css">
	
	#loginbox {
    padding-left: 2%;
}

</style>

	<form method="post">
		{{csrf_field()}}
		<table>
			<br>
			<br>
			<tr>
				<td>Enter Your Email</td>
				<td><input type="text" name="email"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Send Reset Link" /></td>
			</tr>
		</table>
	</form>
	@endsection

	@section('validation')
		@if(session('message'))
		<ul>
				<li>{{session('message')}}</li>
		</ul>
	@endif

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

	@endsection
