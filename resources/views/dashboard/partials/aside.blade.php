<aside class="w-25">
    <div class="list-group">
        @if (auth()->user()->hasRole('organization_admin'))
            <a href="{{ route('dashboard.index') }}"
                class="list-group-item list-group-item-action @if (request()->is('dashboard')) active @endif"
                aria-current="true">Home</a>
            <a href="{{ route('dashboard.members') }}"
                class="list-group-item list-group-item-action @if (request()->is('dashboard/members')) active @endif"">Members</a>

            <a href="{{ route('dashboard.skills') }}"
                class="list-group-item list-group-item-action @if (request()->is('dashboard/skills')) active @endif"">Skills</a>

            <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
            <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
        @elseif(auth()->user()->hasRole('employee'))
            <a href="{{ route('dashboard.index') }}"
                class="list-group-item list-group-item-action @if (request()->is('dashboard')) active @endif"
                aria-current="true">Home</a>
        @endif
    </div>
</aside>
