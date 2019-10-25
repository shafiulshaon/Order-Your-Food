@extends('layouts.login')

@section('pagetitle') Customer Registration @endsection	

@section('style')
<style type="text/css">

#Container{
    height: 595px;
    background: url(/images/bgres.jpg);
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
    position: absolute;
    margin-top: 2%;
    margin-left: 38%;
}
	
#loginbox {
    height: 275px;
    width: 380px;
    top: 15%;
}

#validation {
    width: 290px;
    height: 210px;
    font-size: 18px;
    font-style: italic;
    margin-top: 100px;
    position: absolute;
    margin-left: 40%;
    color: red;
}

#footer{
    margin-top: 326px;
    height: 9%;
}
</style>
@endsection


@section('legend')
<h2>Open your restaurant online!</h2>
@endsection

@section('content')
	<form method="post">
		{{csrf_field()}}
		
		<table>
			<tr>
				<td>Restaurant Name</td>
				<td><input type="text" name="restaurantName" value="{{old('restaurantName')}}"></td>
			</tr>
			<tr> 
				<td>Branch</td> 
				<td><input type="text" name="branch" value="{{old('branch')}}"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="{{old('email')}}"></td>
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
				<td>Owner Name</td>
				<td><input type="text" name="owner" value="{{old('owner')}}"></td>
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
				<td><input type="checkbox" name="delivery" value="delivery" required> I Have Delivery Facility</td>
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
