<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RackController extends Controller
{
    //
    public function index(Request $request)
    {
        $param = ['rack_id' => $request->id];

        $rack_tags = DB::select('select rack_statuses.id as rack_id, device_id, vendor_name, product_name, delivery_date, 
                                               rfid_tags.start_date, rfid_tags.end_date,
                                               location_name, area_name 
                                        from rack_statuses
                                        inner join tag_mappings
                                            on tag_mappings.rack_statuses_id = rack_statuses.id
                                            and tag_mappings.deleted_at is null
                                        inner join rfid_tags
                                            on rfid_tags.id = tag_mappings.tag_id
                                            and rfid_tags.disable_flg = false
                                        inner join locations
                                            on locations.id = rack_statuses.location_id
                                            and locations.disable_flg = false
                                        inner join areas
                                            on areas.id = rack_statuses.area_id
                                            and areas.disable_flg = false
                                    where
                                        rack_statuses.id = :rack_id
                                        and rack_statuses.deleted_at is null
                                    order by rack_statuses.id', $param);
//var_dump($rack_tags);
        $loc = ['rack_id' => $rack_tags[0]->rack_id, 'location' => $rack_tags[0]->location_name, 'area' => $rack_tags[0]->area_name];
//var_dump($loc);
        $elements = DB::select('select elements.id as element_id, element_statuses.rack_statuses_id as rack_id, * from elements 
                                        inner join element_statuses 
                                            on elements.id = element_statuses.element_id 
                                            and element_statuses.deleted_at is null
                                            and element_statuses.rack_statuses_id = :rack_id
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
                                    order by elements.id', $param);

        return view('rack.index', ['rack_location' => $loc, 'rack_tags' => $rack_tags, 'elements' => $elements]);
    }
}
