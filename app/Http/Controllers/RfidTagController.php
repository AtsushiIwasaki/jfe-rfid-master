<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RfidTagController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = DB::select('select 
                                        tag_mappings.element_statuses_id as ele_id,
                                        element_statuses.rack_statuses_id as rack_id,
                                        tag_mappings.rack_statuses_id as racktag_rack_id,
                                        element_statuses.latitude as ele_lat,
                                        element_statuses.longitude as ele_lon,
                                        rack_statuses.latitude as rack_lat,
                                        rack_statuses.longitude as rack_lon,
                                        * 
                                    from rfid_tags
                                    left outer join tag_mappings
                                        on tag_mappings.tag_id = rfid_tags.id
                                        and tag_mappings.deleted_at is null
                                    left outer join element_statuses
                                        on element_statuses.id = tag_mappings.element_statuses_id
                                        and element_statuses.deleted_at is null
                                    left outer join rack_statuses
                                        on rack_statuses.id = tag_mappings.rack_statuses_id
                                        and rack_statuses.deleted_at is null
                                    left outer join elements
                                        on elements.id = element_statuses.element_id
                                        and elements.disable_flg = false
                                    left outer join statuses
                                        on statuses.id = element_statuses.status_id
                                        and statuses.disable_flg = false
                                    left outer join locations
                                        on locations.id = element_statuses.location_id
                                        and locations.disable_flg = false
                                    left outer join areas
                                        on areas.id = element_statuses.area_id
                                        and areas.disable_flg = false
                                    where rfid_tags.disable_flg = false
                                    order by device_id');
        //var_dump($items);
        return view('rfidtag.index', ['items' => $items]);
    }
}
