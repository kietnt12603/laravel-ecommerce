@extends('admin.main')

@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Tên SP</th>
                    <th>Giá</th>
                    <th>Hình</th>
                    <th>Slug</th>
                    <th>Danh Mục</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productAddModal">
                            Thêm Danh Mục
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody id="table">
                @php
                    $i = 1;
                @endphp
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td><img src="/images/{{ $item->image }}" alt="" height="80px"></td>
                        <td>{{ $item->slug}}</td>
                        <td>{{ $item->category->name}}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}"
                                class="editProductBtn btn btn-success">Edit</button>
                            <button type="button" value="{{ $item->id }}"
                                class="deleteProductBtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $product->links('vendor.pagination.bootstrap-4') }}
    </div>

    @include('admin.product.modal')
@endsection
