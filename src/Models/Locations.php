<?php

namespace Companies\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model {

    protected $table = 'locations';
    public $timestamps = false;
    protected $fillable = [
        'location_name', 'location_alias', 'location_status'
    ];
    protected $primaryKey = 'location_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_locations($params = array()) {
        $eloquent = self::orderBy('location_id');

        //location_name
        if (!empty($params['location_name'])) {
            $eloquent->where('location_name', 'like', '%'. $params['location_name'].'%');
        }

        $locations = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $locations;
    }
    
    public function get_locations_array(){
        $locations = $this->get();
        $list = NULL;
        foreach ($locations as $location){
            $list[$location->location_id] = $location->location_name;
        }
        return $list;
    }


    /**
     *
     * @param type $input
     * @param type $location_id
     * @return type
     */
    public function update_location($input) {
        $location_id = NULL;
        if (empty($location_id)) {
            $location_id = $input['location_id'];
        }

        $location = self::find($location_id);

        if (!empty($location)) {

            $location->location_name = $input['location_name'];
            $location->location_alias = "0";
            //if($input['location_status'] != NULL){
                $location->location_status = "1";
            //}
            $location->save();

            return $location;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_location($input) {

        $location = self::create([
                    'location_name' => $input['location_name'],
                   
        ]);
        
        return $location;
    }
}
