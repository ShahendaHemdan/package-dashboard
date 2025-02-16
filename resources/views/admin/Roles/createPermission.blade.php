@extends('layouts.layout')
@section('content')
<!-- parti  al -->
<div class="breadcrumb-links">
    <span >Dashboard</span>
    <span class="separator">></span>
    <a href="{{ route('permissions.index') }}">Permissions</a>
    <span class="separator">></span>
    <span >Add Permission</span>
</div>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Manage Roles and Permissions</h3>

        </div>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Manage Permissions</h4>

                    
                        <form action="{{ route('permissions.store') }}" method="POST" class="forms-sample">
                            @csrf
                            <h2>Add New Permission</h2>
                            <input type="text" name="permission_name" placeholder="Permission Name" required class="form-control mb-3">
                            <input type="text" name="group" placeholder="Group Name" required class="form-control mb-3">
                            <button type="submit" class="btn btn-primary">Add Permission</button>

                            <a href="{{route('permissions.index')}}" class="btn btn-light">Cancel</a>

                        </form>

                

                        </div>
                </div>
            </div>


        </div>
    </div>

</div>


@endsection
