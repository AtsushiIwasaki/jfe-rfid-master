@extends('layouts.helloapp')

@section('title', 'Delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <A href="/area?id={{$form->location_id}}">戻る</A>
    <table>
        <form action="/area/del" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$form->id}}">
            <input type="hidden" name="location_id" value="{{$form->location_id}}">
            <tr>
                <th>location_name</th>
                <td>{{$form->location_name}}</td>
            </tr>
            <tr>
                <th>area_name</th>
                <td>{{$form->area_name}}</td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </form>
    </table>
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
