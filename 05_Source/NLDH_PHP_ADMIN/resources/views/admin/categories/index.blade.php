@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <style>
        .w-5,
        .h-5 {
            display: none;
        }
    </style>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">Danh sách danh mục sản phẩm</h3>
                        <div class="table-data__tool">
                            {{-- <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </div> --}}
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Thêm danh mục</button>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data1">
                            <table class="table table-data2" style="max-width: 100%;">
                                <thead>
                                    <tr>
                                        {{-- <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th> --}}
                                        <th>id</th>
                                        <th>Tên danh mục</th>
                                        <th>Danh mục cha</th>
                                        <th>slug</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="tr-shadow">
                                            {{-- <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td> --}}
                                            <td>{{ $category->id }}</td>
                                            <td>
                                                <span>{{ $category->name }}</span>
                                            </td>
                                            <td>{{ $category->parent_id }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <div class="table-data-feature float-left">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Pagination">
                                <ul class="pagination justify-content-between">

                                    {{-- Previous Page Link --}}
                                    @if ($categories->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Lùi</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $categories->previousPageUrl() }}"
                                                rel="prev">Lùi</a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($categories->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $categories->nextPageUrl() }}"
                                                rel="next">Tiếp</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Tiếp</span>
                                        </li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
