@extends('layouts.defaultHome')

@section('pagetitle') Items | Restaurant @endsection

@section('profile') <a href="{{route('restaurantProfile')}}">Profile</a> @endsection

@section('item') <a href="{{route('restaurantItem')}}">Item</a> @endsection

@section('order') <a href="{{route('restaurantOrder')}}">Order</a> @endsection

@section('changePass') <a href="{{route('restaurantChangePass.edit', ['id' => $restaurantDetails->userID])}}}">Change Password</a> @endsection

@section('logout') <a href="{{route('logout')}}">Logout</a> @endsection


@section('content')
<style type="text/css">
	
#validation {
    width: 89%;
    margin-top: 10%;
    height: 60%;
    margin-left: 5%;
    overflow-y: scroll;
}

#sticky {
   
    position: sticky;
    top: 0;
    background-color: #d1d1d1;
    font-size: 20px;
}

table, tr, td, a {
    color: #46433e;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    margin: 0 auto;
    margin-top: 25px;
    height: 30px;
}

#welcomebox {
    width: 420px;
    position: absolute;
    height: 70px;
    background: #58584a75;
    color: #000;
    font-size: 15px;
    box-sizing: border-box;
    border-radius: 20px;
    padding: 5px;
    /* margin: 8px auto; */
    text-align: center;
    /* padding-bottom: 14px; */
    margin-top: 20px;
    left: 35%;
}


</style>

	<h2>All Items List</h2>
	<br>
	<a style="color: black; font-size: 18px;" href="{{route('restaurantCreateItem')}}">Create New Item</a>


@endsection


@section('validation')
	<table>
		<tr>
			<th id="sticky">Photo </th>
			<th id="sticky">Item Name </th>
			<th id="sticky">Description </th>
			<th id="sticky">Type </th>
			<th id="sticky">Price </th>
			<th id="sticky">Available </th>
			<th id="sticky">Option</th>
		</tr>
		@foreach($itemList as $item)
		<tr>
			<td>
				<img style="border: 1px solid black;width: 100px;height: 90px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$item->photo}}">
			</td> 
			<td>{{$item->name}}</td>
			<td>{{$item->description}}</td>
			<td>{{$item->foodType}}</td>
			<td>{{$item->regPrice}} .tk</td>
			<td>{{$item->availability}}</td>
			<td>
				<a href="{{route('restaurantItem.edit', ['itemID' => $item->itemID])}}">Edit</a>  |
				<a href="{{route('restaurantItem.delete', ['itemID' => $item->itemID])}}">Delete</a> 
			</td>
		</tr>
		<tr>
			<td colspan="7">----------------------------------------------------------------------------------------------------------------</td>
		</tr>
		@endforeach
	</table>
@endsection()
