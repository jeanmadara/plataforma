@can('categories.index')
<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Actividades</p>
    </a>
</li>
@endcan

@can('scholarships.index')
<li class="nav-item">
    <a href="{{ route('scholarships.index') }}"
       class="nav-link {{ Request::is('scholarships*') ? 'active' : '' }}">
        <p>Becas</p>
    </a>
</li>
@endcan

<li class="nav-item">
    <a href="{{ route('profiles.index') }}"
       class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
        <p>Profiles</p>
    </a>
</li>


