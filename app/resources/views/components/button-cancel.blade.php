<button {{ $attributes->merge(['type' => 'button', 'class' => 'ml-4 min-w-[130px] inline-flex items-center justify-center px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
