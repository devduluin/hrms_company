<ul data-tw-merge role="tablist"
    class="p-0.5 border bg-slate-50/70 border-slate-200/70 rounded-lg dark:border-darkmode-400 w-full flex">
    @foreach (['overview' => 'kanban', 'condition' => 'pi', 'flexible' => 'coins'] as $id => $icon)
        <li id="{{ $id }}-tab" data-tw-merge role="presentation" class="focus-visible:outline-none flex-1">
            <button type="button" data-tw-merge data-tw-target="#{{ $id }}" role="tab"
                class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 rounded-md py-1.5 dark:border-transparent {{ $loop->first ? 'active' : '' }} [&.active]:text-slate-700 [&.active]:dark:text-white [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                <i data-tw-merge="" data-lucide="{{ $icon }}" class="inline-block h-5 w-5 mr-2 stroke-[1]"></i>
                {{ ucfirst($id) }}
            </button>
        </li>
    @endforeach
</ul>
