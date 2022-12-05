@extends('adminlte::page')

@section('content')
    <form method="POST" action="{{ route('users.update', ["user" => $user->id]) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name"
                               value=" {{ $user->name }} ">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                               id="email"
                               value=" {{ $user->email }} ">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select name="status" class="form-control custom-select @error('status') is-invalid @enderror">
                            <option @if(old('status') && "active" == old('status'))
                                    selected
                                    @endif
                                    value="active">Active
                            </option>
                            <option @if(old('status') && "not active" == old('status'))
                                    selected
                                    @elseif(empty(old('status')) && "not active" === $user->status)
                                    selected
                                    @endif
                                    value="not active">Not Active
                            </option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="inputStatus">User Project</label>
                            <select name="project_id"
                                    class="form-control custom-select @error('project_id') is-invalid @enderror">
                                @foreach($projects as $project)
                                    <option @if(old('project') && $project->project_name == old('project'))
                                            selected
                                            @endif
                                            value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="inputStatus">User Technology</label>
                                <select name="technology_id"
                                        class="form-control custom-select @error('technology_id') is-invalid @enderror">
                                    @foreach($technologies as $technology)
                                        <option
                                            @if(old('technology') && $technology->technology_name == old('technology'))
                                            selected
                                            @endif
                                            value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                                    @endforeach
                                </select>


                                @error('status')

                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <input type="submit" value="Save Changes" class="btn btn-info">
        </div>


@stop
