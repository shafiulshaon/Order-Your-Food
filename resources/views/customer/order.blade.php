@extends('layouts.defaultHome')

@section('pagetitle') Order item | Customer @endsection

@section('profile') <a href="{{route('customerHome')}}">Home</a> @endsection

@section('item') <a href="{{route('customerItem')}}">Item</a> @endsection

@section('order') <a href="{{route('customerCart&Order')}}">Cart & Order</a> @endsection

@section('changePass') <a href="{{route('customerChangePass.edit', ['id' => $customerDetails->userID])}}}">Change Password</a> @endsection

@section('logout') <a href="{{route('logout')}}">Logout</a> @endsection

@section('content')
<style type="text/css">
	
table, tr, td, a {
    color: #46433e;
    padding-left: 20px;
    text-align: center;
    margin: 0 auto;
    height: 50px;
}


#welcomebox {
        width: 420px;
    height: 360px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 0%;
    margin-top: 6%;
    margin-left: 35%;
}

#validation {
	width: 320px;
    height: 78px;
    color: #e42828;
    padding-top: 3px;
    margin-top: 15%;
    left: 450px;
}


</style>

<h2>Order item</h2>

<form method="post">
		{{csrf_field()}}

<input type="hidden" name="userID" value="{{$customerDetails->userID}}"> 
<input type="hidden" name="totalAmount" value="{{$totalAmount}}"> 

	<table> 
		<tr>
			<th>Payment Type</th>
			<th>
				<select name="paymentType"> 
               	 	<option selected disabled>select</option>
                	<option @if(old('paymentType')=="Cash on delivery") selected @endif value="Cash on delivery">Cash on delivery</option>
                	<option @if(old('paymentType')=="bKash") selected @endif value="bKash">bKash</option>
                </select> 
			</th>
		</tr>
		<tr>
			<th>Delivery Address </th>
			<th><textarea rows="2" cols="20" name="address">{{old('address')}}</textarea> </th>
		</tr>
		<tr>
			<th>Phone No </th>
			<th><input type="text" name="phone" value="{{old('phone')}}"></th>
		</tr>					
		<tr>
			<th colspan="2"><h4>Are you sure about order?</h4></th>
		</tr>
		<tr>
			<th><a href="{{route('customerCart&Order')}}">Back to all cart items</a></th>
			<th><input type="submit" value="Order"></th>
		</tr>
	</table>

</form>

@endsection()



@section('validation')
	@if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif
@endsection

