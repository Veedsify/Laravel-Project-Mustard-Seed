<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            @if (auth()->user()->hasRole('admin'))
                <x-panel.sidebar.admin />
            @elseif(auth()->user()->hasRole('user'))
                <x-panel.sidebar.user />
            @elseif(auth()->user()->hasRole('volunteer'))
                <x-panel.sidebar.volunteer />
            @endif
        </ul>
    </div>
</div>
