@extends('layouts.layout')
@section('content')
<div class="breadcrumb-links">
    <span >Dashboard</span>
    <span class="separator">></span>
    <a href="{{ route('courses.index') }}">Courses</a>
    <span class="separator">></span>
    <span >Show Course</span>
</div>
 
                <div class="col-lg-12 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- Display flash message -->
                            <x-alert message="success" type="success" />

                            <h4 class="card-title mb-5"> {{$course->name}}</h4>
                            <div class="card mb-5" style="width: 18rem;">
                                @if($course->image)
                                <img src="{{ asset('storage/' . $course->image) }}" alt="image" />

                                @else
                                    — 
                                @endif
                            </div>
                            
                            <div class="table-responsive mb-5">


                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Field </th>
                                            <th> Value </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>  ID </td>
                                            <td> {{ $course->id }} </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>  Name </td>
                                            <td> {{ $course->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>  Price </td>
                                            <td> {{ $course->price }} </td>
                                        </tr>
                                    
                                        <tr>
                                            <td>  Description </td>
                                            <td> {{ $course->description }} </td>
                                        </tr>
                                    
                                        
                                    </tbody>
                                </table>
                            </div>


                        

                            <a href="{{ route('courses.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
    

@endsection
