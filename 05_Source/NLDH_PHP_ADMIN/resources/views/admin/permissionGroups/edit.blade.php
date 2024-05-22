@extends('layouts.admin')

@section('title')
    <title>{{ $permissionGroupPage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $editData,
        'page' => $permissionGroupPage,
        'link' => 'permissionGroup.index',
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
                        <form action="{{ route('permissionGroup.update', ['id' => $permissionGroup->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $namePermissionGroup }}</label>
                                    <input type="text" name="name" value="{{ $permissionGroup->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ $enterNamePermissionGroup }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $descriptionPermissionGroup }}</label>
                                    <input type="text" class="form-control" value="{{ $permissionGroup->description }}" name="description"
                                        placeholder="{{ $enterDescriptionPermissionGroup }}">
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
