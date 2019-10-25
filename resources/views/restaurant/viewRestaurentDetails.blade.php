@extends('layouts.defaultHome')

@section('pagetitle') Edit Profile | Restaurant @endsection

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
    height: 38px;
}

#welcomebox {
    width: 490px;
    height: 530px;
    background: #58584a75;
    position: absolute;
    color: #000;
    padding-left: 0%;
    margin-top: 2%;
    margin-left: 8%;
}

#validation {
	width: 650px;
    height: 490px;
    color: #e42828;
    padding-top: 3px;
    margin-top: 3%;
    left: 110px;
}


</style>

<h2>Restaurent Details</h2>

	<table>
		<tr>
			<th colspan="2">
				<img style="border: 1px solid black;width: 80px;height: 70px;border-radius: 15%;" src="../../../uploads/profilePhotos/{{$getRestaurantDetails->logo}}">
			</th>
		</tr>
		<tr>
			<th>Restaurant Name </th>
			<th>
				{{$getRestaurantDetails->restaurantName}}
			</th>
		</tr>
		<tr>
			<th>Branch </th>
			<th>
				{{$getRestaurantDetails->branch}}
			</th>
		</tr>
		<tr>
			<th>Address </th>
			<th>
				{{$getRestaurantDetails->address}}
			</th>
		</tr>					
		<tr>
			<th>Email </th>
			<th>
				{{$getRestaurantDetails->email}}
			</th>
		</tr>
		<tr>
			<th>Phone  </th>
			<th>
				{{$getRestaurantDetails->phone}}
			</th>
		</tr>	
		<tr>
			<th>Owner Name  </th>
			<th>
				{{$getRestaurantDetails->ownerName}}
			</th>
		</tr>
		<tr>
			<th>Open Time - Close Time  </th>
			<th>
				{{$getRestaurantDetails->openTime}} - {{$getRestaurantDetails->closeTime}}
			</th>
		</tr>
		<tr>
			<th>Ratting  </th>
			<th>
				{{$getRestaurantDetails->ratting}}/5
			</th>
		</tr>
	</table>

@endsection()




@section('validation')

		<div style="width: 600px;height: 40px; margin: 0 auto; text-align: center;">
			<strong>All reviews</strong>
		</div>

		<div style="width: 600px;height: 307px; margin: 0 auto; overflow-y: scroll;">
		@foreach($restaurantReview as $review)
 
		<table>
		<tr>
			<td>
			<img style="width: 50px;height: 50px;border-radius: 50%;" src="../../../uploads/profilePhotos/{{$review->photo}}">
			</td>
			<td> Review By <br> {{$review->name}}</td>
			<td> Rating <br> {{$review->rate}}</td>
			<td> Comment <br> {{$review->comment}}</td>
			<td> Date <br> {{$review->date}}</td>
		</tr>
		</table>
 
		@endforeach
		</div>

@endsection