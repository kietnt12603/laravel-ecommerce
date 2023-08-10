@extends('admin.main')

@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Tên Đăng Nhập</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Trạng Thái</th>
                    <th>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#customerAddModal">
                            Thêm Nhân Viên
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody id="table">
                @php
                    $i = 1;
                @endphp
                @foreach ($customers as $item)
                    <tr>
                        <td>{{ $item->user }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->tel == '')
                                Không Có                                
                            @else
                                {{ $item->tel }}
                            @endif
                        </td>
                        <td>
                            @if ($item->active == 0)
                                Khóa
                            @else
                                Kích Hoạt                                
                            @endif
                        </td>
                        <td>
                            <button type="button" value="{{ $item->id }}"
                                class="editCustomerBtn btn btn-success">Edit</button>
                            <button type="button" value="{{ $item->id }}"
                                class="deleteCustomerBtn btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $customers->links('vendor.pagination.bootstrap-4') }}
    </div>

    @include('admin.customer.modal')
@endsection
