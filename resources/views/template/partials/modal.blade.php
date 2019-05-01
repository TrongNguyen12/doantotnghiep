
<!-- start create customer -->
<div class="modal fade" id="create-cust" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tạo mới khách hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Mã khách hàng</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Mã khách hàng (Tự sinh nếu bỏ trống) " id="codeCus">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Tên khách hàng</b> <span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Tên khách hàng (Bắt buộc)" id="nameCus">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Giới tính</b> <span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                            <select class="ui dropdown fluid" name="sex" id="genderCus">
                              <option value="1">Nam</option>
                              <option value="0">Nữ</option>
                            </select>
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Ngày sinh</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Nhập ngày sinh dd/MM/yyyy" data-toggle="datepicker" id="dateCus">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Số điện thoại </b><span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Số điện thoại (Bắt buộc)" id="phoneCus">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Email</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="email" placeholder="Nhập email dạng email@gmail.com" id="emailCus">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Địa chỉ</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Nhập địa chỉ" id="addCus">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Ghi chú</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" id="noteCus">
                        </div>
                     </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crcust" onclick="pos_crCustomer();"><i
                        class="fa fa-check"></i> Lưu
                </button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Bỏ qua
                </button>
            </div>
            
        </div>
    </div>
</div>
<!-- end customer -->


<!-- start create suppliers -->
<div class="modal fade" id="create-suppliers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tạo mới nhà cung cấp</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Mã NCC:</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Mã nhà cung cấp (Tự sinh nếu bỏ trống) " id="codeSupp">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Tên NCC:</b> <span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Tên nhà cung cấp (Bắt buộc)" id="nameSupp">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Số điện thoại </b><span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Số điện thoại (Bắt buộc)" id="phoneSupp">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Email</b><span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="email" placeholder="Nhập email dạng email@gmail.com" id="emailSupp">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Địa chỉ</b><span style="color: red"> *</span></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" placeholder="Nhập địa chỉ" id="addSupp">
                        </div>
                     </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><b>Ghi chú</b></label>
                     <div class="col-sm-9">
                       <div class="ui input fluid">
                          <input type="text" id="nodeSupp">
                        </div>
                     </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crcust" onclick="pos_crSuppliers();"><i
                        class="fa fa-check"></i> Lưu
                </button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Bỏ qua
                </button>
            </div>
            
        </div>
    </div>
</div>
<!-- end customer -->


{{-- quick view detal order --}}
<div class="modal fade modal-flex" id="quickvieworder" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="order_detal_ajax">
                    {{-- load ajax file custom.js --}}
                </div>
            </div>
        </div>
    </div>
{{-- end --}}
