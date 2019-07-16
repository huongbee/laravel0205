<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
    form{
        margin-left:100px;
    }
    input{
        width: 200px;
        margin-bottom: 15px
    }
    </style>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>
    <form method="POST" action="{{route('user-register')}}">
        <h2>User register</h2>
        @csrf()
        {{--
            this is comment

        C2: {{csrf_field()}}
        C3: <input type="hidden" name="_token"
        value="{{csrf_token()}}"> --}}
        <?php
        /**
         *  this is comment
         */
         ?>
       
        <div>
            <label for="">Email:</label>
            <div>
                <input type="text" placeholder="Enter email" name="email">
            </div>
        </div>
        <div>
            <label for="">Fullname:</label>
            <div>
                <input type="text" placeholder="Enter fullname" name="fullname">
            </div>
        </div>
        <div>
            <label for="">Age:</label>
            <div>
                <input type="text" placeholder="Enter age" name="age">
            </div>
        </div>
        <div>
            <label for="">Password:</label>
            <div>
                <input type="password" placeholder="Enter password" name="password">
            </div>
        </div>
        <div>
            <label>Confirm Password:</label>
            <div>
                <input type="password" placeholder="Enter re password" name="repassword">
            </div>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>