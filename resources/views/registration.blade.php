@extends('layouts.index')

@section('index-content')
    <div x-data="{firstName: $persist(''), lastName: $persist(''), phone: $persist(''), email: $persist(''), country: $persist(''), title: $persist(''), description: $persist(''), date: $persist('')}" class="relative mx-auto max-w-7xl bg-white px-20 py-10 rounded-lg my-5" x-cloak>
        <form hx-post="registration" hx-encoding="multipart/form-data" hx-swap="outerHTML" hx-target="this" hx-cache="false">
            @csrf
            <div class="absolute top-6 left-8 text-gray-400 text-2xl font-normal">
                <p>Step 1</p>
            </div>
            <div class="flex flex-wrap justify-end">
                <h1 class="flex text-4xl font-bold mb-6 basis-full justify-center">Registration</h1>
                <div class="flex basis-1/2 flex-wrap my-auto mt-0">
                    <input name="firstName" x-model="firstName" type="text" placeholder="First name" class="border-2 rounded-md p-1 basis-full my-1"/>
                    <input name="lastName" x-model="lastName" type="text" placeholder="Last name" class="border-2 rounded-md p-1 basis-full my-1"/>
                    <input name="phone" x-model="phone" type="text" placeholder="+99 (999) 999-9999" x-mask="+99 (999) 999-9999" class="border-2 rounded-md p-1 basis-full my-1"/>
                    <input name="email" hx-post="/emailCheck" hx-sync="closest form:abort" hx-trigger="change" hx-target="#emailMessage" 
                    hx-swap="outerHTML" x-model="email" type="email" placeholder="E-mail" class="border-2 rounded-md p-1 basis-full my-1"/>
                    <div id="emailMessage"></div>
                </div>
                <div class="flex basis-1/2 flex-wrap pl-16">
                    <div class="basis-1/2 my-2">
                        <p>Load your photo:</p>
                        <input name="photo" type="file">  
                    </div>
                    <div class="basis-1/2">
                        <p>Choose your country:</p>
                        <select name="country" x-model="country" class="border-2 rounded-md p-1">
                            <option>United Kingdom</option>
                            <option>Germany</option>
                            <option>Poland</option>
                            <option>USA</option>
                            <option>China</option>
                            <option>Japan</option>
                            <option>Ukraine</option>
                        </select>
                    </div>
                </div>
                <div class="flex mt-1">
                    <button :disabled="!(firstName && lastName && phone && email)" :class="!(firstName && lastName && phone && email) ? 'bg-gray-600 rounded-md py-2 px-8 my-auto ml-5 text-white hover:bg-gray-800 hover:shadow-lg hover:shadow-gray-800/50' : 'bg-red-600 rounded-md py-2 px-8 my-auto text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50'" id="submit" type="submit" name="submit">Next</button>
                </div>
            </div>
        </form>
    </div>
@stop