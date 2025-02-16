@extends('layouts.layout')
@section('content')
<div class="main-panel">
    <div class="breadcrumb-links">
        <span >Dashboard</span>
        <span class="separator">></span>
        <a href="{{ route('courses.index') }}">Courses</a>
        <span class="separator">></span>
        <span >Update Course</span>
    </div>

     
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Update courses </h3>

        </div>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Update courses</h4>
                        <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{ route('courses.update',[$course->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" name="image" id="image" class="file-upload-default" style="display: none;" onchange="previewImage(event, 'preview')" />
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

                        
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $course->name }}" >
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" name="price" value="{{ $course->price }}" >
                            </div>
                        
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" >{{ $course->description }}</textarea>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection