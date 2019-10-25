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
    height: 300px;
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
<h2>Contact</h2>
@endsection

@section('content')
		{{csrf_field()}}
		
		<table>
			<tr>
				<td>We don't have any office right now!<br>------------------------------------------<br>
				:P :P :P </td>
			</tr>
				<tr>
				<td><br>Email us!<br>------------<br>
				foodtownwalker@gmail.com</td>
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
