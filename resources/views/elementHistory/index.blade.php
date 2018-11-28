{{--3ｰ4 レイアウトの作成--}}

<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- titleという名前のセクションに、indexというテキスト値を設定する-->
@section('title', 'RFIDTag List')

<!-- 親レイアウトに'menubar'というyieldがあれば、そこにはめ込まれて表示される-->
@section('menubar')
    部材一覧
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
    <A href="{{url('/element')}}/">戻る</A>
    <br><br>
    部材
    <table>
        <tr>
            <th>ID</th>
            <th>図面No</th>
            <th>製品名</th>
            <th>連番</th>
            <th>工区</th>
            <th>部材</th>
            <th>鋼材</th>
            <th>長さ</th>
            <th>単重</th>
            <th>鉄板その他</th>
            <th>重量</th>
        </tr>
        <tr>
            <td>{{$items[0]->element_id}}</td>
            <td>{{$items[0]->doc_no}}</td>
            <td>{{$items[0]->element_name}}</td>
            <td>{{$items[0]->element_seq_id}}</td>
            <td>{{$items[0]->district_id}}</td>
            <td>{{$items[0]->material_name}}</td>
            <td>{{$items[0]->element_size}}</td>
            <td>{{$items[0]->element_length}}</td>
            <td>{{$items[0]->single_weight}}</td>
            <td>{{$items[0]->remarks}}</td>
            <td>{{$items[0]->total_weight}}</td>
        </tr>
    </table>
    <br>
    履歴
    <table>
        <tr>
            <th>時刻</th>
            <th>ステータス</th>
            <th>ロケーション</th>
            <th>エリア</th>
            <th>GPS</th>
            <th>ラックID</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->create_time}}</td>
                <td>{{$item->status_name}}</td>
                <td>{{$item->location_name}}</td>
                <td>{{$item->area_name}}</td>
                @if(isset($item->lat))
                    <td><A href="https://www.google.com/maps?q={{$item->lat}},{{$item->lon}}" target="_blank">Map</A></td>
                @else
                    <td></td>
                @endif
                <td><A href="{{url('/rack')}}?id={{$item->rack_statuses_id}}">{{$item->rack_statuses_id}}</A></td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2018 JFE Engineering Corporation.
@endsection
