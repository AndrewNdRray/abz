@extends('adminlte::page')

@section('content')
    <div class="row">
        @include('partials.alerts')
        <div class="col-md-12">
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> {{ $project->project_name }} </strong>

                <p class="text-muted">
                    ID is # {{ $project->id }}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Developers quantity</strong>

                <p class="text-muted">{{ $project->developers_quantity }}</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Project Technology</strong>

                <li> @foreach($project->technologies as $technology)
                        {{ $technology->technology_name }}</li>
                @endforeach


                <hr>


                <strong><i class="fa fa-pencil margin-r-5"></i> Time</strong>

                <p> Created at {{ $project->created_at }} </p>
                <p> Updatet at {{ $project->updated_at }} </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <a href="{{ route('projects.edit', ["project" => $project->id]) }}" type="button"
               class="btn btn-info">Edit</a>
        </div>




@stop
