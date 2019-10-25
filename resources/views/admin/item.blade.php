@extends('layouts.defaultHome')

@section('pagetitle') Item | Admin @endsection

@section('profile') <a href="{{route('adminProfile')}}">Profile</a> @endsection

@section('item') <a href="{{route('adminItem')}}">Item</a> @endsection  

@section('order') <a href="{{route('adminReport')}}">Report</a> @endsection  

@section('changePass') <a href="{{route('adminChangePassword.edit', ['id' => session('user')->userID])}}}">Change Password</a> @endsection

@section('logout') <a href="{{route('logout')}}">Logout</a> @endsection

@section('content')
<style type="text/css">
#validation {
    width: 89%;
    margin-top: 8%;
    height: 60%;
    margin-left: 5%;
    overflow-y: scroll;
}

table, tr, td, a {
    color: #46433e;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    margin: 0 auto;
    margin-top: 15px;
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

#sticky {
   
    position: sticky;
    top: 0;
    background-color: #d1d1d1;
    font-size: 20px;
}

</style>

	<h2>All items list</h2>
	<br>
@endsection


@section('validation')
	<table>
		<tr>
			<th id="sticky">Photo </th>
			<th id="sticky">Item</th>
			<th id="sticky">Restaurant</th>
			<th id="sticky">Description </th>
			<th id="sticky">Type </th>
			<th id="sticky">Price </th>
			<th id="sticky">Available </th>
			<th id="sticky">Option</th>
		</tr>
		<td colspan="7">------------------------------------------------------------------------------------------------------------------------------------------------------</td>
		@foreach($itemList as $item)
		<tr>
			<td>
				<img style="border: 1px solid black;width: 100px;height: 90px;border-radius: 15%;" src="../../../uploads/itemPhotos/{{$item->photo}}">
			</td> 
			<td>{{$item->name}}</td>
			<td>{{$item->restaurantName}} <br> {{$item->branch}}</td>
			<td>{{$item->description}}</td>
			<td>{{$item->foodType}}</td>
			<td>{{$item->regPrice}} .tk</td>
			<td>{{$item->availability}}</td>
			<td>
				 <a href="{{route('admin.deleteItem', ['itemID' => $item->itemID])}}">Delete</a>
			</td>
		</tr>
 
		@endforeach
	</table>
@endsection()
