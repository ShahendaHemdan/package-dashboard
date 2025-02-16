@extends('layouts.layout')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Courses</h4>
            @can('createCourse')
                <a href="{{route('courses.create')}}" class="btn btn-primary mb-4">Add New</a>
            @endcan

            <x-alert message="success" type="success" />
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td><img src="{{asset('storage/'.$course->image)}}" width="50"></td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->price }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    @can('updateCourse')
                                        <a href="{{ route('courses.edit', [$course->id]) }}" class="btn btn-sm"><i class="fas fa-pen"></i></a>
                                    @endcan
                                    @can('viewCourse')
                                        <a href="{{ route('courses.show', [$course->id]) }}" class="btn btn-sm"><i class="fas fa-eye"></i></a>   
                                    @endcan
                                    @can('deleteCourse')
                                    <form action="{{ route('courses.destroy', [$course->id]) }}" method="POST" id="delete-form-{{ $course->id }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn btn-sm" onclick="confirmDeletion('delete-form-{{ $course->id }}');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    <!-- Include the DeleteConfirmation Component -->
                                    <x-confirm-delete-alert formId="delete-form-{{ $course->id }}" confirmMessage="You will not be able to revert this Course!" />
                                @endcan

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection