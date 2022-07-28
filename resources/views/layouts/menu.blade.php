@can('scholarships.index')
      <li class="nav-item">
        <a data-toggle="collapse" href="#collapse1" class="nav-link"><p> <h5>Administrador</h5></p>
        </a>
        </li>
    
    <div id="collapse1" class="panel-collapse collapse">
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
    <a href="{{ route('userWorkshops.index') }}"
       class="nav-link {{ Request::is('userWorkshops*') ? 'active' : '' }}">
        <p>Asignar Curso</p>
    </a>
</li> 
    </div>
 @endcan

<!-- Roles y Permisos
        <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
<a class="nav-link" href="/roles">
    <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    Write your comments here -->
@can('scholarships.index')
      <li class="nav-item">
        <a data-toggle="collapse" href="#collapse2" class="nav-link"><p> <h5>Roles y Permisos</h5></p></a>
        </li>   
    <div id="collapse2" class="collapse">
    @can('users.index')
    <li class="nav-item">
    <a href="/usuarios"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
       <i class=" fas fa-users"></i><p> Usuarios</p>
    </a>
</li>
@endcan
@can('roles.index')
    <li class="nav-item">
    <a href="/roles"
       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
       <i class=" fas fa-user-lock"></i><p> Roles</p>
    </a>
@endcan
    </div>
@endcan

<!-- Cursos -->
@can('workshops.index')
      <li class="nav-item">
        <a data-toggle="collapse" href="#collapse3" class="nav-link"><p><h5>Cursos</h5></p></a>
        </li>
     
    
    <div id="collapse3" class="panel-collapse collapse">
 
    @can('workshops.index')
<li class="nav-item">
    <a href="{{ route('workshops.index') }}"
       class="nav-link {{ Request::is('workshops*') ? 'active' : '' }}">
        <p>Mis Cursos</p>
    </a>
</li>
@endcan 
@can('workshops.create')
<li class="nav-item">
    <a href="{{ route('workshops.create') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Nuevo Curso</p>
    </a>
</li>
@endcan 
@can('student.index')
<li class="nav-item">
    <a href="{{ route('userWorkshops.index') }}"
       class="nav-link {{ Request::is('userWorkshops*') ? 'active' : '' }}">
        <p>Cursos Disponibles</p>
    </a>
</li> 
@endcan
    </div>
@endcan

<!-- Otras Actividades  -->

@can('activities.index')
<li class="nav-item">
        <a data-toggle="collapse" href="#collapse4" class="nav-link"><p><h5>Otras Actividades</h5></p></a>
        </li>
     
    

    
    <div id="collapse4" class="panel-collapse collapse">
   
    <li class="nav-item">
    <a href="{{ route('activities.index') }}"
       class="nav-link {{ Request::is('userWorkshops*') ? 'active' : '' }}">
        <p>Actividades</p>
    </a>
    </li>
    @can('activities.create')
    <li class="nav-item">
    <a href="{{ route('activities.create') }}"
       class="nav-link {{ Request::is('userWorkshops*') ? 'active' : '' }}">
        <p>Nueva actividad</p>
    </a>
</li> @endcan


    </div>

@endcan



<li class="nav-item">
    <a href="{{ route('profiles.index') }}"
       class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}">
        <p>Perfil</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sessions.index') }}"
       class="nav-link {{ Request::is('sessions*') ? 'active' : '' }}">
        <p>Sessions</p>
    </a>
</li>


