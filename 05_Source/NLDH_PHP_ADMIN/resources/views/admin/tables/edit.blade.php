@extends('layouts.admin')

@section('title')
    <title>{{ $tablePage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $addData,
        'page' => $tablePage,
        'link' => 'table.index',
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
                            <h3 class="card-title">{{ $editTable }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('table.update', ['id' => $table->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $tableName }}</label>
                                    <input type="text" name="name" value="{{ $table->name }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ $enterTableName }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $areaPage }}</label>
                                    <select name="area_id" id="area_id" class="form-control">
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}"
                                                {{ $table->area_id == $area->id ? 'selected' : '' }}>
                                                {{ $area->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

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
