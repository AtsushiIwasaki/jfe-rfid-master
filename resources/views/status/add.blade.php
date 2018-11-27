<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- タイトル名 -->
@section('title', 'Add')

<!--　メニュー -->
@section('menubar')
    @parent
    ステータスの新規作成
@endsection

<!-- コンテンツ -->
@section('content')
    <A href="{{url('/status')}}">戻る</A>
    <table>
        <form action="{{url('/status/add')}}" method="post">
            {{ csrf_field() }}
            <tr>
                <th>status_name</th>
                <td><input type="text" name="status_name"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </form>
    </table>
@endsection

@section('footer')
    copyright 2018 JFE Engineering Corporation.
@endsection
