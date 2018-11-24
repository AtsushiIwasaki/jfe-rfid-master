<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    //index
    public function index(Request $request)
    {
        //IDが指定されていたら
        if(isset($request->id)) {
            $param = ['id' => $request->id];
            $items = DB::select('select locations.id as loc_id, areas.id as area_id, location_name, area_name 
                                        from locations inner join areas on locations.id = areas.location_id
                                        where locations.id = :id and locations.disable_flg = false and areas.disable_flg = false
                                        order by area_name', $param);
        }
        else{
            $items = DB::select('select locations.id as loc_id, areas.id as area_id, location_name, area_name 
                                    from locations inner join areas on locations.id = areas.location_id 
                                    order by area_name');
        }


        return view('area.index', ['items' => $items, 'id' => $request->id]);
    }

    //add
    public function add(Request $request)
    {
        $data = DB::select('select location_name from locations where id = ' . $request->id);

        if(isset($request->id)){
            return view('area.add', ['location_id' => $request->id, 'location_name' => $data[0]->location_name]);
        }
        else {
            return redirect('/location');
        }
    }

    //add execute
    public function create(Request $request)
    {
        $param = [
            'location_id' => $request->location_id,
            'area_name' => $request->area_name,
            'created_by' => 'test',
            'updated_by' => 'test',
        ];

        DB::insert('insert into areas
                           (area_name, location_id, created_by, updated_by)
                           values (:area_name, :location_id, :created_by, :updated_by)',
                            $param);
        return redirect('/area?id=' . $request->location_id);
    }

    //edit
    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from areas inner join locations on locations.id = areas.location_id where areas.id = :id', $param);
        return view('area.edit', ['form' => $item[0]]);
    }

    //edit execute
    public function update(Request $request)
    {
        $param = [
            'id'   => $request->id,
            'area_name' => $request->area_name,
            'created_by' => 'ore',
            'updated_by' => 'ore',
        ];

        DB::update('update areas 
                    set area_name =:area_name, created_by =:created_by, updated_by =:updated_by 
                    where id = :id', $param);
        return redirect('/area?id=' . $request->location_id);
    }

    //delete
    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from areas inner join locations on locations.id = areas.location_id where areas.id = :id', $param);
        return view('area.del', ['form' => $item[0]]);
    }

    //delete execute
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::update('update areas set disable_flg = true where id = :id', $param);
        return redirect('/area?id=' . $request->location_id);
    }
}
