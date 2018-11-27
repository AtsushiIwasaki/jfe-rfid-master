<!-- 親レイアウトを指定 -->
@extends('layouts.helloapp')

<!-- タイトル名 -->
@section('title', 'Edit')

<!--　メニュー -->
@section('menubar')
    @parent
    ディストリクトの変更
@endsection

@section('content')
    <A href="{{url('/district')}}">戻る</A>
    <table>
        <form action="{{url('/district/edit')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr>
                <th>location_name</th>
                <td><input type="text" name="district_name" value="{{$form->district_name}}"></td>
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
