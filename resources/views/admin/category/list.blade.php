@extends('admin.main')

@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Mã Loại</th>
                    <th>Tên Loại</th>
                    <th>Slug</th>
                    <th>Hình</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryAddModal">
                            Thêm Danh Mục
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody id="table">
                @php
                    $i = 1;
                @endphp
                @foreach ($menu as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td><img src="/images/{{ $item->images }}" alt="" height="80px"></td>
                        <td>
                            <button type="button" value="{{ $item->id }}"
                                class="editCategoryBtn btn btn-success">Edit</button>
                            <button type="button" value="{{ $item->id }}"
                                class="deleteCategoryBtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $menu->links('vendor.pagination.bootstrap-4') }}
    </div>

    @include('admin.category.modal')
@endsection
