@extends('adminlte::page')

@section('content')

    <div class="row">
        @include('partials.alerts')
        <div class="col-md-12">
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> {{ Auth::user()->name }} </strong>

                <p class="text-muted">
                    ID is # {{ Auth::user()->id }}
                </p>

                <hr>
                <strong><i class="fa fa-pencil margin-r-5"></i> User email </strong>
                <p>
                    {{ Auth::user()->email }}
                </p>
                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> User Project Name </strong>
                <p>
                @foreach(Auth::user()->projects as $project)
                    <li>{{$project->project_name}}</li>
                    @endforeach
                    </p>
                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> User Technology Name </strong>
                    <p>
                    @foreach(Auth::user()->technologies as $technology)
                        <li>{{ $technology->technology_name }}</li>
                        @endforeach
                        </p>
                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Project Technology Name </strong>
                        <p>
                        @foreach($project->technologies as $project)
                            <li>{{ $project->technology_name }}</li>
                            @endforeach
                            </p>



                            <strong><i class="fa fa-pencil margin-r-5"></i> Created at </strong>

                            <p> {{ Auth::user()->created_at }} </p>
                            <hr>


                            <strong><i class="fa fa-pencil margin-r-5"></i> Updatet at</strong>


                            <p>  {{ Auth::user()->updated_at }} </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>

            </div>

            <div>
                <a href="{{ route('user.invoicepdf') }}" type="button" class="btn btn-primary">
                    <i class="fas fa-download"></i> Generate PDF
                </a>
            </div>
@stop

