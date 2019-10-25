@extends('layouts.login')

@section('pagetitle') Customer Registration @endsection	

@section('style')
<style type="text/css">

#Container{
    height: 580px;
    background: url(/images/bgres.jpg);
    background-repeat: no-repeat;
    border-bottom: 6px solid #373940;
    background-position: bottom;
    background-size: cover;
}

#legend {
    width: 355px;
    height: 100px;
    color: floralwhite;
    text-align: center;
    position: absolute;
    margin-top: 2%;
    margin-left: 38%;
}
	
#loginbox {
    height: 400px;
    width: 380px;
    top: 15%;
    padding: 1.5%;
}

#validation {
    width: 290px;
    height: 210px;
    font-size: 18px;
    font-style: italic;
    margin-top: 100px;
    position: absolute;
    margin-left: 40%;
}

#footer{
    margin-top: 326px;
}
</style>
@endsection


@section('legend')
<h2>Frequently Asked Questions!</h2>
@endsection

@section('content')
		{{csrf_field()}}
		
		<table>
			<tr>
				<td>Can I cancel my order?<br>---------------------------<br>
				Call the restaurant to change the order. After leaving the supplier is not possible to change.</td>
			</tr>
			<tr> 
				<td>How is the receipt issued?<br>-------------------------------<br>
				After your order delivered, you will receive an e-receipt regarding platform service fee from food town.</td>
			</tr>
			<tr>
				<td>Where is my order?<br>-----------------------<br>
				Delivery times are mainly in accordance with the SMS notification, and will not necessarily match the times as estimated on the website.</td>
			</tr>
			<tr>
				<td>How long it take to get delivered?<br>-----------------------------------------<br>
				On the website you can see estimated delivery time of each restaurant in your location.</td>
			</tr>
		</table>
 
	@endsection

	@section('validation')

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

	@endsection
