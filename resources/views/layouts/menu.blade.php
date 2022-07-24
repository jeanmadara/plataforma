@can('users.index')
<a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
@endcan
@can('roles.index')
<a class="nav-link" href="/roles">
    <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
@endcan

@can('scholarships.index')
<li class="nav-item">
    <a href="{{ route('scholarships.index') }}"
       class="nav-link {{ Request::is('scholarships*') ? 'active' : '' }}">
        <p>Becas</p>
    </a>
</li>
@endcan

@can('categories.index')
<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>Actividades</p>
    </a>
</li>
@endcan


<li class="nav-item">
    <a href="{{ route('profiles.index') }}"
       class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
        <p>Perfil</p>
    </a>
</li>


@can('workshops.index')
<li class="nav-item">
    <a href="{{ route('workshops.index') }}"
       class="nav-link {{ Request::is('workshops*') ? 'active' : '' }}">
        <p>Workshops</p>
    </a>
</li>
@endcan

<li class="nav-item">
    <a href="{{ route('userWorkshops.index') }}"
       class="nav-link {{ Request::is('userWorkshops*') ? 'active' : '' }}">
        <p>User Workshops</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sessions.index') }}"
       class="nav-link {{ Request::is('sessions*') ? 'active' : '' }}">
        <p>Sessions</p>
    </a>
</li>


