{{--3ｰ4 レイアウトの作成--}}

<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

@section('title', 'Status Master Table Maintenance')

<!-- 親レイアウトに'menubar'というyieldがあれば、そこにはめ込まれて表示される-->
@section('menubar')
    @parent
    ステータスマスタメンテナンス
@endsection

@section('content')

    <A href="{{url('/')}}">戻る</A>
    <A href="{{url('/status/add')}}">新規追加</A>
    <br>
    <table>
        <tr>
            <th>status_id</th>
            <th>status_name</th>
            <th></th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->status_name}}</td>
            <td><A href="{{url('/status/edit')}}?id={{$item->id}}">変更</A>
                <A href="{{url('/status/del')}}?id={{$item->id}}">削除</A></td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2018 JFE Engineering Corporation.
@endsection
