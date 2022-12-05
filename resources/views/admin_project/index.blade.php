@extends('adminlte::page')

@section('content')
    @include('partials.alerts')
    <table id="projects" class="table table-bordered table-hover dataTable" role="grid"
           aria-describedby="example2_info">
        <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Project Name
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Developers Quantity
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
            >Project technology
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Created at
            </th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Updated at
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
            >Actions
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr role="row">
                <td>{{ $project->project_name }}</td>
                <td>{{ $project->developers_quantity }}</td>
                <td>
                    @foreach($project->technologies as $tech)
                        {{ $tech->technology_name }}<br>
                    @endforeach
                </td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('projects.show', ["project" => $project->id]) }}" type="button"
                           class="btn btn-info">View</a>
                        <a href="{{ route('projects.edit', ["project" => $project->id]) }}" type="button"
                           class="btn btn-info">Edit</a>
                        <form method="POST" action="{{ route('projects.destroy', ["project" => $project->id]) }}">
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
