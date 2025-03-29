@props(['title'])

<nav class="mb-6">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4 sm:px-12 sm:py-8 w-full">
        <div class="flex justify-between items-center w-full">
            <h1 class="font-bold text-xl">{{ $title }}</h1>

            <div class="flex items-center">
                <div class="">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <x-primary-button
                            class="rounded-xl"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                        >
                            {{ 'Logout' }}
                        </x-primary-button>
                    </form>
                </div>
                <div class="ml-8">
                    <div class="">
                        <img src="" alt="{{ Auth::user()->name }}">
                    </div>
                    <p class="text-sm">{{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
</nav>
