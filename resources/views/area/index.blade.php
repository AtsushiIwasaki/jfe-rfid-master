{{--3ｰ4 レイアウトの作成--}}

<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- titleという名前のセクションに、indexというテキスト値を設定する-->
@section('title', 'index')

<!-- 親レイアウトに'menubar'というyieldがあれば、そこにはめ込まれて表示される-->
@section('menubar')
    @parent
    エリアマスター管理
@endsection

@section('content')
    {{--@component('components.message')--}}
        {{--@slot('msg_title')--}}
            {{--Areasテーブル--}}
        {{--@endslot--}}
        {{--@slot('msg_content')--}}
            {{--拠点ごとにエリアを定義します。--}}
        {{--@endslot--}}
    {{--@endcomponent--}}
    @if(isset($id))
        <A href="/location?id={{$id}}">戻る</A>
        <A href="/area/add?id={{$id}}">新規追加</A>
    @endif
    <table>
        <tr>
            <th>
                location_id
            </th>
            <th>
                location_name
            </th>
            <th>
                area_id
            </th>
            <th>
                area_name
            </th>
            <th>
            </th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->loc_id}}</td>
                <td>{{$item->location_name}}</td>
                <td>{{$item->area_id}}</td>
                <td>{{$item->area_name}}</td>
                <td><A href="/area/edit?id={{$item->area_id}}">変更</A><A href="/area/del?id={{$item->area_id}}">削除</A></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
