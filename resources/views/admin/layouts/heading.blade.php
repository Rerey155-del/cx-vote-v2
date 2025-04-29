@props(['title'])

<nav class="mb-6">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4 sm:px-12 sm:py-8 w-full">
        <div class="flex justify-between gap-8 items-center w-full">
            <h1 class="font-bold text-3xl">{{ $title }}</h1>

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
                    <img src="{{ asset('img/user.png') }}" alt="" >
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>
        </div>
    </div>
</nav>
