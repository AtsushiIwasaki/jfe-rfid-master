<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- タイトル名 -->
@section('title', 'Add')

<!--　メニュー -->
@section('menubar')
    @parent
    ディストリクトの新規作成
@endsection

<!-- コンテンツ -->
@section('content')
    <A href="{{url('/district')}}">戻る</A>
    <table>
        <form action="{{url('/district/add')}}" method="post">
            {{ csrf_field() }}
            <tr>
                <th>district_name</th>
                <td><input type="text" name="district_name"></td>
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
