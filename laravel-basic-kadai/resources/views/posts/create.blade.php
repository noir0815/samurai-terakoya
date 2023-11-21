<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Laravel基礎</title>
    </head>
    <body>
        <h1>投稿作成</h1>
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <table>
                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <tr>
                    <th>タイトル</th>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <th>本文</th>
                    <td>
                        <textarea cols="40" rows="10" name="content"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" value="送信">
        </form>
    </body>
</html>