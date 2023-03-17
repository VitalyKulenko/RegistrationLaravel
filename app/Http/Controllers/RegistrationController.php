<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->country = $request->input('country');
        $user->photo = $request->file('photo')->getContent();
        $user->title = $request->input('title');
        $user->description = $request->input('description');
        $user->date = $request->input('date');
        $user->save();
    }

    public function emailFilter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email'
        ]);
        return $validator->fails();
    }

    public function check(Request $request)
    {
        $validator = RegistrationController::emailFilter($request);
        if ($validator) {
            return view('layouts.emailMessageExists');
        } else {
            return view('layouts.emailMessageAvailable');
        }
    }


    public function checkSubmit(Request $request)
    {
        $validator = RegistrationController::emailFilter($request);
        if ($validator) {
            return view('layouts.buttonSubmitDisabled');
        } else {
            return view('layouts.buttonSubmit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
