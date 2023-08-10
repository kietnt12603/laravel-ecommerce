@extends('admin.main')

@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Thuộc Tính</th>
                    <th>Value</th>
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#attributesAddModal">
                            Thêm Danh Mục
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody id="table">
                @php
                    $i = 1;
                @endphp
                @foreach ($attributes as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{$item->value}}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}"
                                class="editAttributeBtn btn btn-success">Edit</button>
                            <button type="button" value="{{ $item->id }}"
                                class="deleteAttributeBtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $attributes->links('vendor.pagination.bootstrap-4') }}
    </div>

    @include('admin.attributes.modal')
@endsection
