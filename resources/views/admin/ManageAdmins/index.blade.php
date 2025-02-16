@extends('layouts.layout')
@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card">
        <div class="card-body">
            <x-alert message="success" type="success" />

            <h4 class="card-title">All Admins</h4>
            <a href="{{ route('admins.create') }}" class="btn btn-primary mt-4 mb-4">Add New</a>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td class="py-1">{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->role ?? 'No Role' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admins.edit', [$admin->id]) }}" class="btn btn"><i class="fas fa-pen"></i></a>
                                    <a href="{{ route('admins.show', [$admin->id]) }}" class="btn btn"><i class="fas fa-eye"></i></a>

                                    <form action="{{ route('admins.destroy', [$admin->id]) }}" method="post" id="delete-form-{{ $admin->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm" onclick="confirmDeletion('delete-form-{{ $admin->id }}');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    <!-- Include the DeleteConfirmation Component -->
                                    <x-confirm-delete-alert formId="delete-form-{{ $admin->id }}" confirmMessage="You will not be able to revert this Admin!" />
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

<nav aria-label="Page navigation">
    <ul class="pagination">
        {{ $admins->links() }}
    </ul>
</nav>

@endsection