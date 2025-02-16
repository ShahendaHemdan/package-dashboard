@extends('layouts.layout')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <!-- Display flash message -->
                    <x-alert message="success" type="success" />
                </div>
                <div class="card-body">
                    <h4 class="card-title">All Permissions</h4>
                    @can('createRole')
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary mt-4 mb-4">Add New</a>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Permission Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{ $permissions->links() }}
        </ul>
    </nav>
@endsection