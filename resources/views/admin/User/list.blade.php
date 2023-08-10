@extends('admin.main')

@section('content')
    <div class="card-body table-responsive p-0">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Quyền Hạn</th>
                    <th>Trạng Thái</th>
                    <th>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#userAddModal">
                            Thêm Nhân Viên
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody id="table">
                @php
                    $i = 1;
                @endphp
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td><img src="/images/{{ $item->avatar }}" width="100" height="100" alt=""></td>
                        <td>
                            @if ($item->roles == '1')
                                Admin
                            @else
                                Nhân Viên
                            @endif
                        </td>
                        <td>
                            @if ($item->roles == '1')
                             <button type="button" disabled class="btn btn-default">Đây Là Tài Khoản Admin</button>
                            @else
                                <button type="button" value="{{ $item->id }}"
                                    class="editUserBtn btn btn-success">Edit</button>
                                <button type="button" value="{{ $item->id }}"
                                    class="deleteUserBtn btn btn-danger">Delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $user->links('vendor.pagination.bootstrap-4') }}
    </div>

    @include('admin.user.modal')
@endsection
