@extends('layouts.defaultHome')

@section('pagetitle') Item Cart | Customer @endsection

@section('profile') <a href="{{route('customerHome')}}">Home</a> @endsection

@section('item') <a href="{{route('customerItem')}}">Item</a> @endsection

@section('order') <a href="{{route('customerCart&Order')}}">Cart & Order</a> @endsection

@section('changePass') <a href="{{route('customerChangePass.edit', ['id' => $customerDetails->userID])}}}">Change Password</a> @endsection

@section('logout') <a href="{{route('logout')}}">Logout</a> @endsection

@section('content')
<style type="text/css">
#validation {
    width: 90%;
    margin-top: 8%;
    height: 50%;
    margin-left: 5%;
    overflow-y: scroll;
}

table, tr, td, a {
    color: #46433e;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    margin: 0 auto;
    height: 25px;
}

#sticky {
   
    position: sticky;
    top: 0;
    background-color: #d1d1d1;
    font-size: 20px;
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
    margin-top: 10px;
    left: 35%;
}

#fixedBottomLabel{
  width: 88%;
    height: 7%;
    position: fixed;
    margin-top: 32%;
    margin-left: 5%;
    padding-top: 20px;
    text-align: center;
    background: #58584a75;
    border-radius: 20%;
}

</style>

	<h2>Items in cart list</h2>
	<br>
	<a href="{{route('customerItem.orderList')}}">View Order List</a>
@endsection


@section('validation')
	<table>
		<tr>
			<th id="sticky">Photo </th>
			<th id="sticky">Item</th>
			<th id="sticky">Quantity</th>
			<th id="sticky">Total Price </th>
			<th id="sticky">Available </th>
			<th id="sticky">Added Date </th>
			<th id="sticky">Status </th>
			<th id="sticky">Option</th>
		</tr>
		<tr>
			<td colspan="8">------------------------------------------------------------------------------------------------------------------------------------------------------</td>
		</tr>

		@foreach($cartList as $item)

		@if($item->status!="Delivered" && $item->status!="Postponed"  && $item->status!="Ordered"  && $item->availability=="Yes")
		<tr>
			<td>
				<img style="border: 1px solid black;width: 100px;height: 90px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$item->photo}}">
			</td> 
			<td>{{$item->name}} <br> {{$item->foodType}}</td>
			<td>{{$item->quantity}}</td>
			<td>{{$item->grossPrice}}  .tk</td>
			<td>{{$item->availability}}</td>
			<td>{{$item->addedAtDate}}</td>
			<td>{{$item->status}}</td>
			<td>
				 <a href="{{route('customerCart.edit', ['cartID' => $item->cartID])}}">Edit Cart</a> |
				 <a href="{{route('customerCart.remove', ['cartID' => $item->cartID])}}">Remove</a>
			</td>
		</tr>
		@endif
		@endforeach
	</table>
@endsection()

@section('fixedBottomLabel')
	<div id="fixedBottomLabel">
		<table style="margin-top: 0px">
			<tr>
				<th>Total Amount: {{$totalAmount}} .tk</th>
				@if($item->status!="Ordered" && $item->availability=="Yes")
				<th><a style="color: #762929;" href="{{route('customerItem.order')}}">Order Now</a></th>
				@endif
			</tr>
		</table>
	</div>
@endsection
