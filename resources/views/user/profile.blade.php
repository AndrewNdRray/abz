@extends('layouts.main')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card-header">{{ __('Edit Profile') }}</div>

            <div class="card-body">
                @if ($errors-> any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email:') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}"
                                   disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="user_projects"
                               class="col-md-4 col-form-label text-md-right">{{ __('UserProject') }}</label>

                        <div class="col-md-6">
                            <select id="user_projects" class="form-control" name="user_projects">
                                @foreach($user->projects as $project)
                                    <option
                                        @if($user->projects()->where('project_id', $project->id)->exists())
                                        selected
                                        @endif
                                        value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_technologies"
                               class="col-md-4 col-form-label text-md-right">{{ __('UserTechnology') }}</label>

                        <div class="col-md-6">
                            <select id="user_technologies" class="form-control" name="user_technologies">
                                @foreach($user->technologies as $technology)
                                    <option
                                        @if($user->technologies()->where('technology_id', $technology->id)->exists())
                                        selected
                                        @endif
                                        value="{{$technology->id}}">{{$technology->technology_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection
