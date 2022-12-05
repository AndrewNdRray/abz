@extends('adminlte::page')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">

        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="inputName" value=" {{ '' }} ">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Email</label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror" value="{{old('email') }}">
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
                                    @endif
                                    value="not active">Not Active
                            </option>
                        </select>

                        <div class="form-group">
                            <label for="inputStatus">Project</label>
                            <select name="projects"
                                    class="form-control custom-select @error('projects') is-invalid @enderror">
                                @foreach($projects as $project)
                                    <option @if(old('project') && $project->project_name == old('project'))
                                            selected
                                            @endif
                                            value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>
                            @error('projects')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

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
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror" value="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       value="">
                            </div>


                            <input type="submit" value="Create User" class="btn btn-info">
                        </div>
                </form>



@endsection

