@extends('layouts.defaultHome')

@section('pagetitle') Delete Item | Restaurant @endsection

@section('profile') <a href="{{route('restaurantProfile')}}">Profile</a> @endsection

@section('item') <a href="{{route('restaurantItem')}}">Item</a> @endsection

@section('order') <a href="{{route('restaurantOrder')}}">Order</a> @endsection

@section('changePass') <a href="{{route('restaurantChangePass.edit', ['id' => $restaurantDetails->userID])}}}">Change Password</a> @endsection

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
    width: 440px;
    height: 530px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 0%;
    margin-top: 2%;
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

<h2>Delete item</h2>

<form method="post">
		{{csrf_field()}}

<input type="hidden" name="itemID" value="{{$itemDetails->itemID}}"> 
	<table>
		<tr>
			<th colspan="2">
				<img style="border: 1px solid black;width: 80px;height: 70px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$itemDetails->photo}}">
			</th>
		</tr>
		<tr>
			<th>Item Name </th>
			<th><input type="text" name="name" value="{{$itemDetails->name}}" disabled> </th>
		</tr>
		<tr>
			<th>Description </th>
			<th>
				<textarea rows="2" cols="20" name="description" disabled>{{$itemDetails->description}}</textarea>
			</th>
		</tr>
		<tr>
			<th>Price </th>
			<th><input type="text" name="price" value="{{$itemDetails->regPrice}}" disabled></th>
		</tr>
		<tr>
			<th>Available </th>
			<th><input type="text" name="availability" value="{{$itemDetails->availability}}"disabled></th>
		</tr>						
		<tr>
			<th>Type </th>
			<th><input type="text" name="type" value="{{$itemDetails->foodType}}" disabled></th>
		</tr>
		<tr>
			<th colspan="2"><h4>Are you sure about delete this item?</h4></th>
		</tr>
		<tr>
			<th><a href="{{route('restaurantItem')}}">Back to all item List</a></th>
			<th><input type="submit" value="Delete"></th>
		</tr>
	</table>

</form>

@endsection()



@section('validation')
@endsection

