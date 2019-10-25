<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Welcome {{session('user')->name}}</h2>
	<a href="{{route('department.list')}}">Departments</a> | 
	<a href="{{route('employee.list')}}">Employees</a> | 
	<a href="{{route('logout')}}">Logout</a>
</body>
</html>