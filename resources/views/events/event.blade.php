<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
</head>

<body>
    <form action="/menu" method="get">
        @csrf
        <input type="submit" value="menuに戻る">
    </form>
    <form action="/event/create" method="get">
        @csrf
        <input type="submit" value="イベント情報新規作成">
    </form>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>開催場所</th>
                <th>開催日時</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{$d["name"]}}</td>
                    <td>{{$d["place"]}}</td>
                    <td>{{$d["open_date"]}}</td>
                    <td>
                        <form action="/event/{{$d['event_id']}}/edit" method="get">
                            @csrf
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('event.destroy',$d['event_id'])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input onclick="return del()" type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
<script>
    const del=()=>{
        let check=window.confirm("削除してもよろしいですか？")
        return check
        
    }
</script>