@extends('adminlte::page')

@section('content')
    <div class="row">
        @include('partials.alerts')
        <div class="col-md-12">
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> {{ $user->name }} </strong>

                <p class="text-muted">
                    ID is # {{ $user->id }}
                </p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> User Project Name </strong>
                <li>
                    @foreach($user->projects as $project)
                        {{$project->project_name}}
                    @endforeach
                </li>
                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> User Technology Name </strong>
                <li>
                    @foreach($user->technologies as $technology)
                        {{ $technology->technology_name }}
                    @endforeach
                </li>
                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Created at </strong>

                <p> {{ $user->created_at }} </p>
                <hr>


                <strong><i class="fa fa-pencil margin-r-5"></i> Updatet at</strong>


                <p>  {{ $user->updated_at }} </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <a href="{{ route('users.edit', ["user" => $user->id]) }}" type="button" class="btn btn-info">Edit</a>
        </div>
    </div>

    </div>
    <a href="{{ route('admin_user.invoicepdf', ["user" => $user->id]) }}" type="button" class="btn btn-primary">
        <i class="fas fa-download"></i> Generate PDF
    </a>




@stop
