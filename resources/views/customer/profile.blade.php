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
    width: 420px;
    height: 370px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 5.6%;
    padding-top: 1.5%;
    margin-top: 6%;
    margin-left: 35%;
}

#validation {
    width: 0px;
    height: 0px;
}

</style>


	<table>
							

							<td colspan="2">
					@if($customerDetails->photo=="none")
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/default.jpg">
					@else
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/{{$customerDetails->photo}}">
					@endif
							</td>	

							<tr>
								<th>Name : </th>
								<td>{{$customerDetails->name}}</td>
							</tr>

							<tr>
								<th>Email : </th>
								<td>{{$customerDetails->email}}</td>
							</tr>

							<tr>
								<th>Gender : </th>
								<td>{{$customerDetails->gender}}</td>
							</tr>

							<tr>
								<th>Date of birth : </th>
								<td>{{$customerDetails->dob}}</td>
							</tr>

							<tr>
								<th>Address : </th>
								<td>{{$customerDetails->address}}</td>
							</tr>

							<tr>
								<th>Phone : </th>
								<td>{{$customerDetails->phone}}</td>
							</tr>

							<tr>
								<th>Join Date : </th>
								<td>{{$customerDetails->joinDate}}</td>
							</tr>

							<tr>
								<th></th>
									<td>
										<a  href="{{route('customerProfile.edit', ['id' => $customerDetails->userID])}}">Edit Profile</a>
									</td>
							</tr>
							
					</table>
					
					
@endsection
