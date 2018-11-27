@extends('layouts.helloapp')

@section('title', 'Delete')

@section('menubar')
    @parent
    ステータスの削除
@endsection

@section('content')
    <A href="{{url('/status')}}">戻る</A>
    <table>
        <form action="{{url('/status/del')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr>
                <th>status_name</th>
                <td>{{$form->status_name}}</td>
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
