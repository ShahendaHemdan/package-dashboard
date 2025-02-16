@extends('layouts.layout')
@section('content')
<!-- parti  al -->
<div class="breadcrumb-links">
    <span >Dashboard</span>
    <span class="separator">></span>
    <a href="{{ route('roles.index') }}">Roles</a>
    <span class="separator">></span>
    <span >Update Roles</span>
</div>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Manage Roles and Permissions</h3>

        </div>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Manage Roles </h4>

                        <form action="{{ route('roles.store') }}" method="POST"  class="forms-sample">
                            @csrf
                            <h2>Add New Role</h2>
                            <input type="text" name="role_name" placeholder="Role Name" required class="form-control mb-3">
                            <button type="submit" class="btn btn-primary me-2">Add Role</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                        </div>
                </div>
            </div>


        </div>
    </div>

</div>


@endsection
