<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Pay with Paypal</h1>
	<form action="{{url('/pay-with-paypal')}}" method="POST">
		@csrf
		<input type="submit" value="Submit" />
	</form>
</body>
</html>