@extends('layouts.admin')

@section('title')
    <title>{{ $permissionPage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $editData,
        'page' => $permissionPage,
        'link' => 'permission.index',
    ])

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $editPermission }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('permission.update', ['id' => $permission->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $permissionName }}</label>
                                    <input type="text" name="permissionName" value="{{ $permission->name }}"
                                        class="form-control @error('permissionName') is-invalid @enderror"
                                        placeholder="{{ $enterPermissionName }}">
                                    @error('permissionName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $permissionDescription }}</label>
                                    <input type="text"
                                        class="form-control @error('permissionDescription') is-invalid @enderror"
                                        name="permissionDescription" value="{{ $permission->display_name }}"
                                        placeholder="{{ $enterPermissionDescription }}">
                                    @error('permissionDescription')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $permissionKeyCode }}</label>
                                    {{-- <input type="text" class="form-control @error('permissionKeyCode') is-invalid @enderror"
                                        name="permissionKeyCode" value="{{ $permission->key_code }}" step="any" placeholder="{{ $enterPermissionKeyCode }}"> --}}
                                    <select name="permissionKeyCode" id="" class="form-control select2">
                                        @foreach (config('permission.table_module') as $table_module)
                                            @foreach (config('permission.model_children') as $model_children)
                                                <option
                                                    {{ $model_children . '_' . $table_module == $permission->key_code ? 'selected' : '' }}
                                                    value="{{ $model_children }}_{{ $table_module }}">
                                                    {{ $model_children }}_{{ $table_module }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('permissionKeyCode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $categoryPage }}</label>
                                    <select name="permissionGroupId" id="category" class="form-control select2">
                                        @foreach ($permissionGroups as $permissionGroup)
                                            <option value="{{ $permissionGroup->id }}"
                                                {{ $permission->permission_group_id == $permissionGroup->id ? 'selected' : '' }}>
                                                {{ $permissionGroup->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ $edit }}</button>
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
