<div class="modal fade" id="attributesAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class=" modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="saveAttributes">
                    <div id="errorMessage" class="d-none alert alert-danger" role="alert">
                    </div>
                    <div class="form-group">
                        <label for="">Tên Thuộc Tính</label>
                        <select name="name" id="name" class="form-control">
                            <option value="Color">Color</option>
                            <option value="Size">Size</option>
                        </select>
                    </div>

                    <div class="form-group value1">
                        <label for="">Giá Trị</label></label>
                        <input type="text" name="value" id="value" class="form-control">
                        <p style="color: red; padding-top: 10px;" id="errorName"></p>
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

<div class="modal fade" id="attributeEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class=" modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateAttribute">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="">Tên Thuộc Tính</label>
                        <select name="name" id="name_edit" class="form-control">
                            <option value="Color">Color</option>
                            <option value="Size">Size</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Giá Trị</label></label>
                        <input type="text" name="value" id="value_edit" class="form-control">
                        <p style="color: red; padding-top: 10px;" id="errorName"></p>
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
