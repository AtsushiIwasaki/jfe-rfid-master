{{--3ｰ4 レイアウトの作成--}}

<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- titleという名前のセクションに、indexというテキスト値を設定する-->
@section('title', 'index')

<!-- 親レイアウトに'menubar'というyieldがあれば、そこにはめ込まれて表示される-->
@section('menubar')
    インデックスページ
@endsection

@section('content')
    <p>マスタメンテナンス</p>
    @component('components.message')
        @slot('msg_title')
            Rack
        @endslot
        @slot('msg_content')
            ラックの一覧
        @endslot
    @endcomponent
    {{--<A href="/location/add">新規追加</A>--}}
    <table>
        <tr>
            <th>device_id</th>
            <th>vendor_name</th>
            <th>product_name</th>
        </tr>
        @foreach($rack_tags as $rack_tag)
            <tr>
                <td>{{$rack_tag->device_id}}</td>
                <td>{{$rack_tag->vendor_name}}</td>
                <td>{{$rack_tag->product_name}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
