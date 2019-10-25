<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Create View</h2>
	<form method="post">
		NAME: <input type="text" name="myname" value="{{old('myname')}}">
		@if($errors->any())
			{{$errors->first('myname')}}
		@endif
		<br/>
		EMAIL: <input type="text" name="myemail" value="{{old('myemail')}}"><br/>
		AGE: <input type="text" name="myage" value="{{old('myage')}}"><br/>
		<input type="submit" value="Submit"><br/>
	</form>

	@if($errors->any())
	
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>

	@endif
</body>
</html>