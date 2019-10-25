@extends('layouts.defaultHome')

@section('pagetitle') Order History| Restaurant @endsection

@section('profile') <a href="{{route('restaurantProfile')}}">Profile</a> @endsection

@section('item') <a href="{{route('restaurantItem')}}">Item</a> @endsection

@section('order') <a href="{{route('restaurantOrder')}}">Order</a> @endsection

@section('changePass') 
<a href="{{route('restaurantChangePass.edit', ['id' => $restaurantDetails->userID])}}}">Change Password</a>@endsection

@section('logout') <a href="{{route('logout')}}">Logout</a> @endsection

@section('content')
<style type="text/css">
	 
#validation {
    width: 89%;
    margin-top: 10%;
    height: 55%;
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
    text-align: center;
    margin-top: 20px;
    left: 35%;
}

</style>

	<h2>Order History</h2>
	<br>
	<a style="color: black; font-size: 18px;" href="{{route('restaurantOrder')}}">Back To Recent Pending Order
	</a>

@endsection


@section('validation')
	<table>
		<tr>
			<th id="sticky">Photo </th>
			<th id="sticky">Item Name </th>
			<th id="sticky">Qty. x Price </th>
			<th id="sticky">Total Price</th>
			<th id="sticky">Available </th>
			<th id="sticky">Date- Time</th>
			<th id="sticky">Customer Details</th>
			<th id="sticky">Status</th>
		</tr>
		@foreach($itemList as $item)
		<tr>
			<td>
				<img style="border: 1px solid black;width: 100px;height: 90px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$item->photo}}">
			</td> 
			<td>{{$item->name}}</td>
			<td>{{$item->quantity}} x {{$item->regPrice}}</td>
			<td>{{$item->grossPrice}}</td>
			<td>{{$item->availability}} .tk</td>
			<td>{{$item->date}} - {{$item->time}}</td>
			<th> 
				{{$item->cusName}}
				<br>{{$item->address}}
				<br>{{$item->phone}}
			</th>
			<td>
				<td>{{$item->orderStatus}}</td>
			</td>
		</tr>
		<tr>
			<td colspan="7">----------------------------------------------------------------------------------------------------------------</td>
		</tr>
		@endforeach
	</table>
@endsection()
