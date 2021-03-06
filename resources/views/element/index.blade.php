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
    <A href="{{url('/')}}/">戻る</A>
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
            <th>時刻</th>
            <th>ステータス</th>
            <th>ロケーション</th>
            <th>エリア</th>
            <th>GPS</th>
            <th>ラックID</th>
            <th>履歴</th>
        </tr>
        @foreach($items as $item)
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
                <td>{{$item->create_time}}</td>
                <td>{{$item->status_name}}</td>
                <td>{{$item->location_name}}</td>
                <td>{{$item->area_name}}</td>
                @if(isset($item->latitude))
                    <td><A href="https://www.google.com/maps?q={{$item->latitude}},{{$item->longitude}}" target="_blank">Map</A></td>
                @else
                    <td></td>
                @endif
                <td><A href="{{url('/rack')}}?id={{$item->rack_id}}">{{$item->rack_id}}</A></td>
                @if(isset($item->create_time))
                    <td><A href="{{url('/elementHistory')}}?id={{$item->element_statuses_id}}">履歴</A></td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2018 JFE Engineering Corporation.
@endsection
