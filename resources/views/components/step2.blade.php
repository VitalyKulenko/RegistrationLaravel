<form hx-post="registration2" hx-swap="outerHTML" hx-target="this">
    @if ($errors->any())
        <div class="bg-red-100 border-red-500 border-2 text-red-500 rounded-md p-1.5 mt-6 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <div class="absolute top-6 left-8 text-gray-400 text-2xl font-normal">
        <p>Step 2</p>
    </div>
    <div class="flex flex-wrap">
        <h1 class="flex text-4xl font-bold mb-6 basis-full justify-center">Registration</h1>
        <input name="title" x-model="title" type="text" placeholder="Title of the speech topic" class="border-2 rounded-md p-1 basis-full my-1"/>
        <textarea name="description" x-model="description" type="text" placeholder="Brief description of the performance" maxlength="1000" class="border-2 rounded-md p-1 basis-full my-1" rows="4"></textarea>
        <div class="flex basis-full">
            <div class="flex flex-wrap basis-1/4">
                <p>Performance date:</p>
                <input name="date" x-model="date" class="border-2 rounded-md p-1 basis-full my-1" type="date" min="{{ date('Y-m-d') }}">
            </div>
            <div class="flex justify-end basis-3/4 mt-3">
                <button name="action" value="back" type="submit" class="bg-red-600 rounded-md py-2 px-8 my-auto text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Back</button>
                <button name="action" value="submit" type="submit" class="bg-red-600 rounded-md py-2 px-8 my-auto ml-5 text-white hover:bg-red-800 hover:shadow-lg hover:shadow-red-800/50">Submit</button>
            </div>
        </div>
    </div>
</form>