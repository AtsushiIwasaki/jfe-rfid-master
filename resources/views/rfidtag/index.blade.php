{{--3ｰ4 レイアウトの作成--}}

<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- titleという名前のセクションに、indexというテキスト値を設定する-->
@section('title', 'RFID Tag List')

<!-- 親レイアウトに'menubar'というyieldがあれば、そこにはめ込まれて表示される-->
@section('menubar')
    RFIDタグ一覧
@endsection

@section('content')
    {{--@component('components.message')--}}
        {{--@slot('msg_title')--}}
            {{--Element--}}
        {{--@endslot--}}
        {{--@slot('msg_content')--}}
            {{--部材の一覧--}}
        {{--@endslot--}}
    {{--@endcomponent--}}
    {{--<A href="/location/add">新規追加</A>--}}
    <A href="{{url('/')}}">戻る</A>
    <table>
        <tr>
            <th>デバイスID</th>
            <th>製品名</th>
            <th>ベンダ名</th>
            <th>図面No</th>
            <th>製品名</th>
            <th>工区</th>
            <th>部材</th>
            <th>鋼材</th>
            <th>長さ</th>
            <th>単重</th>
            <th>鉄板その他</th>
            <th>重量</th>
            <th>ステータス</th>
            <th>ロケーション</th>
            <th>エリア</th>
            <th>GPS</th>
            <th>ラックID</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->device_id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->vendor_name}}</td>
                <td>{{$item->doc_no}}</td>
                <td>{{$item->element_name}}</td>
                <td>{{$item->district_id}}</td>
                <td>{{$item->material_name}}</td>
                <td>{{$item->element_size}}</td>
                <td>{{$item->element_length}}</td>
                <td>{{$item->single_weight}}</td>
                <td>{{$item->remarks}}</td>
                <td>{{$item->total_weight}}</td>
                <td>{{$item->status_name}}</td>
                <td>{{$item->location_name}}</td>
                <td>{{$item->area_name}}</td>
                @if(isset($item->ele_lat))
                    <td><A href="https://www.google.com/maps?q={{$item->ele_lat}},{{$item->ele_lon}}" target="_blank">Map</A></td>
                @elseif(isset($item->rack_lat))
                    <td><A href="https://www.google.com/maps?q={{$item->rack_lat}},{{$item->rack_lon}}" target="_blank">Map</A></td>
                @else
                    <td></td>
                @endif
                @if(isset($item->ele_id))
                    <td><A href="{{url('/rack')}}?id={{$item->rack_id}}">{{$item->rack_id}}</A></td>
                @else
                    <td><A href="{{url('/rack')}}?id={{$item->rack_id}}">{{$item->racktag_rack_id}}</A></td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2018 JFE Engineering Corporation.
@endsection
