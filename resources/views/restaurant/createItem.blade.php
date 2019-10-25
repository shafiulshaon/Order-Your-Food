@extends('layouts.defaultHome')

@section('pagetitle') New Item | Restaurant @endsection

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

	<h2>Create new item</h2>
	<br>

<form method="post" enctype="multipart/form-data">
		{{csrf_field()}}
<input type="hidden" name="userID" value="{{$restaurantDetails->userID}}"> 
	<table>
		<tr>
			<th>Select Photo</th>
			<th><input type="file" name="file" accept="image/*"></th>
		</tr>
		<tr>
			<th>Item Name </th>
			<th><input type="text" name="name" value="{{old('name')}}"> </th>
		</tr>
		<tr>
			<th>Description </th>
			<th>
				<textarea rows="2" cols="20" name="description" value="{{old('description')}}"> </textarea>
			</th>
		</tr>
		<tr>
			<th>Price </th>
			<th><input type="text" name="price" value="{{old('price')}}" placeholder=".tk "></th>
		</tr>
		<tr>
			<th>Available </th>
			<th>
                <input type="radio" name="availability"  value="Yes"> Yes
                <input type="radio" name="availability"  value="No"> No
            </th>
		</tr>						
		<tr>
			<th>Type </th>
			<th> 
				<select name="type"> 
               	 	<option selected disabled>select</option>
                	<option value="Single Pack">Single Pack </option>
                	<option value="Combo Pack">Combo Pack</option>
                	<option value="Buy 1 Get 1">Buy 1 Get 1</option>
                </select> 
			</th>
		</tr>
		<tr>
			<th></th>
			<th><input type="submit" value="Create item"></th>
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

