
<div class="tab-content mt-5">
    @foreach (['overview', 'details' ] as $tab)
        <div data-transition data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150"
            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100"
            data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100"
            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="{{ $tab }}" role="tabpanel"
            aria-labelledby="{{ $tab }}-tab"
            class="tab-pane leading-relaxed {{ $loop->first ? 'active' : '' }}">
            @include('dashboard.hrms.companies.company_' . $tab)
        </div>
    @endforeach
</div>
