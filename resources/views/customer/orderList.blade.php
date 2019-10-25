@extends('layouts.defaultHome')

@section('pagetitle') Order List | Customer @endsection

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

	<h2>Your Order History</h2>
	<br>
@endsection


@section('validation')
	<table>
		<tr>
			<th id="sticky">OrderID </th>
			<th id="sticky">Items</th>
			<th id="sticky">Total Amount</th>
			<th id="sticky">Payment </th>
			<th id="sticky">Address </th>
			<th id="sticky">Phone </th>
			<th id="sticky">Date </th>
			<th id="sticky">Time</th>
		</tr>
		<tr>
			<td colspan="8">------------------------------------------------------------------------------------------------------------------------------------------------------</td>
		</tr>
		@foreach($orderDetails as $order)
		<tr>
			<th>{{$order->orderID}}</th>
			<th>
				@foreach($itemDetails as $item)
				@if($order->orderID==$item->orderID)
				<ul>
  					<li>{{$item->name}}</li>
				</ul>
				@endif
				@endforeach
			</th>
			<th>{{$order->totalAmount}}</th>
			<th>{{$order->paymentType}}</th>
			<th>{{$order->address}}</th>
			<th>{{$order->phone}}</th>
			<th>{{$order->date}}</th>
			<th>{{$order->time}}</th>
			<th></th>
		</tr>
		<tr>
			<td colspan="8">------------------------------------------------------------------------------------------------------------------------------------------------------</td>
		</tr>
		@endforeach
	</table>
@endsection()
