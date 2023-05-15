<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepOneRequest;
use Illuminate\Http\RedirectResponse;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepOneRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public');
            $data['photo'] = $request->file('photo')->hashName();
        }
        $request->session()->put('data', $data);
        return view('components.step2');
    }
}
