@extends('layouts.index')

@section('index-content')
    <div x-data="{addSpeaker: false, message: false}" class="mx-auto max-w-7xl bg-white px-20 py-10 rounded-lg my-5 relative" x-cloak>
        <table class="flex flex-wrap">
            <caption class="flex text-4xl font-bold mb-6 basis-full justify-center">Speakers</caption>
            @if (Auth::user())
                @if (Auth::user()->role == 'admin')
                    <button @click="addSpeaker = ! addSpeaker" type="button" class="absolute right-20 bg-red-600 rounded-md py-2 px-8 my-auto text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Add speaker</button>
                @endif
            @endif
            <tbody class="flex flex-wrap basis-full" hx-target="closest tr" hx-swap="outerHTML">
                <tr x-show="addSpeaker">
                    <td>
                        <form hx-post="registration" hx-encoding="multipart/form-data" hx-swap="none" @submit="addSpeaker =! addSpeaker, message =! message, setTimeout(() => message = false, 3000)" x-validate>
                            @csrf
                            <div class="editing flex py-3 basis-full justify-end border-b">
                                <div class="flex flex-wrap basis-full">
                                    <input name="firstName" type="text" placeholder="First name" class="border-2 rounded-md p-1 my-1 basis-full" required/>
                                    <input name="lastName" type="text" placeholder="Last name" class="border-2 rounded-md p-1 my-1 basis-full" required/>
                                    <input name="phone" type="text" placeholder="+99 (999) 999-9999" x-mask="+99 (999) 999-9999" class="border-2 rounded-md p-1 basis-full w-full my-1" required/>
                                    <input name="email" hx-post="/registration/check" hx-sync="closest form:abort" hx-trigger="change" hx-target="#emailError" hx-swap="outerHTML" type="email" placeholder="E-mail" class="border-2 rounded-md p-1 basis-full my-1" required />
                                    <div id="emailError"></div>
                                </div>
                                <div class="flex flex-wrap basis-full content-start">
                                    <input name="title" type="text" placeholder="Title of the speech topic" class="border-2 rounded-md p-1 basis-full my-1 ml-2" required />
                                    <textarea name="description" type="text" placeholder="Brief description of the performance" maxlength="1000" class="border-2 rounded-md p-1 basis-full my-1 ml-2" rows="4" required></textarea>
                                </div>
                                <div class="flex flex-wrap content-start">
                                    <select name="country" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
                                        <option>United Kingdom</option>
                                        <option>Germany</option>
                                        <option>Poland</option>
                                        <option>USA</option>
                                        <option>China</option>
                                        <option>Japan</option>
                                        <option>Ukraine</option>
                                    </select>
                                    <input name="date" class="border-2 rounded-md p-1 basis-full my-1 ml-2 basis-full" type="date" min="{{ date('Y-m-d') }}" required>
                                    <input class="my-1 ml-2 basis-full" name="photo" type="file" required>
                                </div>
                                <div class="flex flex-wrap justify-end content-start mt-1">
                                    <button id="submit" type="submit" name="submit" class="bg-red-600 rounded-md py-2 ml-5 w-28 text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Save</button>
                                    <button @click="addSpeaker = ! addSpeaker" type="button" class="bg-gray-600 rounded-md py-2 ml-5 mt-2 w-28 text-white hover:bg-gray-800 hover:shadow-lg hover:shadow-gray-800/50">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr class="flex basis-full" x-show="message">
                    <td class="basis-full">
                        <div class="p-3 text-green-700 bg-green-300 rounded">
                            User was added
                        </div>
                    </td>
                </tr>
                @foreach ($users as $user)
                    <tr class="flex basis-full border-b border-gray-300 py-3">
                        <td class="basis-1/5 mr-5 my-auto"><img src="data:image/jpg;base64,{{ base64_encode($user->photo) }}"></td>
                        <td class="basis-1/5 my-auto text-lg">{{ $user->firstName }}</td>
                        <td class="basis-1/5 mr-5 my-auto text-lg">{{ $user->lastName }}</td>
                        <td class="basis-full my-auto text-lg">{{ $user->title }}</td>
                        <td class="basis-1/4 my-auto text-lg">{{ $user->date }}</td>
                        @if (Auth::user())
                            @if (Auth::user()->role == 'admin')
                                <td class="basis-1/12 my-auto text-lg"><div hx-get="{{ route('users.edit', $user->userID) }}" hx-trigger="click"><img class="w-4 ml-auto" src="{{ url('/logos/edit.svg') }}" alt="edit"></div></td>
                                <td hx-confirm="Are you sure?" class="basis-1/12 my-auto text-lg"><div hx-delete="{{ route('users.destroy', $user->userID) }}"><img class="w-4 ml-auto" src="{{ url('/logos/delete.svg') }}" alt="delete"></div></td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination mt-4" hx-boost="true">
            {{ $users->links() }}
        </div>
    </div>
@stop