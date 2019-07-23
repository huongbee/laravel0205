<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    @endif
    @if(Session::has('success'))
        <b>{{Session::get('success')}}</b>
    @endif
    @if(Session::has('error'))
        <b>{{Session::get('error')}}</b>
    @endif
    <form action="{{route('upload-file')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="avatar">
        <button type="submit">Upload</button>
    </form>
</body>
</html>