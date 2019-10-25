@extends('layouts.defaultHome')

@section('pagetitle') Profile | Restaurant @endsection

@section('profile') <a href="{{route('restaurantHome')}}">Home</a> @endsection

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
    width: 420px;
    height: 485px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 5%;
    padding-top: 1.5%;
    margin-top: 3%;
    margin-left: 35%;
}

#validation {
    width: 0px;
    height: 0px;
}

</style>


	<table>
							
							<td colspan="2">
					@if($restaurantDetails->logo=="none")
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/default.jpg">
					@else
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/{{$restaurantDetails->logo}}">
					@endif
							</td>	

							<tr>
								<th>Restaurant Name : </th>
								<td>{{$restaurantDetails->restaurantName}}</td>
							</tr>

							<tr>
								<th>Branch : </th>
								<td>{{$restaurantDetails->email}}</td>
							</tr>

							<tr>
								<th>Owner Name : </th>
								<td>{{$restaurantDetails->ownerName}}</td>
							</tr>

							<tr>
								<th>Email : </th>
								<td>{{$restaurantDetails->email}}</td>
							</tr>

							<tr>
								<th>Address : </th>
								<td>{{$restaurantDetails->address}}</td>
							</tr>

							<tr>
								<th>Phone : </th>
								<td>{{$restaurantDetails->phone}}</td>
							</tr>

							<tr>
								<th>Opening Time : </th>
								<td>{{$restaurantDetails->openTime}}</td>
							</tr>

							<tr>
								<th>Closing Time : </th>
								<td>{{$restaurantDetails->closeTime}}</td>
							</tr>

							<tr>
								<th>Ratting : </th>
								<td>{{$restaurantDetails->ratting}}</td>
							</tr>

							<tr>
								<th>Join Date : </th>
								<td>{{$restaurantDetails->createdAt}}</td>
							</tr>

							<tr>
								<th>Service : </th>
								<td>{{$restaurantDetails->status}}</td>
							</tr>

							<tr>
								<th></th>
									<td>
										<a  href="{{route('restaurantProfile.edit', ['id' => $restaurantDetails->userID])}}">Edit Profile</a>
									</td>
							</tr>
							
					</table>
					
					
@endsection
