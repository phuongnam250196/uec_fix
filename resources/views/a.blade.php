<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>sdfa</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table>
		<caption>table title and/or explanatory text</caption>
		<thead>
			<tr>
				<th>name</th>
				<th>status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($a as $a)
			<tr>
				<td>{{$a->b_name}}</td>
				<td>{{$a->b_status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>