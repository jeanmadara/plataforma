<div class="table-responsive">
    <table class="table" id="userWorkshops-table">
        <thead>
        <tr>
            <th>State</th>
        <th>User Id</th>
        <th>Workshop Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userWorkshops as $userWorkshop)
            <tr>
                <td>{{ $userWorkshop->state }}</td>
            <td>{{ $userWorkshop->user->name }}</td>
            <td>{{ $userWorkshop->workshop->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['userWorkshops.destroy', $userWorkshop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('userWorkshops.show', [$userWorkshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('userWorkshops.edit', [$userWorkshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas Seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
