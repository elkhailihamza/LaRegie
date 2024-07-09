<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white hover:bg-gray-100 focus:bg-gray-200 transition-all p-2 rounded-lg" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
    </svg>
</button>

<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{route('profile')}}" class="block flex justify-between px-4 py-2 hover:bg-gray-200 transition-all">
                <span>Profile</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                    <circle cx="12" cy="10" r="3" />
                    <circle cx="12" cy="12" r="10" />
                </svg></a>
        </li>
        <li>
            <form class="block px-4 py-2 hover:bg-red-200 transition-all" action="{{route('logout')}}" method="post">
                @csrf
                @method('post')
                <button class="flex justify-between w-full" type="submit">
                    <span>Sign Out</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h13M12 5l7 7-7 7" />
                    </svg></button>
            </form>
        </li>
    </ul>
</div>