@extends('layouts.helloapp')

@section('title', 'Delete')

@section('menubar')
    @parent
    ロケーションの削除
@endsection

@section('content')
    <A href="/location?id={{$form->id}}">戻る</A>
    <table>
        <form action="/location/del" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr>
                <th>location_name</th>
                <td>{{$form->location_name}}</td>
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
