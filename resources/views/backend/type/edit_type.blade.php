@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Property  Type</h6>

                            <form method="post" action="{{ route('update.type') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $types->id}}">
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type Name</label>
                                    <input type="text" name="type_name" value="{{ $types->type_name}}"
                                        class="form-control
                                @error('type_name')
                                is-invalid
                                @enderror">
                                    @error('type_name')
                                        <span class="text-danger">{{ $message }}</span><br />
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type Icon</label>
                                    <input type="text" name="type_icon" value="{{ $types->type_icon}}"
                                        class="form-control
                                @error('type_icon')
                                is-invalid
                                @enderror">
                                    @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span><br />
                                    @enderror
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
