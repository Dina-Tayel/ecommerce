<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            padding: 20px ;
        }
    </style>
</head>
<body>
 <div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 m-auto">
            <h3>OrderConfirmation mail</h3>
            <p>Hi, {{$data['user_name']}} Your oredr is successfully recieved</p>
            <p>Your total price is {{$data['total_amount']}}</p>
            <p>We Will Contact You as soon as possible</p>
            <br>
            <br>
            <br>
            <p> Best Regards</p>
            <p>team , enart shop </p>
        </div>
    </div>
 </div>
</body>
</html>