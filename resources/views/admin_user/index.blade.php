@extends('adminlte::page')

@section('content')
    @include('partials.alerts')
    <table id="users" class="table table-bordered table-hover dataTable" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Name
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Email
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Email verified at
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >User Projects
            </th>
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >User Technologies
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Type
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Status
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Action
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr role="row">
                <td>{{$user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>
                    @foreach($user->projects as $project)
                        {{ $project->project_name }}
                    @endforeach
                </td>
                <td>
                    @foreach($user->technologies as $technology)
                        {{ $technology->technology_name }}
                    @endforeach
                </td>
                <td>{{$user->type }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('users.show', ["user" => $user]) }}" type="button"
                           class="btn btn-info">View</a>
                        <a href="{{ route('users.edit', ["user" => $user]) }}" type="button"
                           class="btn btn-info">Edit</a>
                        <form method="POST" action="{{ route('users.destroy', ["user" => $user->id]) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="delete"  class="btn btn-info">

                        </form>
                    </div>
                </td>
        @endforeach
        </tbody>
    </table>

@stop
