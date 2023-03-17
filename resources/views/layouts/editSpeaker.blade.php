<tr class="editing flex py-3 basis-full justify-end">
    <td class="flex flex-wrap basis-full">
        <input name="firstName" placeholder="First name" value="{{ $user->firstName }}" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
        <input name="lastName" placeholder="Last name" value="{{ $user->lastName }}" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
        <input name="title" placeholder="Title" value="{{ $user->title }}" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
        <input name="date" placeholder="Date" value="{{ $user->date }}" type="date" min="{{ date('Y-m-d') }}" class="border-2 rounded-md p-1 my-1 ml-2 basis-full">
    </td>
    <td class="flex flex-wrap justify-end content-start mt-1">
        <button class="bg-red-600 rounded-md py-2 w-28 text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50" hx-put="/users/{{ $user->userID }}" hx-include="closest tr">Save</button>
        <button class="bg-gray-600 rounded-md py-2 mt-2 w-28 text-white hover:bg-gray-800 hover:shadow-lg hover:shadow-gray-800/50" hx-get="/users/{{ $user->userID }}">Cancel</button>
    </td>
</tr>