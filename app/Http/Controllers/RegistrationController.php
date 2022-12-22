<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        DB::table('users')->insert([
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'country' => $_POST['country'],
            'photo' => file_get_contents($_FILES['photo']['tmp_name']),
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'date' => $_POST['date']
        ]);
    }

    public function emailFilter(Request $request)
    {
        $users = DB::table('users')->get();
        $email = $request->input('email');
        foreach ($users as $user) {
            if ($user->email === $email) {
                $filtered = true;
                break;
            } else {
                $filtered = false;
            }
        }
        return $filtered;
    }

    public function check(Request $request)
    {
        $filtered = RegistrationController::emailFilter($request);
        if ($filtered) {
            echo '<div id="emailError" hx-post="/registration/checkSubmit" hx-trigger="load" hx-sync="closest form:abort" hx-target="#submit" hx-swap="outerHTML" class="pl-0.5 text-red-600">email address already exists</div>';
        } else {
            echo '<div id="emailError" hx-post="/registration/checkSubmit" hx-trigger="load" hx-sync="closest form:abort" hx-target="#submit" hx-swap="outerHTML" class="pl-0.5 text-gray-300">this email is available</div>';
        }
    }


    public function checkSubmit(Request $request)
    {
        $filtered = RegistrationController::emailFilter($request);
        if ($filtered) {
            echo '<button type="submit" name="submit" id="submit" class="bg-gray-600 rounded-md py-2 px-8 my-auto ml-5 text-white" disabled>Submit</button>';
        } else {
            echo '<button type="submit" name="submit" id="submit" class="bg-red-600 rounded-md py-2 px-8 my-auto ml-5 text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Submit</button>';
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
