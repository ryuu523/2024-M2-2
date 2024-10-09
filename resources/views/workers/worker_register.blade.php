<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkerRegister</title>
</head>
<body>
    <form action="/worker" method="get">
        @csrf
        <input type="submit" value="workerに戻る">
    </form>     
    <form action="/worker" method="post">
        @csrf
        氏名: <input type="text" name="name"><br>
        Email  : <input type="text" name="email"><br>
        Password  : <input type="text" name="password"><br>
        <input type="submit" value="新規登録">
    </form>
    @if(session("res"))
    <p>{{ session("res") }}</p>
    @endif
</body>
</html>