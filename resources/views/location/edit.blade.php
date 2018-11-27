<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- タイトル名 -->
@section('title', 'Edit')

<!--　メニュー -->
@section('menubar')
    @parent
    ロケーション名の変更
@endsection

@section('content')
    <A href="{{url('/location')}}?id={{$form->id}}">戻る</A>
    <table>
        <form action="{{url('/location/edit')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr>
                <th>location_name</th>
                <td><input type="text" name="location_name" value="{{$form->location_name}}"></td>
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
