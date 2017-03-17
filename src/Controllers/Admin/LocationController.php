<?php

namespace Companies\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Companies\Models\Locations;
/**
 * Validators
 */
use Companies\Validators\LocationAdminValidator;

class LocationController extends AdminController {

    public $data_view = array();
    private $obj_location = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_location = new Locations();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_location = $this->obj_location->get_locations($params);

        $this->data_view = array_merge($this->data_view, array(
            'locations' => $list_location,
            'request' => $request,
            'params' => $params
        ));
        return view('company::location.admin.location_list', $this->data_view);
        
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $location = NULL;
        $location_id = (int) $request->get('id');


        if (!empty($location_id) && (is_int($location_id))) {
            $location = $this->obj_location->find($location_id);
        }

        $this->obj_location_categories = new Locations();

        $this->data_view = array_merge($this->data_view, array(
            'location' => $location,
            'request' => $request
        ));
        return view('company::location.admin.location_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new LocationAdminValidator();

        $location_id = (int) $request->get('id');
        $location_name = $request->get('location_name');
        $location_alias = $request->get('location_alias');
        $location_status = $request->get('location_status');
        //$location_image = NULL;
        $location = NULL;
//        if ($request->hasFile('location_image')){
//            if ($request->file('location_image')->isValid()) {
//                $image = $request->file('location_image');
//                $filename = $location_name . "." . $image->extension();
//                $image->storeAs('public/images', $filename);
//                $location_image = 'images/'.$filename;
//            }
//        }
        $input['location_name'] = $location_name;
        $input['location_alias'] = $location_alias;
        $input['location_status'] = $location_status;
        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($location_id) && is_int($location_id)) {

                $location = $this->obj_location->find($location_id);
            }
        } else {
            if (!empty($location_id) && is_int($location_id)) {
                $location = $this->obj_location->find($location_id);

                if (!empty($location_id) && is_int($location_id)) {

                    $input['location_id'] = $location_id;
                    $location = $this->obj_location->update_location($input);

                    //Message
                    $this->addFlashMessage('message', trans('company::location_admin.message_update_successfully'));
                    return Redirect::route("admin_location.edit", ["id" => $location_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('company::location_admin.message_update_unsuccessfully'));
                }
            } else {
                $location = $this->obj_location->add_location($input);

                if (!empty($location)) {

                    //Message
                    $this->addFlashMessage('message', trans('company::location_admin.message_add_successfully'));
                    return Redirect::route("admin_location.edit", ["id" => $location->location_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('company::location_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'location' => $location,
            'request' => $request,
                ), $data);
        return view('company::location.admin.location_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $location = NULL;
        $location_id = $request->get('id');

        if (!empty($location_id)) {
            $location = $this->obj_location->find($location_id);

            if (!empty($location)) {
                //Message
                $this->addFlashMessage('message', trans('company::location_admin.message_delete_successfully'));

                $location->delete();
            }
        } else {
            
        }

        $this->data_view = array_merge($this->data_view, array(
            'location' => $location,
        ));

        return Redirect::route("admin_location");
    }

}
