<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dispatcheEdit</title>
</head>

<body>
    <form action="/dispatche" method="get">
        @csrf
        <input type="submit" value="dispatcheに戻る">
    </form>
    <form action="/dispatche/{{$data['dispatche_id']}}" method="post">
        @method("PATCH")
        @csrf
        イベント名:<select name="event_id">
            @foreach ($event as $e)
                @if($data["event_id"] == $e["event_id"])
                    <option selected value="{{$e["event_id"]}}">{{$e["name"]}}</option>
                @else
                    <option value="{{$e["event_id"]}}">{{$e["name"]}}</option>
                @endif
            @endforeach
        </select><br>
        人材情報 : <select name="worker_id">
            @foreach ($worker as $w)
                @if ($data["worker_id"] == $w["worker_id"])
                    <option selected value="{{$w["worker_id"]}}">{{$w["name"]}}</option>

                @else
                    <option value="{{$w["worker_id"]}}">{{$w["name"]}}</option>

                @endif
            @endforeach
        </select><br>

        <input type="submit" value="編集保存">
    </form>
    @if(session("res"))
        <p>{{ session("res") }}</p>
    @endif
</body>

</html>