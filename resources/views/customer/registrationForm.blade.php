@extends('layouts.login')

@section('pagetitle') Customer Registration @endsection	

@section('style')
<style type="text/css">

#Container{
    height: 580px;
    background: url(/images/bgreg.jpg);
    background-repeat: no-repeat;
    border-bottom: 6px solid #373940;
    background-position: bottom;
    background-size: cover;
}

#legend {
width: 355px;
    height: 100px;
    color: floralwhite;
    text-align: center;
    margin-top: 3%;
    margin-left: 38%;
}
	
#loginbox {
    height: 260px;
    width: 410px;
    top: 20%;
}

#validation {
	width: 290px;
    height: 195px;
    font-size: 18px;
    font-style: italic;
    margin-top: 119px;
    position: absolute;
    margin-left: 40%;
}

#footer{
    margin-top: 326px;
}
</style>
@endsection


@section('legend')
<h2>Not a member? Registration First!</h2>
@endsection

@section('content')
	<form method="post">
		{{csrf_field()}}
		
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="{{old('name')}}"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="{{old('email')}}"></td>
			</tr>
			<tr> 
				<td>Gender</td> 
				<td><input type="radio" name="gender"  value="Male" 
					@if(old('gender')=="Male") checked @endif> Male
					<input type="radio" name="gender"  value="Female" 
					@if(old('gender')=="Female") checked @endif> Female
					<input type="radio" name="gender"  value="Other" 
					@if(old('gender')=="Other") checked @endif> Other
				</td>
			</tr>
			<tr>
				<td>Date of birth</td>
				<td>
					<input style="text-align: center;"  name="dob" type="date" value="{{old('dob')}}"> </div>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="{{old('address')}}"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" value="{{old('phone')}}"></td> 
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="password" value="{{old('password')}}"></td> 
			</tr>
			<tr>
				<td>Retype Password</td>
				<td><input type="Password" name="password_confirmation" value="{{old('password_confirmation')}}"></td> 
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Registration"></td>
			</tr>
		</table>
 
	</form>
	@endsection

	@section('validation')

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

	@endsection
