<div id="announcement"
     class="rounded-md bg-accent text-white filter drop-shadow-lg transition transform fixed bottom-2 min-w-max max-w-11/12 left-0 right-0 mx-auto py-3 px-4 z-50 sm:max-w-7/12 md:bottom-3 md:left-5 md:mx-0 md:max-w-5/12 lg:max-w-3/12"
>
    <div class="rounded-full bg-white animate-ping absolute -left-1.5 -top-1.5 p-1">
        <x-icons.exclamation class="h-4 w-4"></x-icons.exclamation>
    </div>
    <div class="rounded-full bg-white text-accent filter drop-shadow absolute -left-1.5 -top-1.5 p-1">
        <x-icons.exclamation class="h-4 w-4"></x-icons.exclamation>
    </div>
    <div class="flex justify-between items-center space-x-2">
        <p class="font-medium ml-2">{!! $slot !!}</p>
        <button
            class="btn text-white min-w-max hover:text-red-500 focus:ring-red-500 p-0 border-none"
            onclick="hideAnnouncement()"
        >
            <x-icons.close class="h-5 w-5"></x-icons.close>
        </button>
    </div>
</div>
