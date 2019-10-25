@extends('layouts.defaultHome')

@section('pagetitle') Report | Admin @endsection

@section('profile') <a href="{{route('adminProfile')}}">Profile</a> @endsection

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
#tabletop
{
   margin-top: 30px;
}
#td
{
	margin-right:10px;
}
#divbox
{
	background-color: #e8e4e2;
	height: 300px;
	position: static;
	width: 500px;
	margin-left: -50px;
	margin-top: 100px;
	overflow-y: auto;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
	
	
}


input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    background-color : #d1d1d1; 
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #d1d1d1;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color:#f7f5ec;
}

	
</style>
	<h2>Report</h2>

	<div id="divbox" >
		<p>Total Number of Customer............................................{{$customerCount}}</p>
		<p>Total Number of Restaurant..........................................{{$restaurantCount}}</p>
		<p>Total Amount of Transaction..................................{{$totalTransaction}}</p>
		<p>Most Rated Restaurants...................................{{$mostRated->restaurantName}}</p>
		
	</div>

@endsection
