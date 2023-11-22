@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Roles in Permission</h6>

                            <form id= "myForm" method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('GET') --}}
                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Roles Name</label>
                                    <h3>{{$role->name}}</h3>
                                </div>

                                <div class="mb-2 form-check">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                    <label class="form-check-label" for="checkDefaultmain">
                                        Permission All
                                    </label>
                                </div>

                                <hr>


                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">

                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp

                                            <div class="mb-2 form-check">
                                                <input type="checkbox" class="form-check-input" id="checkDefault" {{
                                                    App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : ''
                                                }}>
                                                <label class="form-check-label" for="checkDefault">
                                                    {{ $group->group_name }}
                                                </label>
                                            </div>
                                        </div>




                                        <div class="col-9">

                                            @foreach ($permissions as $permission)
                                                <div class="mb-2 form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                    id="checkDefault{{ $permission->id }}" value="{{ $permission->name }}" name="permission[]"
                                                    {{
                                                        $role->hasPermissionTo($permission->id) ? 'checked' : ''
                                                    }}>
                                                    <label class="form-check-label"
                                                        for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            @endforeach

                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                                {{--  End Row --}}


                                <button type="submit" class="btn btn-inverse-primary me-2">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $('#checkDefaultmain').click(function(){
        if ($(this).is(':checked')) {
            $('input[type= checkbox]').prop('checked', true);
        }else{
            $('input[type= checkbox]').prop('checked', false);
        }
    });
</script>

@endsection
