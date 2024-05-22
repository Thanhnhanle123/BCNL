@extends('layouts.admin')

@section('title')
    <title>{{ $areaPage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $editArea,
        'page' => $areaPage,
        'link' => 'area.index',
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
                            <h3 class="card-title">{{ $editArea }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('area.update', ['id' => $area->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $nameArea }}</label>
                                    <input type="text" name="nameArea" value="{{ $area->name }}" class="form-control @error('nameArea') is-invalid @enderror" placeholder="{{ $enterNameCategory }}">
                                    @error('nameArea')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $descriptionArea }}</label>
                                    <input type="text" name="descriptionArea" value="{{ $area->description }}" class="form-control"
                                        placeholder="{{ $enterDescriptionArea }}">
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
