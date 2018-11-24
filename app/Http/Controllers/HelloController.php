<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    //index
    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    //index
    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    //add
    public function add(Request $request)
    {
        return view('hello.add');
    }

    //add execute
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('hello');
    }

    //edit
    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit', ['form' => $item[0]]);
    }

    //edit execute
    public function update(Request $request)
    {
        $param = [
            'id'   => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age,
        ];

        DB::update('update people set name =:name, mail =:mail, age =:age where id = :id', $param);
        return redirect('/hello');
    }

    //delete
    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }
}
