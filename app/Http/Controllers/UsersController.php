<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(10);
        return view('speakers', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('userID', $id);
        echo '<tr class="flex basis-full border-b border-gray-300 py-3">
                <td class="basis-1/5 mr-5 my-auto"><img src="data:image/jpg;base64,'.base64_encode($user->value("photo")).'"></td>
                <td class="basis-1/5 my-auto text-lg">'.$user->value("firstName").'</td>
                <td class="basis-1/5 mr-5 my-auto text-lg">'.$user->value("lastName").'</td>
                <td class="basis-full my-auto text-lg">'.$user->value("title").'</td>
                <td class="basis-1/4 my-auto text-lg">'.$user->value("date").'</td>
                <td class="basis-1/12 my-auto text-lg">
                    <div hx-get="/users/'.$user->value("userID").'/edit" hx-trigger="click"><img class="w-4 ml-auto" src="'.url("/logos/edit.svg").'" alt="edit"></div>
                </td>
                <td hx-confirm="Are you sure?" class="basis-1/12 my-auto text-lg">
                    <div hx-delete="/users/'.$user->value("userID").'"><img class="w-4 ml-auto" src="'.url("/logos/delete.svg").'" alt="delete"></div>
                </td>
            </tr>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('userID', $id);
        echo '<tr class="editing flex py-3 basis-full justify-end">
                <td class="flex flex-wrap basis-full">
                    <input name="firstName" placeholder="First name" value="'.$user->value("firstName").'" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
                    <input name="lastName" placeholder="Last name" value="'.$user->value("lastName").'" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
                    <input name="title" placeholder="Title" value="'.$user->value("title").'" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
                    <input name="date" placeholder="Date" value="'.$user->value("date").'" type="date" min="{{ date(\'Y-m-d\') }}" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
                </td>
                <td class="flex flex-wrap justify-end content-start mt-1">
                    <button class="bg-red-600 rounded-md py-2 w-28 text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50" hx-put="/users/'.$user->value("userID").'" hx-include="closest tr">Save</button>
                    <button class="bg-gray-600 rounded-md py-2 mt-2 w-28 text-white hover:bg-gray-800 hover:shadow-lg hover:shadow-gray-800/50" hx-get="/users/'.$user->value("userID").'">Cancel</button>
                </td>
            </tr>';
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
        $method = $_SERVER['REQUEST_METHOD'];
        if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
            DB::table('users')
                ->where('userID', $id)
                ->update(['firstName' => $_PUT['firstName'],
                'lastName' => $_PUT['lastName'],
                'title' => $_PUT['title'],
                'date' => $_PUT['date'],
            ]);
        }
        UsersController::show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('userID', $id)->delete();
    }
}
