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

    <A href="/element">戻る</A>
    <br>
    <br>
    ラック
    <table>
        <tr>
            <th>rack_id</th>
            <td>{{$rack_location['rack_id']}}</td>
        </tr>
        <tr>
            <th>location</th>
            <td>{{$rack_location['location']}}</td>
        </tr>
        <tr>
            <th>area</th>
            <td>{{$rack_location['area']}}</td>
        </tr>
    </table>
    <br>
    ラックタグ
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
    <br>
    ラッキングされた部材
    <table>
        <tr>
            <th>ID</th>
            <th>図面No</th>
            <th>製品名</th>
            <th>工区</th>
            <th>部材</th>
            <th>鋼材</th>
            <th>長さ</th>
            <th>単重</th>
            <th>鉄板その他</th>
            <th>重量</th>
            <th>タグID</th>
            <th>ステータス</th>
            <th>ロケーション</th>
            <th>エリア</th>
            <th>GPS</th>
            {{--<th>ラックID</th>--}}
        </tr>
        @foreach($elements as $item)
            <tr>
                <td>{{$item->element_id}}</td>
                <td>{{$item->doc_no}}</td>
                <td>{{$item->element_name}}</td>
                <td>{{$item->district_name}}</td>
                <td>{{$item->material_name}}</td>
                <td>{{$item->element_size}}</td>
                <td>{{$item->element_length}}</td>
                <td>{{$item->single_weight}}</td>
                <td>{{$item->remarks}}</td>
                <td>{{$item->total_weight}}</td>
                <td>{{$item->device_id}}</td>
                <td>{{$item->status_name}}</td>
                <td>{{$item->location_name}}</td>
                <td>{{$item->area_name}}</td>
                @if(isset($item->latitude))
                    <td><A href="https://www.google.com/maps?q={{$item->latitude}},{{$item->longitude}}" target="_blank">Map</A></td>
                @else
                    <td></td>
                @endif
                {{--<td>{{$item->rack_id}}</td>--}}
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2018 JFE Engineering Corporation.
@endsection
