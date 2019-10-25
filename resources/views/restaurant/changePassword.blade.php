@extends('layouts.defaultHome')

@section('pagetitle') Change Password | Restaurant @endsection

@section('profile') <a href="{{route('restaurantProfile')}}">Profile</a> @endsection

@section('item') <a href="{{route('restaurantItem')}}">Item</a> @endsection

@section('order') <a href="{{route('restaurantOrder')}}">Order</a> @endsection

@section('changePass') <a href="{{route('restaurantChangePass.edit', ['id' => $currentInfo->userID])}}}">Change Password</a> @endsection

@section('logout') <a href="{{route('logout')}}">Logout</a> @endsection

@section('content')

<style type="text/css">
	table, tr, td, a{
color: black;
    padding-top: 10px;
    font-size: 16px;
     border-collapse: collapse;
}
#welcomebox {
    width: 420px;
    height: 250px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 3.5%;
    padding-top: 1.5%;
    margin-top: 3%;
    margin-left: 35%;
}

#validation {
width: 416px;
    height: 220px;
    font-size: 18px;
    font-style: italic;
    margin-top: 319px;
    position: absolute;
    margin-left: 35%;
    color: black;
    text-align: center;
}

</style>


	<form method="post">
		{{csrf_field()}}

	<input type="hidden" name="thisPassword" value="{{$currentInfo->password}}">

	<input type="hidden" name="userID" value="{{$currentInfo->userID}}">

	<table>
							
		<tr>
				<td colspan="2">
				<h2>Change Password</h2>
				</td>
		</tr>
		<tr>
				<th>Current Password : </th>
				<td>
					<input type="password" value="{{old('currentPassword')}}" name="currentPassword" >
				</td>
			</tr>
			<tr>
				<th>New Password : </th>
				<td>
					<input type="password" value="{{old('password')}}" name="password">
				</td>
			</tr>
			<tr>
				<th>Retype New Password : </th>
				<td>
					<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" >
				</td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" value="Change"></td>
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