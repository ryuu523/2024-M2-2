<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dispatcheRegister</title>
</head>
<body>
    <form action="/dispatche" method="get">
        @csrf
        <input type="submit" value="dispatcheに戻る">
    </form>     
    <form action="/dispatche" method="post">
        @csrf
        イベント名:<select name="event_id">
            @foreach ($event as $e)
                <option value="{{$e["event_id"]}}">{{$e["name"]}}</option>
            @endforeach
        </select><br>
        人材情報  : <select name="worker_id[]" multiple>
            @foreach ($worker as $w)
                <option value="{{$w["worker_id"]}}">{{$w["name"]}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="新規登録">
    </form>
    @if(session("res"))
    <p>{{ session("res") }}</p>
    @endif
</body>
</html>