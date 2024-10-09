<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventEdit</title>
</head>
<body>
    <form action="/event" method="get">
        @csrf
        <input type="submit" value="eventに戻る">
    </form>     
    <form action="/event/{{$data['event_id']}}" method="post">
        @method("PATCH")
        @csrf
        イベント名: <input type="text" name="name" value="{{$data['name']}}"><br>
        開催場所  : <input type="text" name="place" value="{{$data['place']}}"><br>
        開催日時  : <input type="date" name="open_date" value="{{$data['open_date']}}"><br>
        <input type="submit" value="編集保存">
    </form>
    @if(session("res"))
    <p>{{ session("res") }}</p>
    @endif
</body>
</html>