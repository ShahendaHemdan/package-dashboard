@extends('layouts.layout')
@section('content')
                <div class="breadcrumb-links">
                    <span >Dashboard</span>
                    <span class="separator">></span>
                    <a href="{{ route('users.index') }}">Users</a>
                    <span class="separator">></span>
                    <span > Show User</span>
                </div>
                <div class="col-lg-12 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- Display flash message -->
                            <x-alert message="success" type="success" />

                            <h4 class="card-title mb-5"> {{$user->name}}</h4>
                            <div class="card mb-5" style="width: 18rem;">
                                @if($user->profile_image_url)
                                    <img src="{{asset('storage/'.$user->profile_image_url ) }} " alt="image" />
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
                                            <td> {{ $user->id }} </td>
                                        </tr>
                                        <tr>
                                            <td> Name </td>
                                            <td> {{ $user->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>  Email </td>
                                            <td> {{ $user->email }} </td>
                                        </tr>
                                        <tr>
                                            <td> Phone </td>
                                            <td> {{ $user->mobile }} </td>
                                        </tr>
                                        
                                        <tr>
                                            <td> WhatsApp Number </td>
                                            <td> {{ $user->whats_app_number  }} </td>
                                        </tr>

                                        <tr>
                                            <td> GMC Number </td>
                                            <td> {{ $user->gmc_number }} </td>
                                        </tr>
                                        <tr>
                                            <td> Exam Date </td>
                                            <td> {{ $user->exam_date }} </td>
                                        </tr>
                                        


                                    </tbody>
                                </table>




                            </div>


                            <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>


@endsection
