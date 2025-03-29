<button {{ $attributes->merge([
    'class' => 'block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-3xl text-sm px-5 py-2.5 text-center'
]) }}>
    {{ $slot }}
</button>

