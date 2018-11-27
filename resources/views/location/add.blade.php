<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- タイトル名 -->
@section('title', 'Add')

<!--　メニュー -->
@section('menubar')
    @parent
    ロケーションの新規追加
@endsection


<!-- コンテンツ -->
@section('content')
    <A href="/location">戻る</A>
    <table>
        <form action="/location/add" method="post">
            {{ csrf_field() }}
            <tr>
                <th>location_name:</th>
                <td><input type="text" name="location_name"></td>
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
