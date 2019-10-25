@extends('layouts.login')

@section('pagetitle') Food Town | Login @endsection	


@section('legend')
<h2>Login Here</h2>
@endsection

@section('content')

	<form method="post">
		{{csrf_field()}}
		<table>
			<tr>
				<td>Email</td>
				<td><input type="text" value="{{old('email')}}" name="email"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" value="{{old('password')}}" name="password"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" /></td>
			</tr>
			<tr>
				<td></td>
				<td> Forget password? <a id="tablehref" href="{{route('resetpassword')}}">Reset!</a></td>
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
