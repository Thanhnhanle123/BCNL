@extends('layouts.admin')

@section('title')
    <title>{{ $drinkPage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $editData,
        'page' => $employeePage,
        'link' => 'employee.index',
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
                            <h3 class="card-title">{{ $editEmployee }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('employee.update', ['id' => $employee->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $employeeName }}</label>
                                    <input type="text" class="form-control @error('employeeName') is-invalid @enderror"
                                        name="employeeName" value="{{ $employee->display_name }}" placeholder="{{ $enterEmployeeName }}">
                                    @error('employeeName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $password }}</label>
                                    <input type="text" class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" step="any" placeholder="{{ $enterPassword }}">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $email }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $employee->email }}" step="any" placeholder="{{ $enterEmail }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $roleName }}</label>
                                    <select class="form-control select2" name="roleId[]" id="role" multiple="multiple">
                                        @foreach ($roles as $role)
                                            <option
                                              {{ $rolesEmployee->contains("id", $role->id) ? 'selected' : '' }}
                                              value="{{ $role->id }}" >{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roleId')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
