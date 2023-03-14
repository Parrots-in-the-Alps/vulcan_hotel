<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>Merci {{ $reservation->user->name }} pour votre réservation !</h1>

  <p> Nous vous attendons le <b>{{$reservation->entryDate}}</b> à partir de 12h !</p>
    
                                                                                                                                                                                                                            
   

  <!-- {{$i = $temperature->current_weather->weathercode }} -->

  @php
    $i = $temperature->current_weather->weathercode;
@endphp


<p>  voici un apercu météo pour votre journée d'arrivée :</p>
<p> il fera une température de {{$temperature->current_weather->temperature}} °C</p>
<br>

        @switch($i)
    @case(0)
    <img src="{{ $urls['sun']}}" width="100px" alt="test"/>
        @break

    @case(1)
    @case(2)
    @case(3)
    <img src="{{ $urls['cloudy']}}" width="100px" alt="test"/>
        @break

    @case(45)
    @case(48)
    <img src="{{ $urls['fog']}}" width="100px" alt="test"/>
        @break

    @case(51)
    @case(53)
    @case(55)
    <img src="{{ $urls['rainy']}}" width="100px" alt="test"/>
        @break

    @case(61)
    @case(63)
    @case(65)
    <img src="{{ $urls['rain']}}" width="100px" alt="test"/>
        @break

    @case(66)
    @case(67)
    <img src="{{ $urls['rain']}}" width="100px" alt="test"/>
        @break

    @case(71)
    @case(73)
    @case(75)
    @case(77)
    <img src="{{ $urls['snow']}}" width="100px" alt="test"/>
        @break

    @case(80)
    @case(81)
    @case(82)
    <img src="{{ $urls['rain']}}" width="100px" alt="test"/>
        @break

    @case(85)
    @case(86)
    <img src="{{ $urls['snow']}}" width="100px" alt="test"/>
        @break

    @case(95)
    @case(96)
    @case(99)
    <img src="{{ $urls['storm']}}" width="100px" alt="test"/>
        @break

    @default
        <p>Météo non connu des services secret israélien SORRY</p>
@endswitch
<br><br>





@if(in_array(7, $reservation->service_id))

<img src="https://api.qrserver.com/v1/create-qr-code/?data=code%20Wifi:%20betsyMougnagna!&size=100x100" alt="qr code" />
@endif

    <p>Encore merci et à bientot</p>





</body>
</html>