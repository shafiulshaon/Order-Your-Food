@extends('layouts.defaultHome')

@section('pagetitle') Edit Profile | Restaurant @endsection

@section('profile') <a href="{{route('restaurantProfile')}}">Profile</a> @endsection

@section('item') <a href="{{route('restaurantItem')}}">Item</a> @endsection

@section('order') <a href="{{route('restaurantOrder')}}">Order</a> @endsection

@section('changePass') <a href="{{route('restaurantChangePass.edit', ['id' => $restaurantDetails->userID])}}}">Change Password</a> @endsection

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
    width: 440px;
    height: 520px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 3.5%;
    margin-top: 2%;
    margin-left: 35%;
}

#validation {
	width: 320px;
    height: 78px;
    color: #e42828;
    padding-top: 3px;
    margin-top: 15%;
    left: 450px;
}

</style>

<h2 style="position: relative; left: -20px;">Edit Profile</h2>
	<form method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="userID" value="{{$restaurantDetails->userID}}">  
		<input type="hidden" name="logo" value="{{$restaurantDetails->logo}}">  
		<table>
			<tr>
				<td>
					@if($restaurantDetails->logo=="none")
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/default.jpg">
					@else
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/{{$restaurantDetails->logo}}">
					@endif
				</td>
				<td>
					<input type="file" name="file" accept="image/*">
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="restaurantName" value="{{$restaurantDetails->restaurantName}}"></td>
			</tr>
			<tr>
				<td>Branch</td>
				<td><input type="text" name="branch" value="{{$restaurantDetails->branch}}"></td>
			</tr>
			<tr>
				<td>Owner Name</td>
				<td><input type="text" name="owner" value="{{$restaurantDetails->ownerName}}"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="{{$restaurantDetails->email}}"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="{{$restaurantDetails->address}}"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" value="{{$restaurantDetails->phone}}"></td>
			</tr>
			<tr>
				<td>Opening Time</td>
				<td>
					<input type="number" name="openhh" min="1" max="12" placeholder="HH" 
					@if($restaurantDetails->openTime!="N/A") value="{{$openTime[0]}}" @endif> :
					<input type="number" name="openmm" min="0" max="12" placeholder="HH" 
					@if($restaurantDetails->openTime!="N/A") value="{{$openTime[1]}}" @endif> -
					<select name="openPeriod"> 
               	 	<option selected disabled>AM/PM</option>
                	<option @if($openTime[2]=="AM") selected @endif value="AM">AM </option>
                	<option @if($openTime[2]=="PM") selected @endif value="PM">PM</option>
                	</select>
				</td>
			</tr>
			<tr>
				<td>Closing Time</td>
				<td>
					<input type="number" name="closehh" min="1" max="12" placeholder="HH" 
					@if($restaurantDetails->closeTime!="N/A") value="{{$closeTime[0]}}" @endif> :
					<input type="number" name="closemm" min="0" max="12" placeholder="HH" 
					@if($restaurantDetails->closeTime!="N/A") value="{{$closeTime[1]}}" @endif> -
					<select name="closePeriod"> 
               	 	<option selected disabled>AM/PM</option>
                	<option @if($closeTime[2]=="AM") selected @endif value="AM">AM </option>
                	<option @if($closeTime[2]=="PM") selected @endif value="PM">PM</option>
                	</select>
				</td>
			</tr>
			<tr>
				<td>Service</td>
				<td>
					<select name="status"> 
               	 	<option selected disabled>open/close</option>
                	<option @if($restaurantDetails->status=="open") selected @endif value="open">Open </option>
                	<option @if($restaurantDetails->status=="close") selected @endif value="close">Close</option>
                	</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
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

 
 