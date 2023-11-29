<h2>Danh sách đặt sân:</h2>
<style>
    .timkiem{
        display: flex;
        
    }
.timkiem1>input{
    padding: 5px 50px 5px 5px;
}
.timkiem1>button{
    padding: 5px 5px 5px 5px;
   
}
.timkiem1{
    margin-left:3px;
}
.timkiem2{
    margin-left:600px;
}
.timkiem2>select{
    padding: 6px 150px 6px 5px;
}
.timkiem2>button{
    padding: 5px 5px 5px 5px;
   
}
</style>
<div  class="timkiem">

<div class="timkiem1">
<input type="text" name="" placeholder="Tìm kiếm theo tên">
<button type="button" class="btn btn-outline-danger">Tìm kiếm</button>
</div>
<div class="timkiem2">
<select name="" id="">
    <option value="">Sân bóng đá</option>
    <option value="">Sân bóng chuyền</option>
    <option value="">Sân bóng rổ</option>

</select>
<button type="button" class="btn btn-outline-danger">Tìm kiếm</button>
</div>

</div>
    <table class="table table-striped projects">
        <thead>
                <tr>
                      <th style="width: 1%">
                          Stt
                      </th>
                      <th style="width: 15%">
                          Mã đặt sân
                      </th>
                      <th style="width: 15%">
                          Tên sân
                      </th>
                      <th style="width: 15%">
                          Ca sân
                      </th>
                    
                      <th style="width: 10%">
                          Tên khách hàng
                      </th>
                      <th style="width: 10%">
                          ID tài khoản
                      </th>
                      <th style="width: 10%">
                          Số điện thoại
                      </th>
                      <th style="width: 10%">
                          Email
                      </th>
                      <th style="width: 10%">
                          Địa chỉ
                      </th>
                      <th style="width: 10%">
                          Phương thức thanh toán
                      </th>
                      <th style="width: 10%" class="text-center">
                          Trạng thái
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                 <?php  
                 foreach($bill as $hd){
                    extract($hd);
                 
                 ?>
                 <tr>
                      <td>
                      <?php echo $id_ctdatsan ?>
                      </td>
                      <td>
                          <a>
                              <?php echo $ma_dat_san ?>
                          </a>                     
                      </td>
                      <td>
                          <a>
                          <?php echo $ten_san ?>
                          </a>                     
                      </td>
                      <td>
                          <a>
                          <?php echo $ca_san ?>
                          </a>                     
                      </td>
                      <td>
                          <a>
                          <?php echo $ten_kh ?>
                          </a>                     
                      </td>
                      <td>
                          <a>
                          <?php echo $id_tai_khoan ?>
                          </a>                     
                      </td>
                      <td class="project_progress">
                       <!-- mô tả -->
                       <?php echo $sdt_kh ?>
                      </td>
                      <td>
                          <a>
                          <?php echo $email ?>
                          </a>                     
                      </td>
                      <td>
                          <a>
                          <?php echo $dia_chi_kh ?>
                          </a>                     
                      </td>
                     
                     
                      <td class="project_progress">
                       <!-- mô tả -->
                       <?php echo $pttt ?>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Đã đặt</span>
                      </td>
                      <td class="project-actions text-right">
                      
                          <a class="btn btn-info btn-sm" href="AdminController.php?act=suadsdatsan">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          <a class="btn btn-danger btn-sm" href="AdminController.php?act=xoadsdatsan">
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                          </a>
                      </td>
                  </tr>
                    <?php } ?>
              </tbody>
          </table>            