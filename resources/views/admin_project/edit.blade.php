@extends('adminlte::page')

@section('content')

    <form method="POST" action="{{ route('projects.update', ["project" => $project->id]) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="inputName">Project Name</label>
                        <input type="text" class="form-control @error('project_name') is-invalid @enderror"  name="project_name" id="inputName"
                               value=" {{old('project_name') ?? $project->project_name }} ">
                        @error('project_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="developers_quantity">Developers Quantityt</label>
                        <input type="number" name="developers_quantity" id="developers_quantity" class="form-control @error('developers_quantity') is-invalid @enderror"
                               min="1" value="{{ $project->developers_quantity }}">
                        @error('developers_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="project_technologies">Project Technologies</label>
                        <select name="technology"
                                class="form-control custom-select @error('technology') is-invalid @enderror">
                            <option value="">Choose technology</option>
                            @foreach($technologies as $technology)
                                <option @if(old('technology') && $technology->technology_name === old('technology'))
                                        selected
                                        @endif
                                        value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                        @endforeach
                        </select>

                    </div>
                    <input type="submit" value="Save Changes" class="btn btn-info">
                </form>


@stop
