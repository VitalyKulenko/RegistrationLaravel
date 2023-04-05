@extends('layouts.index')

@section('index-content')
    <form hx-post="registration" hx-encoding="multipart/form-data" hx-swap="none" @submit="localStorage.clear(); step2 =! step2; step3 =! step3" x-data="{step1: $persist(true), step2: $persist(false), step3: false, firstName: $persist(''), lastName: $persist(''), phone: $persist(''), email: $persist(''), country: $persist(''), title: $persist(''), description: $persist(''), date: $persist('')}" class="relative mx-auto max-w-7xl bg-white px-20 py-10 rounded-lg my-5" x-validate x-cloak>
        @csrf
        <div x-show="step1">
            <div class="absolute top-6 left-8 text-gray-400 text-2xl font-normal">
                <p>Step 1</p>
            </div>
            <div class="flex flex-wrap justify-end">
                <h1 class="flex text-4xl font-bold mb-6 basis-full justify-center">Registration</h1>
                <div class="flex basis-1/2 flex-wrap my-auto mt-0">
                    <input name="firstName" x-model="firstName" type="text" placeholder="First name" class="border-2 rounded-md p-1 basis-full my-1" required />
                    <input name="lastName" x-model="lastName" type="text" placeholder="Last name" class="border-2 rounded-md p-1 basis-full my-1" required />
                    <input name="phone" x-model="phone" type="text" placeholder="+99 (999) 999-9999" x-mask="+99 (999) 999-9999" class="border-2 rounded-md p-1 basis-full my-1" required />
                    <input name="email" hx-post="/emailCheck" hx-sync="closest form:abort" hx-trigger="change" hx-target="#emailMessage" 
                    hx-swap="outerHTML" x-model="email" type="email" placeholder="E-mail" class="border-2 rounded-md p-1 basis-full my-1" required />
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
                    <button :disabled="!(firstName && lastName && phone && email)" :class="!(firstName && lastName && phone && email) ? 'bg-gray-600 rounded-md py-2 px-8 my-auto ml-5 text-white hover:bg-gray-800 hover:shadow-lg hover:shadow-gray-800/50' : 'bg-red-600 rounded-md py-2 px-8 my-auto text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50'" @click="step1 =! step1; step2 =! step2" type="button">Next</button>
                </div>
            </div>
        </div>

        <div x-show="step2">
            <div class="absolute top-6 left-8 text-gray-400 text-2xl font-normal">
                <p>Step 2</p>
            </div>
            <div class="flex flex-wrap">
                <h1 class="flex text-4xl font-bold mb-6 basis-full justify-center">Registration</h1>
                <input name="title" x-model="title" type="text" placeholder="Title of the speech topic" class="border-2 rounded-md p-1 basis-full my-1"  required />
                <textarea name="description" x-model="description" type="text" placeholder="Brief description of the performance" maxlength="1000" class="border-2 rounded-md p-1 basis-full my-1" rows="4" required></textarea>
                <div class="flex basis-full">
                    <div class="flex flex-wrap basis-1/4">
                        <p>Performance date:</p>
                        <input name="date" x-model="date" class="border-2 rounded-md p-1 basis-full my-1" type="date" min="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="flex justify-end basis-3/4 mt-3">
                        <button @click="step1 =! step1; step2 =! step2" type="button" class="bg-red-600 rounded-md py-2 px-8 my-auto text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Back</button>
                        <button id="submit" type="submit" name="submit" class="bg-red-600 rounded-md py-2 px-8 my-auto ml-5 text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="step3">
            <div class="absolute top-6 left-8 text-gray-400 text-2xl font-normal">
                <p>Step 3</p>
            </div>
            <h1 class="flex text-4xl font-bold mb-6 basis-full justify-center">Congratulations!</h1>
            <div class="flex text-3xl mb-6 basis-full justify-center">You perform with the theme «<span x-text="title"></span>»!</div>
            <p class="flex mb-2 basis-full justify-center">Share on social networks:</p>
            <div class="flex basis-full justify-center">
                <a class="flex flex-nowrap py-2 px-5 bg-blue-800 rounded-md text-white hover:bg-blue-900 hover:shadow-lg hover:shadow-blue-900/50" href="https://www.facebook.com/share.php?u=google.com" target="_blank"><img class="mr-2" src="{{ url('/logos/facebook.svg') }}" alt="facebook">Facebook</a>
                <a class="flex flex-nowrap py-2 px-5 bg-sky-500 rounded-md text-white ml-2 hover:bg-sky-600 hover:shadow-lg hover:shadow-sky-600/50" x-bind:href="'https://twitter.com/intent/tweet?text=Hey,%20I\'m%20speaking%20on%20«' + title + '»!%20To%20know%20more:%20{{ $_SERVER['SERVER_NAME'] }}'" target="_blank"><img class="mr-2" src="{{ url('/logos/twitter.svg') }}" alt="twitter">Twitter</a>
            </div>
        </div>
    </form>
@stop