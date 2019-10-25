@extends('layouts.defaultHome')

@section('pagetitle') Home | Restaurant @endsection

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
	width: 1450px;
	overflow-y: scroll;
	margin-left: -530px;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
	
	
}
#float1{
	background-color: #f7f5ec;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    width: 1450px;
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
	

	<form method="post">
		{{csrf_field()}}
<h2>Welcome Restaurant, {{$restaurantDetails->restaurantName}}</h2>
		<table id="tabletop">
		<tr>
				<td colspan="3"><h3>Search for Items and Resturent</h3></td>
				
			</tr>
			<tr>
				<td></td>
				<td id="td"><input type="text"  placeholder="Search.." value="{{old('oldsearch')}}" name="oldsearch"/></td>
				<td id="td"><select name="type">
						  <option value="items" >Items</option>
						  <option value="restaurants" >Restaurants</option>
				     </select>
				</td>
				<td id="td"><input type="submit" value="Search"  /></td>
			</tr>
		</table>
		@if(!empty($itemDetails))
	<div id="divbox" style="float: left;">
	@foreach($itemDetails as $item)
	<div id="float1" style="height: 110px">
		<table style="margin-left: 30px">
		
		<tr >
			<td>
				<img style="border: 1px solid black;width: 100px;height: 90px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$item->photo}}">
			</td> 
			<td colspan="3" style="width: 1000px">
				<div style="float:left;margin-left: 10px">Name:{{$item->name}} </div><div style="float:right">Restaurant:{{$item->restaurantName}} </div><br><br>
				<div style="float:left;margin-left: 10px">Description:{{$item->description}}</div><br><br>
				<div style="float:left;margin-left: 10px">Price:{{$item->regPrice}}</div>
				


			</td>
			</tr>
			</div>
		</table>
			@endforeach
			@endif
@if(!empty($restaurantDetailsDiff))
	<div id="divbox" style="float: left;">
	@foreach($restaurantDetailsDiff as $item)
	<div id="float1" style="height: 110px">
		<table style="margin-left: 30px">
		
		<tr >
			<td>
				<img style="border: 1px solid black;width: 100px;height: 90px;border-radius: 15%;" src="../../../uploads/profilePhotos/{{$item->logo}}">
			</td> 
			<td colspan="3" style="width: 1000px">
				<div style="float:left;margin-left: 10px">Name:{{$item->restaurantName}} </div><br><br>
				<div style="float:left;margin-left: 10px">Address:{{$item->branch}}{{$item->address}}</div><br><br>
				<div style="float:left;margin-left: 10px">Owner:{{$item->ownerName}}</div>
			   <div style="float:right;margin-left: 10px"><a href="{{route('viewRestaurentDetails', ['resID' => $item->userID])}}">View Details</a></div>


			</td>
			</tr>
			</div>
		</table>
			@endforeach
			@endif
			

	</div>
	</form>
@endsection
