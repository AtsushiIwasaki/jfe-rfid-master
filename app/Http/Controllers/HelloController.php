<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

global $head, $style, $body, $end;

$head = '<html><head>';

$style = <<<EOF
<style>
    body { font-size:16pt; color:#999; }
    h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
</style>
EOF;

$body = '</head><body>';
$end = '</body></head>';

function tag($tag, $txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
/*
    //
    public function index() {
        return <<<EOF
<html>
    <head>
        <title>Hello/Index</title>
        <style>
            body { font-size:16pt; color:#999; }
            h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
        </style>
    </head>
    <body>
        <h1>Index</h1>
        <p>これは、HelloコントローラのIndexアクションです</p>
    </body>
</html>
EOF;
    }
*/

/*
    public function index()
    {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello/Index') . $style . $body
            . tag('h1', 'Index') . tag('p', 'thie is Index page')
            . '<a href="/hello/other"> go to Other page</a>'
            . $end;
        return $html;
    }

    public function other()
    {
        global $head, $style, $body, $end;

        $html = $head . tag('title', 'Hello/Ohter') . $style . $body
            .tag('h1', 'Ohter') . tag('p', 'this is Other page') . $end;

        return $html;
    }
*/

/*
    //3-1 PHPテンプレートの利用
    public function index($id='zero')
    {
        //return view('hello.index');
        $data = ['msg'=>'これはコントローラから渡されたメッセージです', 'id'=>$id];
        return view('hello.index', $data);
    }
*/
    // 3-2 Bladeテンプレートを使う
    // view/hello/index.blade.phpに渡す
    public function index() {
//        $data = ['msg'=>'これはBladeを利用したサンプルです',];
//        return view('hello.index', $data);
        $data = [
            'msg'=>'お名前を入力してください',
        ];
        return view('hello.index', $data);
    }

    //3-2 Bladeテンプレートを使う
    //web.phpにRoute::post('hello', 'HelloController@post')を追加
    public function post(Request $request) {

        $msg = $request->msg;

        $data = [
            'msg' => 'こんにちは、' . $msg . 'さん！',
        ];

        return view('hello.index', $data);
    }
}
