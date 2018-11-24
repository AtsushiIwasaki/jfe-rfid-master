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
            Locationテーブル
        @endslot
        @slot('msg_content')
            プロジェクトごとに拠点を定義します。
        @endslot
    @endcomponent
    <A href="/location/add">新規追加</A>
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                location_name
            </th>
            <th>レコード数</th>
            <th></th>
        </tr>
        <?php $i = 0?>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><A href="/area?id={{$item->id}}">{{$item->location_name}}</A></td>
                <td>{{$count[$i]}}</td>
                @if($count[$i] != 0)
                    <td><A href="/location/edit?id={{$item->id}}">変更</A>削除</td>
                @else
                    <td><A href="/location/edit?id={{$item->id}}">変更</A><A href="/location/del?id={{$item->id}}">削除</A></td>
                @endif
            </tr>
            <?php $i++ ?>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
