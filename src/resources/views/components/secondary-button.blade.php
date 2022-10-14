<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-slate-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-400 active:bg-slate-500 focus:outline-none focus:border-slate-500 focus:ring ring-slate-100 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
