<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker</title>
</head>

<body>
    <form action="/menu" method="get">
        @csrf
        <input type="submit" value="menuに戻る">
    </form>
    <form action="/worker/create" method="get">
        @csrf
        <input type="submit" value="人材情報新規登録">
    </form>
    <table>
        <thead>
            <tr>
                <th>氏名</th>
                <th>メールアドレス</th>
                <th>編集ボタン</th>
                <th>削除ボタン</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{$d["name"]}}</td>
                    <td>{{$d["email"]}}</td>
                    <td>
                        <form action="/worker/{{$d['worker_id']}}/edit" method="get">
                            @csrf
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('worker.destroy',$d['worker_id'])}}" method="post">
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