<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = DB::select('select * from Statuses where disable_flg = false order by id');
        return view('status.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('status.add');
    }

    public function create(Request $request)
    {
        $param = [
            'status_name' => $request->status_name,
            'enable_status_screen' => 'false',
            'created_by' => 'test',
            'updated_by' => 'test',
        ];

        DB::insert('insert into statuses
                           (status_name, enable_status_screen, created_by, updated_by)
                           values (:status_name, :enable_status_screen, :created_by, :updated_by)',
            $param);
        return redirect(url('/status') . $request->location_id);
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $items = DB::select('select * from Statuses where id = :id', $param);
        return view('status.edit', ['form' => $items[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id'   => $request->id,
            'status_name' => $request->status_name,
            'created_by' => 'ore',
            'updated_by' => 'ore',
        ];

        DB::update('update statuses
                            set status_name = :status_name,
                                created_by = :created_by,
                                updated_by = :updated_by
                            where id = :id', $param);
        return redirect(url('/status'));
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from statuses where id = :id', $param);
        return view('status.del', ['form' => $item[0]]);
    }

    //delete execute
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
//        DB::delete('delete from locations where id = :id', $param);
        DB::update('update statuses set disable_flg = true where id = :id', $param);

        return redirect(url('/status'));
    }


}
