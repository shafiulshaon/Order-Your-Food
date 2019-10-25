@extends('layouts.login')

@section('pagetitle') Reset Password @endsection	

@section('legend')
<h2>Chaneg Your Password</h2>
@endsection

@section('content')

<style type="text/css">
	
	#loginbox {
    padding-left: 2%;
}

#validation {
    margin-top: 310px;
}


</style>

	<form method="post">
		{{csrf_field()}}
		<input type="hidden" name="userID" value="{{$userDetails->userID}}">
		<table>

			<tr>
				<td>Enter New Password</td>
				<td><input type="password" name="password" value="{{old('password')}}" /></td>
			</tr>
			<tr>
				<td>Retype New Password</td>
				<td><input type="password" name="password_confirmation"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Change password" /></td>
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
