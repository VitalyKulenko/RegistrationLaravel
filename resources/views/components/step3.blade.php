<form x-init="localStorage.clear();">
    @csrf
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
</form>