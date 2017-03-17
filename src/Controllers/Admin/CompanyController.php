<?php

namespace Companies\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Companies\Models\Locations;
use Companies\Models\Companies;
/**
 * Validators
 */
use Companies\Validators\CompanyAdminValidator;

class CompanyController extends AdminController {

    public $data_view = array();
    private $obj_company = NULL;
    private $obj_location = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_company = new Companies();
        $this->obj_location = new Locations();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_company = $this->obj_company->get_companies($params);

        $this->data_view = array_merge($this->data_view, array(
            'companies' => $list_company,
            'request' => $request,
            'params' => $params
        ));
        return view('company::company.admin.company_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $company = NULL;
        $company_id = (int) $request->get('id');


        if (!empty($company_id) && (is_int($company_id))) {
            $company = $this->obj_company->find($company_id);
        }

        $this->obj_company_categories = new Locations();

        $this->data_view = array_merge($this->data_view, array(
            'company' => $company,
            'request' => $request
        ));
        return view('company::company.admin.company_edit', $this->data_view)
                        ->with('locations', $this->obj_location->get_locations_array());
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new CompanyAdminValidator();

        $company_id = (int) $request->get('id');
        $company_name = $request->get('company_name');
        $company_address = $request->get('company_address');
        $company_location = $request->get('company_location');
        $company_description = $request->get('company_description');
        $company = NULL;

        $input['company_name'] = $company_name;
        $input['company_address'] = $company_address;
        $input['company_location'] = $company_location;
        $input['company_description'] = $company_description;
        $data = array();

        if (!$this->obj_validator->validate($input)) {
            $data['errors'] = $this->obj_validator->getErrors();
            if (!empty($company_id) && is_int($company_id)) {
                $company = $this->obj_company->find($company_id);
            }
        } else {

            if (!empty($company_id) && is_int($company_id)) {
                $company = $this->obj_company->find($company_id);

                if (!empty($company_id) && is_int($company_id)) {

                    $input['company_id'] = $company_id;
                    $company = $this->obj_company->update_company($input);

                    //Message
                    $this->addFlashMessage('message', trans('company::company_admin.message_update_successfully'));
                    return Redirect::route("admin_company.edit", ["id" => $company_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('company::company_admin.message_update_unsuccessfully'));
                }
            } else {
                $company = $this->obj_company->add_company($input);

                if (!empty($company)) {

                    //Message
                    $this->addFlashMessage('message', trans('company::company_admin.message_add_successfully'));
                    return Redirect::route("admin_company.edit", ["id" => $company->company_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('company::company_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'company' => $company,
            'request' => $request,
                ), $data);

        return view('company::company.admin.company_edit', $this->data_view)
                        ->with('locations', $this->obj_location->get_locations_array());
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $company = NULL;
        $company_id = $request->get('id');

        if (!empty($company_id)) {
            $company = $this->obj_company->find($company_id);

            if (!empty($company)) {
                //Message
                $this->addFlashMessage('message', trans('company::company_admin.message_delete_successfully'));

                $company->delete();
            }
        } else {
            
        }

        $this->data_view = array_merge($this->data_view, array(
            'company' => $company,
        ));

        return Redirect::route("admin_company");
    }

}
