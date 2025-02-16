@extends('layouts.layout')
@section('content')

    <div class="breadcrumb-links">
        <span >Dashboard</span>
        <span class="separator">></span>
        <a href="{{ route('admins.index') }}">Admins</a>
        <span class="separator">></span>
        <span >Create Admin</span>
    </div>

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Create Admins </h3>

        </div>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Create Admins</h4>
                        <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{route('admins.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role_id" required class="form-control form-control-lg">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="permissions">Assign Permissions:</label>
                                <select name="permissions[]" id="permissions" class="form-control" multiple>
                                        @foreach($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Profile Picture:</label>
                                <input type="file" name="image" id="image" class="file-upload-default" style="display: none;" onchange="previewImage(event, 'preview')"/>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="fileInfo" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('image').click()">Upload</button>
                                    </span>
                                </div>
                                <!-- Image Preview -->
                                <div id="previewContainer" style="margin-top: 10px; display: none;">
                                    <img id="preview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; border-radius: 5px;" />
                                </div> 
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('admins.index') }}" class="btn btn-light">Cancel</a>

                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection