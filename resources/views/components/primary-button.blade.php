<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'w-full flex justify-center items-center px-4 py-3 bg-orange-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 focus:bg-orange-400 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
