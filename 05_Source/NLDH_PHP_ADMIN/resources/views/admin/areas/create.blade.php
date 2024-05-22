@extends('layouts.admin')

@section('title')
    <title>{{ $areaPage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $addData,
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
                            <h3 class="card-title">{{ $addArea }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('area.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $nameArea }}</label>
                                    <input type="text" name="nameArea" value="{{ old('nameArea') }}" class="form-control @error('nameArea') is-invalid @enderror" placeholder="{{ $enterNameArea }}">
                                    @error('nameArea')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $descriptionArea }}</label>
                                    <input type="text" class="form-control" value="{{ old('descriptionArea') }}" name="descriptionArea"
                                        placeholder="{{ $enterDescriptionArea }}">
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
