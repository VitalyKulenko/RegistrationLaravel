<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EmailFilterController;

class SubmitCheckController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $emailFilterController = new EmailFilterController();

        if ($emailFilterController($request)) {
            return view('components.button-submit-disabled');
        } else {
            return view('components.button-submit');
        }
    }
}
