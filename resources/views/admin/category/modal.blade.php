<div class="modal fade" id="categoryAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="saveCategory">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            id="name" placeholder="Nhập Tên Danh Mục">
                        @error('name')
                            <span class="text-danger" id="errorName">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="errorName"></span>
                    </div>
                    {{-- <div class="form-group">
                        <label>filter</label>
                        <input type="text" value="{{ old('filter') }}" name="filter" class="form-control"
                            id="filter" placeholder="Nhập filter">
                        @error('filter')
                            <span class="text-danger" id="errorFilter">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="errorFilter"></span>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Hình Ảnh</label><br>
                        <input type="file" name="images" class="file_img" id="images">

                        <br>
                        <p style="color: red;padding-top: 10px;" id="errorImg"></p>
                    </div>
                    <div class="form-group">
                        <Label>Trạng Thái</Label>
                        <input type="radio" name="active" value="1" checked> Kích Hoạt
                        <input type="radio" name="active" value="0"> Không
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa Danh Mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateCategory">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            id="name_edit" placeholder="Nhập Tên Danh Mục">
                        @error('name')
                            <span class="text-danger" id="errorName">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="errorName"></span>
                    </div>
                    {{-- <div class="form-group">
                        <label>filter</label>
                        <input type="text" value="{{ old('filter') }}" name="filter" class="form-control"
                            id="filter_edit" placeholder="Nhập filter">
                        @error('filter')
                            <span class="text-danger" id="errorFilter">{{ $message }}</span>
                        @enderror
                        <span class="text-danger" id="errorFilter"></span>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Hình Ảnh</label><br>
                        <input type="file" name="images" class="file_img" id="images_edit">
                        <img src="" width="100" id="hinh1" />
                        <br>
                        <p style="color: red;padding-top: 10px;" id="errorImg"></p>
                    </div>
                    <div class="form-group">
                        <Label>Trạng Thái</Label>
                        <input type="radio" name="active_edit" id="active1" value="1"> Kích Hoạt
                        <input type="radio" name="active_edit" id="active0" value="0"> Khóa
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
