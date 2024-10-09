<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
</head>
<body>
    <form action="/logout" method="post">
        @csrf
        <input type="submit" value="logout">
    </form>
    <h1>MENU</h1>
    <ul>
        <li><a href="/event">event</a></li>
        <li><a href="/worker">worker</a></li>
        <li><a href="/dispatche">dispatche</a></li>
    </ul>
</body>
</html>