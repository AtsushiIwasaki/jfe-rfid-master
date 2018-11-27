@extends('layouts.helloapp')

@section('title', 'Edit')

@section('menubar')
    @parent
    エリア名の変更
@endsection

@section('content')
    <A href="{{url('/area')}}?id={{$form->location_id}}">戻る</A>
    <table>
        <form action={{url('/area/edit')}} method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$form->area_id}}">
            <input type="hidden" name="location_id" value="{{$form->location_id}}">
            <tr>
                <th>location_name</th>
                <td>{{$form->location_name}}</td>
            </tr>
            <tr>
                <th>area_name</th>
                <td><input type="text" name="area_name" value="{{$form->area_name}}"></td>
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
