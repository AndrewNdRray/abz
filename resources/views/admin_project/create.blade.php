@extends('adminlte::page')

@section('content')
    <form method="POST" action="{{ route('projects.store') }}">

        @csrf
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="project_name">Create Project</label>
                        <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                               name="project_name" id="project_name"  value="{{ old('project_name') }}">
                        @error('project_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="developers_quantity">Developers Quantity</label>
                        <input type="number" name="developers_quantity" id="developers_quantity"
                               class="form-control @error('developers_quantity') is-invalid @enderror" min="1"
                               value="{{ old('developers_quantity') }}">
                        @error('developers_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_technologies">Project Technologies</label>
                        <select name="technologies[]" multiple
                            class="form-control custom-select @error('technology') is-invalid @enderror">
                            <option value="Cassin-Christiansen">Cassin-Christiansen</option>
                            <option value="Olson, Gleichner and Kuhlman">Olson, Gleichner and Kuhlman</option>
                            <option value="Bode, Nienow and Metz">Bode, Nienow and Metz</option>
                            <option value="Harris, Weber and Auer">Harris, Weber and Auer</option>
                            <option value="Osinski Ltd">Osinski Ltd</option>
                            <option value="Spinka Ltd">Spinka Ltd</option>
                            <option value="Windler Ltd">Windler Ltd</option>
                            <option value="Beer, Wyman and Gaylord 1">Beer, Wyman and Gaylord 1</option>
                            <option value="555 2">555 2</option>
                        </select>
                    <input type="submit" value="Create Project" class="btn btn-info">
                    </div>
                </form>

@endsection

