@extends('layouts.admin')

@section('title')
    <title>{{ $categoryPage }}</title>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.headerContent', [
        'titleContent' => $editCategory,
        'page' => $categoryPage,
        'link' => 'categories.index',
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
                            <h3 class="card-title">{{ $editCategory }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ $nameCategory }}</label>
                                    <input type="text" name="nameCategory" value="{{ $category->name }}" class="form-control @error('nameCategory') is-invalid @enderror" placeholder="{{ $enterNameCategory }}">
                                    @error('nameCategory')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ $descriptionCategory }}</label>
                                    <input type="text" name="descriptionCategory" value="{{ $category->description }}" class="form-control"
                                        placeholder="{{ $enterDescriptionCategory }}">
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
