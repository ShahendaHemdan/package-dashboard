@extends('layouts.layout')
@section('content')
        <div class="breadcrumb-links">
            <span >Dashboard</span>
            <span class="separator">></span>
            <a href="{{ route('users.index') }}">Users</a>
            <span class="separator">></span>
            <span > Add User</span>
        </div>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Add User </h3>

        </div>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Add User</h4>
                        <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{ route('users.store') }}">
                            @csrf
                        
                        <!-- Profile Picture -->
                        <div class="form-group">
                            <label>Profile Picture:</label>
                            <input type="file" name="image" id="image" class="file-upload-default" style="display: none;" onchange="previewImage(event, 'preview')" />
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="imageFileInfo" />
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

                                    <!-- Name -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}" />
                                </div>
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!-- Email -->
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="" />
                                </div>
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!-- Password -->
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                </div>
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Confirmation -->
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
                                    </div>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                            <!-- Phone -->
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Phone" value="{{ old('mobile') }}" />
                                </div>
                                @error('mobile')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        

                        
                            <!-- Submit and Cancel Buttons -->
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>


@endsection