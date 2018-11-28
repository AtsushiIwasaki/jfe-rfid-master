<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ElementHistoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $param = ['id' => $request->id];
        $items = DB::select('select element_histories.created_at as create_time, 
                                    element_histories.latitude as lat,
                                    element_histories.longitude as lon,
                                    * from element_histories 
                                    inner join element_statuses on element_statuses.id = element_histories.element_statuses_id
                                    and element_statuses.deleted_at is null
                                    inner join elements on elements.id = element_statuses.element_id
                                    and elements.disable_flg = false
                                    left outer join statuses on statuses.id = element_histories.status_id
                                    and statuses.disable_flg = false
                                    left outer join locations on locations.id = element_histories.location_id
                                    and locations.disable_flg = false
                                    left outer join areas on areas.id = element_histories.area_id
                                    and areas.disable_flg = false
                                    where element_histories.element_statuses_id = :id
                                    order by element_histories.created_at', $param);
//        var_dump($items);
        return view('elementHistory.index', ['items' => $items]);
    }
}
