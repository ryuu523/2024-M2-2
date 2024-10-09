<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkerEdit</title>
</head>
<body>
    <form action="/worker" method="get">
        @csrf
        <input type="submit" value="workerに戻る">
    </form>     
    <form action="/worker/{{$data['worker_id']}}" method="post">
        @method("PATCH")
        @csrf
        氏名: <input type="text" name="name" value="{{$data['name']}}"><br>
        Email  : <input type="text" name="email" value="{{$data['email']}}"><br>
        Password  : <input type="text" name="password" value="{{$data['password']}}"><br>
    
        <input type="submit" value="編集保存">
    </form>
    @if(session("res"))
    <p>{{ session("res") }}</p>
    @endif
</body>
</html>