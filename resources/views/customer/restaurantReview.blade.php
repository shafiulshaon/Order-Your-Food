@extends('layouts.defaultHome')

@section('pagetitle') Restaurent Review | Customer @endsection

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
				<img style="border: 1px solid black;width: 80px;height: 70px;border-radius: 15%;" src="../../../uploads/profilePhotos/{{$restaurantDetails->logo}}">
			</th>
		</tr>
		<tr>
			<th>Restaurant Name </th>
			<th>
				{{$restaurantDetails->restaurantName}}
			</th>
		</tr>
		<tr>
			<th>Branch </th>
			<th>
				{{$restaurantDetails->branch}}
			</th>
		</tr>
		<tr>
			<th>Address </th>
			<th>
				{{$restaurantDetails->address}}
			</th>
		</tr>					
		<tr>
			<th>Email </th>
			<th>
				{{$restaurantDetails->email}}
			</th>
		</tr>
		<tr>
			<th>Phone  </th>
			<th>
				{{$restaurantDetails->phone}}
			</th>
		</tr>	
		<tr>
			<th>Owner Name  </th>
			<th>
				{{$restaurantDetails->ownerName}}
			</th>
		</tr>
		<tr>
			<th>Open Time - Close Time  </th>
			<th>
				{{$restaurantDetails->openTime}} - {{$restaurantDetails->closeTime}}
			</th>
		</tr>
		<tr>
			<th>Ratting  </th>
			<th>
				{{$restaurantDetails->ratting}}/5
			</th>
		</tr>
		<tr>
			<th colspan="2"><a href="{{route('customerItem')}}">Back to all items list</a></th>
		</tr>
	</table>

@endsection()



@section('validation')

<form method="post">
		{{csrf_field()}}

		<input type="hidden" name="userID" value="{{$customerDetails->userID}}">
		<input type="hidden" name="restaurantID" value="{{$restaurantDetails->userID}}">
		<div style="height: 100px; width: 400px; margin: 0 auto; margin-top: 20px;">
			<table>
			<tr>
				<th>Your Ratting: </th>
				<th>
					<input type="number" name="rate" min="0" max="5" placeholder="0-5" value="{{$myReview->rate}}">
				</th>
				<th></th>
			</tr>
			<tr>
				<th>Your Comment: </th>
				<th>
					<textarea rows="2" cols="20" name="comment" placeholder="write your comment..." required>{{$myReview->comment}}</textarea> 
				</th>
				<th><input type="submit" value="Post"></th>
			</tr>
			
		</table>
		</div>

		<br>
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

</form>
@endsection



