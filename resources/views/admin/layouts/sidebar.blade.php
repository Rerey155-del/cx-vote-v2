<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-[8rem] h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white border-r">
    <div class="h-full py-4 overflow-y-auto flex flex-col items-center space-y-6">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="flex flex-col items-center justify-center px-2 py-2 rounded-lg w-20 h-20
          {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-800 hover:bg-gray-200' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 mb-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12
                 M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875
                 c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504
                 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span class="text-xs text-center mt-1">Dashboard</span>
        </a>
        {{-- candidate --}}
        <a href="{{ route('dashboard-candidate') }}"
            class="flex flex-col items-center justify-center px-2 py-2 rounded-lg w-20 h-20
          {{ request()->routeIs('dashboard-candidate') ? 'bg-blue-500 text-white' : 'text-gray-800 hover:bg-gray-200' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 mb-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM4.5 20.25a8.25 8.25 0 0115
                  0M21 12h-2m-7 9v-2m-9-7H3" />
            </svg>
            <span class="text-xs text-center mt-1">Kandidate</span>
        </a>

        <a href="{{ route('dashboard-keanggotaan') }}"
            class="flex flex-col items-center justify-center px-2 py-2 rounded-lg w-20 h-20
{{ request()->routeIs('dashboard-keanggotaan') ? 'bg-blue-500 text-white' : 'text-gray-800 hover:bg-gray-200' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 17.25v-3.375M12 17.25V12M15 17.25v-4.125M3.75 5.25a2.25 2.25 0 012.25-2.25h12a2.25 2.25 0 012.25 2.25v13.5a2.25 2.25 0 01-2.25 2.25h-12A2.25 2.25 0 013.75 18.75V5.25z" />
            </svg>
            <span class="text-xs text-center mt-1">Anggota</span>
        </a>

        {{-- attendance --}}
        <a href="{{ route('dashboard-attendance') }}"
            class="flex flex-col items-center justify-center px-2 py-2 rounded-lg w-20 h-20
{{ request()->routeIs('dashboard-attendance') ? 'bg-blue-500 text-white' : 'text-gray-800 hover:bg-gray-200' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 6.75h7.5m-7.5 3h4.5M12 2.25a9.75 9.75 0 11-9.75 9.75A9.75 9.75 0 0112 2.25z" />
            </svg>
            <span class="text-xs text-center mt-1">Kehadiran</span>
        </a>

        {{-- voters --}}
        <a href="{{ route('dashboard-voters') }}"
            class="flex flex-col items-center justify-center px-2 py-2 rounded-lg w-20 h-20
{{ request()->routeIs('dashboard-voters') ? 'bg-blue-500 text-white' : 'text-gray-800 hover:bg-gray-200' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 3.75h2.25A2.25 2.25 0 0121 6v2.25m-4.5-4.5l-6.75 6.75M9 15h1.5m-1.5 0a1.5 1.5 0 100 3h1.5a1.5 1.5 0 100-3m-1.5 0V9m1.5 6v3m5.25-6h1.5a1.5 1.5 0 011.5 1.5v4.5a1.5 1.5 0 01-1.5 1.5h-1.5a1.5 1.5 0 01-1.5-1.5v-4.5a1.5 1.5 0 011.5-1.5z" />
            </svg>
            <span class="text-xs text-center mt-1">Vote</span>
        </a>

        {{-- report --}}
        <a href="{{ route('dashboard-report') }}"
            class="flex flex-col items-center justify-center px-2 py-2 rounded-lg w-20 h-20
{{ request()->routeIs('dashboard-report') ? 'bg-blue-500 text-white' : 'text-gray-800 hover:bg-gray-200' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 17.25v-3.375M12 17.25V12M15 17.25v-4.125M3.75 5.25a2.25 2.25 0 012.25-2.25h12a2.25 2.25 0 012.25 2.25v13.5a2.25 2.25 0 01-2.25 2.25h-12A2.25 2.25 0 013.75 18.75V5.25z" />
            </svg>
            <span class="text-xs text-center mt-1">Report</span>
        </a>




    </div>
</aside>
