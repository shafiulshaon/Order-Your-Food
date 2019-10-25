@extends('layouts.defaultHome')

@section('pagetitle') Edit Item | Restaurant @endsection

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
    height: 480px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 2%;
    margin-top: 4%;
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

	<h2>Edit item</h2>
	<br>

<form method="post" enctype="multipart/form-data">
		{{csrf_field()}}
<input type="hidden" name="itemID" value="{{$itemDetails->itemID}}"> 
<input type="hidden" name="photo" value="{{$itemDetails->photo}}">  
	<table>
		<tr>
			<th>
				<img style="border: 1px solid black;width: 80px;height: 70px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$itemDetails->photo}}">
			</th>
			<th><input type="file" name="file" accept="image/*"></th>
		</tr>
		<tr>
			<th>Item Name </th>
			<th><input type="text" name="name" value="{{$itemDetails->name}}"> </th>
		</tr>
		<tr>
			<th>Description </th>
			<th>
				<textarea rows="2" cols="20" name="description">{{$itemDetails->description}}</textarea>
			</th>
		</tr>
		<tr>
			<th>Price </th>
			<th><input type="text" name="price" value="{{$itemDetails->regPrice}}" placeholder=".tk "></th>
		</tr>
		<tr>
			<th>Available </th>
			<th>
                <input type="radio" name="availability"  value="Yes"
                 @if($itemDetails->availability=="Yes") checked @endif> Yes
                <input type="radio" name="availability"  value="No"
                @if($itemDetails->availability=="No") checked @endif> No
            </th>
		</tr>						
		<tr>
			<th>Type </th>
			<th> 
				<select name="type"> 
               	 	<option selected disabled>select</option>
                	<option @if($itemDetails->foodType=="Single Pack") selected @endif value="Single Pack">Single Pack</option>
                	<option @if($itemDetails->foodType=="Combo Pack") selected @endif value="Combo Pack">Combo Pack</option>
                	<option @if($itemDetails->foodType=="Buy 1 Get 1") selected @endif value="Buy 1 Get 1">Buy 1 Get 1</option>
                </select> 
			</th>
		</tr>
		<tr>
			<th></th>
			<th><input type="submit" value="Save Edit"></th>
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

