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
    public function index($id='zero')
    {
        //return view('hello.index');
        $data = ['msg'=>'これはコントローラから渡されたメッセージです', 'id'=>$id];
        return view('hello.index', $data);
    }

}
