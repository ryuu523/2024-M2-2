<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="./login" method="post">
        @csrf
        email:<input type="text" name="email" id="email">
        password:<input type="password" name="password" id="password">
        <input type="submit" value="login">
    </form>
    @if(session("error"))
        <p>{{ session("error") }}</p>
    @endif
</body>
</html>