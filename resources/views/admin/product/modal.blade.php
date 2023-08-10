<div class="modal fade" id="productAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="saveProduct">
                    <div id="errorMessage" class="d-none alert alert-danger" role="alert">
                    </div>
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" name="name" id="name" class="form-control"  value="">
                        <p style="color: red; padding-top: 10px;" id="errorName"></p>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="number" name="price" id="price"  onkeyup="checkgia();" class="form-control" min="0" value="">
                                <p style="color: red; padding-top: 10px;" id="errorGia"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Giá giảm</label>
                                <input type="number" name="price_sale" id="price_sale"  onkeyup="checkgiagiam();" class="form-control" value="">
                                <p style="color: red; padding-top: 10px;" id="errorGiaGiam"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Hình Ảnh</label><br>
                                <input type="file" name="image" class="file_img" id="image">
                                <br>
                                <p style="color: red;padding-top: 10px;" id="errorImg"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Loại</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($category as $item1)
                                        <option value="{{$item1->id}}">{{$item1->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea name="description" id="description" cols="25" rows="5" onkeyup="checkmota();" class="form-control"  style="resize:none;"></textarea>
                        <p style="color: red;padding-top: 10px;" id="errorMoTa"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả chi tiết</label>
                        <textarea name="description_detail" id="editor1" cols="25" rows="10" onkeyup="checkmotact();" class="form-control"  style="resize:none;"></textarea>
                        <p style="color: red;padding-top: 10px;" id="errorMoTaCT"></p>
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

<div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateProduct">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" name="name" id="name_edit" class="form-control"  value="">
                        <p style="color: red; padding-top: 10px;" id="errorName"></p>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="number" name="price" id="price_edit"  onkeyup="checkgia();" class="form-control" min="0" value="">
                                <p style="color: red; padding-top: 10px;" id="errorGia"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Giá giảm</label>
                                <input type="number" name="price_sale" id="price_sale_edit"  onkeyup="checkgiagiam();" class="form-control" value="">
                                <p style="color: red; padding-top: 10px;" id="errorGiaGiam"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Hình Ảnh</label><br>
                                <input type="file" name="image" class="file_img" id="image_edit">
                                <img src="" width="100" id="hinh1" />
                                <br>
                                <p style="color: red;padding-top: 10px;" id="errorImg"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Loại</label>
                                <select name="category_id" id="category_id_edit" class="form-control">
                                    @foreach ($category as $item1)
                                        <option value="{{$item1->id}}">{{$item1->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea name="description" id="description_edit" cols="25" rows="5" onkeyup="checkmota();" class="form-control"  style="resize:none;"></textarea>
                        <p style="color: red;padding-top: 10px;" id="errorMoTa"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả chi tiết</label>
                        <textarea name="description_detail" id="editor2" cols="25" rows="10" onkeyup="checkmotact();" class="form-control"  style="resize:none;"></textarea>
                        <p style="color: red;padding-top: 10px;" id="errorMoTaCT"></p>
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
