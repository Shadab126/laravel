@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Admin</h6>

                            <form id= "myForm" method="POST" action="{{ route('store.admin') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Admin User Name</label>
                                    <input type="text" name="username" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Admin Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Admin Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Admin Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Admin Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Admin Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                    <select type="text" name="roles" class="form-control"
                                        id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-inverse-primary me-2">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
