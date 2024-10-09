<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dispatche</title>
</head>

<body>
    <form action="/menu" method="get">
        @csrf
        <input type="submit" value="menuに戻る">
    </form>
    <form action="/dispatche/create" method="get">
        @csrf
        <input type="submit" value="派遣情報新規登録">
    </form>
    <table>
        <thead>
            <tr>
                <th>イベント名</th>
                <th>人材氏名</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    @foreach ($event as $e)
                        @if($d['event_id']==$e["event_id"])
                            <td>{{$e["name"] }}</td>
                        @endif
                    @endforeach
                    
                    @foreach ($worker as $w)
                        @if($d['worker_id']==$w["worker_id"])
                            <td>{{$w["name"] }}</td>
                        @endif
                    @endforeach
                    
                    <td>
                        <form action="/dispatche/{{$d['dispatche_id']}}/edit" method="get">
                            @csrf
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('dispatche.destroy',$d['dispatche_id'])}}" method="post">
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