<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex w-full justify-center border border-indigo-600 rounded-md text-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
    {{ $slot }}
</button>
