@extends('layouts.admin')

@section('title')
    <title>{{ $rolePage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $addData,
        'page' => $rolePage,
        'link' => 'role.index',
    ])

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $addRole }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $roleName }}</label>
                                    <input type="text" class="form-control @error('roleName') is-invalid @enderror"
                                        name="roleName" value="{{ old('roleName') }}" placeholder="{{ $enterRoleName }}">
                                    @error('roleName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $roleDisplayName }}</label>
                                    <input type="text"
                                        class="form-control @error('roleDisplayName') is-invalid @enderror"
                                        name="roleDisplayName" value="{{ old('roleDisplayName') }}" step="any"
                                        placeholder="{{ $enterRoleDisplayName }}">
                                    @error('roleDisplayName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row ml-2">
                                <div class="col-md-12">
                                    <input type="checkbox" name="" id="">
                                    <label for="">Chọn tất cả</label><br>
                                </div>
                                @foreach ($permissionGroups as $permissionGroup)
                                    <div class="col-md-3 m-3"
                                        style="box-shadow: 0px 0px 10px rgba(0, 1, 1, 0.5); border-radius: 10px">
                                        <h5><b>{{ $permissionGroup->name }}</b></h5>
                                        @foreach ($permissionGroup->permissions as $permission)
                                            <input type="checkbox" value="{{ $permission->id }}" name="permission_id[]">
                                            <label for="">{{ $permission->name }}</label><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ $add }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('js')
@endsection
