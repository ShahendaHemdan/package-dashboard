@extends('layouts.layout')
@section('content')
        <div class="breadcrumb-links">
            <span >Dashboard</span>
            <span class="separator">></span>
            <a href="{{ route('admins.index') }}">Admins</a>
            <span class="separator">></span>
            <span >Show Admin</span>
        </div>
                <div class="col-lg-12 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- Display flash message -->
                            <x-alert message="success" type="success" />

                            <h4 class="card-title mb-5"> {{$admin->name}}</h4>
                            <div class="card mb-5" style="width: 18rem;">
                                @if($admin->image)
                                    <img src="{{asset('storage/'.$admin->image ) }} " alt="image" />
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
                                            <td> {{ $admin->id }} </td>
                                        </tr>
                                        <tr>
                                            <td> Name </td>
                                            <td> {{ $admin->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>  Email </td>
                                            <td> {{ $admin->email }} </td>
                                        </tr>
                                        <tr>

                                            <tr>
                                                <td>  Role </td>
                                                <td> {{ $admin->role }} </td>
                                            </tr>
                                            <tr>

                                    </tbody>
                                </table>




                            </div>


                            <a href="{{ route('admins.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

@endsection
