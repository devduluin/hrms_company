@props([
    'name',
    'status',
    'url_preview',
    'url_edit',
    'url_edit',
])

<div class="col-span-12 flex flex-col border-b border-r border-dashed border-slate-300/80 px-5 py-5 sm:col-span-6 xl:col-span-3 [&amp;:nth-child(4n)]:border-r-0 [&amp;:nth-last-child(-n+4)]:border-b-0">
    <div
        class="image-fit h-52 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full  before:from-slate-900/90 before:to-black/20">
        <img class="rounded-md" src="{{ asset('img/logo/duluin.jpg') }}"
            alt="Tailwise - Admin Dashboard Template">
    </div>
    <div class="pt-5">
        <div
            class="mb-5 mt-auto flex flex-col gap-3.5 border-b border-dashed border-slate-300/70 pb-5">
            <div class="flex items-center">
                <div class="text-base font-medium">{{ $name }}</div>
                <div class="ml-auto">
                @if ($status == 'active')
                    <div class="flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success">
                        <span class="-mt-px">
                            Active
                        </span>
                    </div>
                @endif
                @if ($status == 'inactive')
                    <div class="flex items-center rounded-md border border-danger/10 bg-danger/10 px-1.5 py-px text-xs font-medium text-danger">
                        <span class="-mt-px">
                            Inactive
                        </span>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="flex items-center">
            <a class="mr-auto flex items-center text-primary" href ="{{ $url_preview ?? '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" data-lucide="pencil"
                    class="lucide lucide-kanban-square mr-1.5 h-4 w-4 stroke-[1.3]">
                    <rect width="18" height="18" x="3" y="3" rx="2">
                    </rect>
                    <path d="M8 7v7"></path>
                    <path d="M12 7v4"></path>
                    <path d="M16 7v9"></path>
                </svg>
                Edit
            </a>
            <a class="flex items-center text-danger" href ="{{ $url_delete ?? '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" data-lucide="trash2"
                    class="lucide lucide-trash2 mr-1.5 h-4 w-4 stroke-[1.3]">
                    <path d="M3 6h18"></path>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                    <line x1="10" x2="10" y1="11"
                        y2="17"></line>
                    <line x1="14" x2="14" y1="11"
                        y2="17"></line>
                </svg>
                Delete
            </a>
        </div>
    </div>
</div>