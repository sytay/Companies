<?php

namespace Companies\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;

/**
 * Validators
 */
class AdminController extends Controller {

    public $data_view = array();
    private $obj_validator = NULL;

    public function __construct() {
        
    }

    public function addFlashMessage($message_key, $message_value) {
        \Session::flash($message_key, $message_value);
    }

}
