{{--<html>--}}
    {{--<head>--}}
        {{--<title>Hello/Index</title>--}}
        {{--<style>--}}
            {{--body { font-size:16pt; color:#999; }--}}
            {{--h1 { font-size:50pt; text-align:right; color:#f6f6f6;--}}
                {{--margin:-20px 0px -30px 0px; letter-spacing:-4px; }--}}
        {{--</style>--}}
    {{--</head>--}}
    {{--<body>--}}
        {{--<h1>Blade/Index</h1>--}}
        {{--<p>{{$msg}}</p>--}}
        {{--<form method="POST" action="/hello">--}}
            {{--{{ csrf_field() }}--}}
            {{--<input type="text" name="msg">--}}
            {{--<input type="submit">--}}
        {{--</form>--}}
    {{--</body>--}}
{{--</html>--}}


{{--3ｰ4 レイアウトの作成--}}

<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- titleという名前のセクションに、indexというテキスト値を設定する-->
@section('title', 'index')

<!-- 親レイアウトに'menubar'というyieldがあれば、そこにはめ込まれて表示される-->
@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できます</p>
    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot
        @slot('msg_content')
            これはメッセージの表示です
        @endslot
    @endcomponent
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>
                Mail
            </th>
            <th>
                Age
            </th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
