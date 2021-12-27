<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 <h1>Hello, govers list:</h1>
    @foreach ($data as $gover)
        <p>{{$gover->name}}</p>
        <ul>
        @foreach ($gover->cities as $city)
           <li>{{$city->name}}</li> 
        @endforeach
       </ul>
    @endforeach
</body>
</html>