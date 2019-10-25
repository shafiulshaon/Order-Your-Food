@extends('layouts.defaultHome')

@section('pagetitle') Profile | Admin @endsection

@section('profile') <a href="{{route('adminHome')}}">Home</a> @endsection

@section('item') <a href="{{route('adminItem')}}">Item</a> @endsection  

@section('order') <a href="{{route('adminReport')}}">Report</a> @endsection  

@section('changePass') <a href="{{route('adminChangePassword.edit', ['id' => session('user')->userID])}}}">Change Password</a> @endsection

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
					@if($adminDetails->photo=="none")
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/default.jpg">
					@else
						<img style="border-radius: 50%; border: 1px solid black; width: 80px; height: 80px;" src="../../../uploads/profilePhotos/{{$adminDetails->photo}}">
					@endif
							</td>	

							<tr>
								<th>Name : </th>
								<td>{{$adminDetails->name}}</td>
							</tr>

							<tr>
								<th>Email : </th>
								<td>{{$adminDetails->email}}</td>
							</tr>

							<tr>
								<th>Gender : </th>
								<td>{{$adminDetails->gender}}</td>
							</tr>

							<tr>
								<th>Date of birth : </th>
								<td>{{$adminDetails->dob}}</td>
							</tr>

							<tr>
								<th>Address : </th>
								<td>{{$adminDetails->address}}</td>
							</tr>

							<tr>
								<th>Phone : </th>
								<td>{{$adminDetails->phone}}</td>
							</tr>

							<tr>
								<th>Join Date : </th>
								<td>{{$adminDetails->joinDate}}</td>
							</tr>
							<tr>
								<th></th>
									<td>
										<a  href="{{route('adminProfile.edit', ['id' => $adminDetails->userID])}}">Edit Profile</a>
									</td>
							</tr>
							
					</table>
					
					
@endsection
