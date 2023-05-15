<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepTwoRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class RegistrationStep2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepTwoRequest $request)
    {
        if ($request->input('action') == 'back') {
            $data = $request->all();
            $request->session()->put('data', $data);
            return view('components.step1');
        } else if ($request->input('action') == 'submit') {
            $data = $request->session()->get('data');
            $dataStep2 = $request->all();
            $mergedData = array_merge($data, $dataStep2);           
            $user = User::create($mergedData);
            $request->session()->forget('data');
            return view('components.step3');
        }
    }
}
