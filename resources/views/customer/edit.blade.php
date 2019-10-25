@extends('layouts.defaultHome')

@section('pagetitle') Customer | Home @endsection

@section('profile') <a href="{{route('customerHome')}}">Home</a> @endsection

@section('item') <a href="{{route('customerItem')}}">Item</a> @endsection

@section('order') <a href="{{route('customerCart&Order')}}">Cart & Order</a> @endsection

@section('changePass') <a href="{{route('customerChangePass.edit', ['id' => $customerDetails->userID])}}}">Change Password</a> @endsection

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
    height: 425px;
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
    margin-top: 32%;
    left: -15px;
}

</style>

<h2 style="position: relative; left: -20px;">Edit Profile</h2>
	<form method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name="userId" value="{{$customerDetails->userID}}">  
		<input type="hidden" name="photo" value="{{$customerDetails->photo}}">  
		<table>
			<tr>
				<td>
					@if($customerDetails->photo=="none")
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/default.jpg">
					@else
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/{{$customerDetails->photo}}">
					@endif
				</td>
				<td>
					<input type="file" name="file" accept="image/*">
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="{{$customerDetails->name}}"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="{{$customerDetails->email}}"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="radio" name="gender"  value="Male" 
					@if($customerDetails->gender=="Male") checked @endif> Male
					<input type="radio" name="gender"  value="Female" 
					@if($customerDetails->gender=="Female") checked @endif> Female
					<input type="radio" name="gender"  value="Other" 
					@if($customerDetails->gender=="Other") checked @endif> Other
				</td>
			</tr>
			<tr>
				<td>Date of birth</td>
				<td>
					<input style="text-align: center;" name="dob" type="date" value="{{$customerDetails->dob}}"> </div>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="{{$customerDetails->address}}"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" value="{{$customerDetails->phone}}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Save"></td>
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

 
 