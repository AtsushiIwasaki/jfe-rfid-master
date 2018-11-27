<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select elements.id as element_id, element_statuses.rack_statuses_id as rack_id, * from elements 
                                        inner join element_statuses 
                                            on elements.id = element_statuses.element_id 
                                            and element_statuses.deleted_at is null
                                        left outer join tag_mappings 
                                            on element_statuses.id = tag_mappings.element_statuses_id 
                                            and tag_mappings.deleted_at is null 
                                        left outer join rfid_tags 
                                            on tag_mappings.tag_id = rfid_tags.id 
                                            and rfid_tags.disable_flg = false
										left outer join districts
											on elements.district_id = districts.id
											and districts.disable_flg = false
										left outer join statuses
										    on element_statuses.status_id = statuses.id
										    and statuses.disable_flg = false
										left outer join locations
										    on element_statuses.location_id = locations.id
										    and locations.disable_flg = false
										left outer join areas
										    on element_statuses.area_id = areas.id
										    and areas.disable_flg = false
                                    where elements.disable_flg = false 
                                    order by elements.id');
//var_dump($items);
        return view('element.index', ['items' => $items]);
    }
}
