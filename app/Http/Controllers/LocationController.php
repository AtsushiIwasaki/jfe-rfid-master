<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    //index
    public function index(Request $request)
    {
        $count_array = [];
        $i = 0;

        $items = DB::select('select * from locations where disable_flg = false order by id');
        $count = DB::select('select location_id, count(*) from areas where areas.disable_flg = false group by location_id order by location_id');

        //エリア数を配列に格納する（もっとスマートにできないの？）
        foreach($items as $value){
            $index =  array_search($value->id, array_column($count, 'location_id'));
            if($index !== false){
                $count_array[$i] = $count[$index]->count;
            }
            else{
                $count_array[$i] = 0;
            }
            $i++;
        }


        //countには順番にエリアのデータ数が入っている
        return view('location.index', ['items' => $items, 'count' => $count_array]);
    }

    //add
    public function add(Request $request)
    {
        return view('location.add');
    }

    //add execute
    public function create(Request $request)
    {
        $param = [
            'location_name' => $request->location_name,
            'project_id' => '0',
            'created_by' => 'test',
            'updated_by' => 'test',
        ];
        DB::insert('insert into locations 
                           (location_name, project_id, created_by, updated_by) 
                           values (:location_name, :project_id, :created_by, :updated_by)',
                           $param);
        return redirect('location');
    }

    //edit
    public function edit(Request $request)
    {
        //$param = ['id' => $request->id];
        //$item = DB::select('select * from locations where id = :id', $param);
        //return view('location.edit', ['form' => $item[0]]);
        $id = $request->id;
        $item = DB::table('locations')->where('id', $id)->first();
        return view('location.edit', ['form' => $item]);
    }

    //edit execute
    public function update(Request $request)
    {
        $param = [
            'id'   => $request->id,
            'location_name' => $request->location_name,
            'project_id' => '0',
            'created_by' => 'ore',
            'updated_by' => 'ore',
        ];

        DB::update('update locations 
                    set location_name =:location_name, project_id =:project_id, created_by =:created_by, updated_by =:updated_by 
                    where id = :id', $param);
        return redirect('/location');
    }

    //delete
    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from locations where id = :id', $param);
        return view('location.del', ['form' => $item[0]]);
    }

    //delete execute
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
//        DB::delete('delete from locations where id = :id', $param);
        DB::update('update locations set disable_flg = true where id = :id', $param);

        return redirect('/location');
    }
}
