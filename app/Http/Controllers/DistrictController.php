<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = DB::select('select * from Districts where disable_flg = false order by id');
        return view('district.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('district.add');
    }

    public function create(Request $request)
    {
        $param = [
            'district_name' => $request->district_name,
            'project_id' => '0',
            'created_by' => 'test',
            'updated_by' => 'test',
        ];

        DB::insert('insert into districts
                           (district_name, project_id, created_by, updated_by)
                           values (:district_name, :project_id, :created_by, :updated_by)',
            $param);
        return redirect(url('/district'));
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $items = DB::select('select * from districts where id = :id', $param);
        return view('district.edit', ['form' => $items[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id'   => $request->id,
            'district_name' => $request->district_name,
            'created_by' => 'ore',
            'updated_by' => 'ore',
        ];

        DB::update('update districts
                            set district_name = :district_name,
                                created_by = :created_by,
                                updated_by = :updated_by
                            where id = :id', $param);
        return redirect(url('/district'));
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from districts where id = :id', $param);
        return view('district.del', ['form' => $item[0]]);
    }

    //delete execute
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
//        DB::delete('delete from locations where id = :id', $param);
        DB::update('update districts set disable_flg = true where id = :id', $param);

        return redirect(url('/district'));
    }
}
