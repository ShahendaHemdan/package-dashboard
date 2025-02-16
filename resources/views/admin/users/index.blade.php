@extends('layouts.layout')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Students</h4>
            <a href="{{route('users.create')}}" class="btn btn-primary mt-4 mb-4">Add New</a>
        

        <x-alert message="success" type="success" />

        <div class="table-responsive">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                
                        <th colspan="3">Actions</th> <!-- Single column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        
                        <td class="py-1">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="image" />
                        </td>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                @can('createUser')
                                    
                                <a href="{{ route('users.show', [$user->id]) }}" class="btn btn"><i class="fas fa-eye"></i></a>
                                @endcan
                                @can('updateUser')
                                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-"><i class="fas fa-pen"></i></a>
                                @endcan
                                @can('deleteUser')
                                <form action="{{ route('users.delete', [$user->id]) }}" method="post" id="delete-form-{{ $user->id }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm" onclick="confirmDeletion('delete-form-{{ $user->id }}');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Include the DeleteConfirmation Component -->
                                <x-confirm-delete-alert formId="delete-form-{{ $user->id }}" confirmMessage="You will not be able to revert this User!" />
                            
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