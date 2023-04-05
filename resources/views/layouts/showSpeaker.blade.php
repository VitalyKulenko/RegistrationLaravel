<tr class="flex basis-full border-b border-gray-300 py-3">
    <td class="basis-1/5 mr-5 my-auto">
        @if ($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}">
        @else
            <img src="{{ url('/logos/man-2.svg') }}">
        @endif
    </td>
    <td class="basis-1/5 my-auto text-lg">{{ $user->firstName }}</td>
    <td class="basis-1/5 mr-5 my-auto text-lg">{{ $user->lastName }}</td>
    <td class="basis-full my-auto text-lg">{{ $user->title }}</td>
    <td class="basis-1/4 my-auto text-lg">{{ $user->date }}</td>
    <td class="basis-1/12 my-auto text-lg">
        <div hx-get="/users/{{ $user->id }}/edit" hx-trigger="click"><img class="w-4 ml-auto" src="{{ asset('/logos/edit.svg') }}" alt="edit"></div>
    </td>
    <td hx-confirm="Are you sure?" class="basis-1/12 my-auto text-lg">
        <div hx-delete="/users/{{ $user->id }}"><img class="w-4 ml-auto" src="{{ asset('/logos/delete.svg') }}" alt="delete"></div>
    </td>
</tr>
<tr id="newUser"></tr>