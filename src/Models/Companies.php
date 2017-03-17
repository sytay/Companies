<?php

namespace Companies\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model {

    protected $table = 'companies';
    public $timestamps = false;
    protected $fillable = [
        'company_name',
        'company_address',
        'company_location',
        'company_description'
    ];
    protected $primaryKey = 'company_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_companies($params = array()) {
        $eloquent = self::orderBy('company_id');

        //location_name
        if (!empty($params['company_name'])) {
            $eloquent->where('company_name', 'like', '%' . $params['company_name'] . '%');
        }

        $companies = $eloquent->paginate(10); //TODO: change number of item per page to configs

        return $companies;
    }

    /**
     *
     * @param type $input
     * @param type $location_id
     * @return type
     */
    public function update_company($input) {
        $company_id = NULL;
        if (empty($company_id)) {
            $company_id = $input['company_id'];
        }

        $company = self::find($company_id);

        if (!empty($company)) {

            $company->company_name = $input['company_name'];
            $company->company_address = $input['company_address'];
            $company->company_location = $input['company_location'];
            $company->company_description = $input['company_description'];
            //if($input['location_status'] != NULL){
            $company->company_status = $input['company_status'];
            //}
            $company->save();

            return $company;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_company($input) {

        $company = self::create([
                    'company_name' => $input['company_name'],
                    'company_address' => $input['company_address'],
                    'company_location' => $input['company_location'],
                    'company_description' => $input['company_description'],
        ]);

        return $company;
    }

}
