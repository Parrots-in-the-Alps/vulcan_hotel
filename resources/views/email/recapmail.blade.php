<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $reservation->user->name }}</h1>

    <p>{{$temperature->current_weather->temperature}}</p>

    <img src="https://api.qrserver.com/v1/create-qr-code/?data=code%20Wifi:%20betsyMougnagna!&size=100x100" alt="qr code" />

    <p>Thank you</p>
</body>
</html>