<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- タイトル名 -->
@section('title', 'Add')

<!--　メニュー -->
@section('menubar')
    @parent
    エリアの新規作成
@endsection

<!-- コンテンツ -->
@section('content')
    <A href="{{url('/area')}}?id={{$location_id}}">戻る</A>
    <table>
        <form action="{{url('/area/add')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="location_id" value="{{$location_id}}">
            <tr>
                <th>location_name:</th>
                <td>{{$location_name}}</td>
            </tr>
            <tr>
                <th>area_name:</th>
                <td><input type="text" name="area_name"></td>
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
