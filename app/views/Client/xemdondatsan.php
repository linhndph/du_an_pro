
<style>
.divto{
    display: flex;
}
.sign-in-area{
    margin-left: 100px;
    margin-top: 50px;
}
.input{
    
   margin-left: 110px;
   margin-top: 10px;
   margin-bottom: 10px;
    padding: 5px 100px 5px 100px;
}
::placeholder{
    text-align: center;
}
#ptttt{
    text-align: center;
}
.btn{
    margin-left: 240px;
    background-color: red;
    border-color: black;
    
}
</style>
<div class="divto">
<div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Đặt sân</span>
                                <h2>Giỏ hàng</h2>
                            </div>
                            
                                <div class="row">
                                <?php
                                
                   if(isset($_SESSION['dondatsan']) && (count($_SESSION['dondatsan']) > 0)){
                    echo '<table>
                    <tr>
                    <th style="width: 5%">STT</th>
                    <th style="width: 20%">Tên sân</th>
                    <th style="width: 15%">Giá sân</th>
                    <th style="width: 20%">Thể loại</th>
                    <th style="width: 30%">Ngày sử dụng sân</th>
                    <th style="width: 20%">Ca sử dụng</th>
                </tr>
                    ';
                    $i=0;
                    $tong=0;
                    foreach ($_SESSION['dondatsan'] as $item ) {
                        $tong+=$item[2];
                        echo '
                        <tr>
                        <td>'.($i+1).'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                        <td>'.$item[5].'</td>
                        <td><a href="ClientController.php?act=huydon&i='.$i.'">Xóa</a> </td>
                    </tr>
                        ';
                        $i++;
                    }
                    echo "<tr>
                    <td clospan='5'></td>
                    <td>Tổng tiền : </td>
                    <td>$tong</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>";
                    echo '</table>
                    

                    
                    ';
                   }
                    ?>
                                </div>
                                <a href="ClientController.php?act=san">Tiếp tục đặt sân</a> |  <a href="ClientController.php?act=huydon">Xóa đơn hàng</a>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Thanh toán</span>
                                <h2>Thông tin đặt sân</h2>
                            </div>
                            
                                <div class="row">
                                    <form action="ClientController.php?act=thanhtoan" method="post">
                                        <input type="hidden" name="tong_don_hang" value="<?php echo $tong  ?>">
                                <table >
                            <input class="input" type="hidden" value="<?php $bill = loadone_tk($_SESSION['id_tai_khoan']); if (isset($bill) && ($bill > 0)) echo $bill['id_tai_khoan'];?>" name="id" placeholder="id">
                                <tr><td><input class="input" type="text" value="<?php  if (isset($bill) && ($bill > 0)) echo $bill['ten_tai_khoan'];?>" name="hoten" placeholder="Nhập họ tên"></td></tr>
                                <tr><td><input class="input" type="text" value="<?php  if (isset($bill) && ($bill > 0)) echo  $bill['address'];?>" name="diachi" placeholder="Nhập địa chỉ"></td></tr>
                                <tr><td><input class="input" type="text" value="<?php  if (isset($bill) && ($bill > 0)) echo  $bill['email'];?>" name="email" placeholder="Nhập email"></td></tr>
                                <tr><td><input class="input" type="text" value="<?php  if (isset($bill) && ($bill > 0)) echo  $bill['sdt'];?>" name="sdt" placeholder="Nhập số điện thoại"></td></tr>
                                <tr>
                                    <td id="ptttt">Phương thức thanh toán <br>
                                    <input type="radio" name="pttt" id="" value="1"> Thanh toán khi đá xong <br>
                                    <input type="radio" name="pttt" id="" value="2"> Thanh toán chuyển khoản <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="btn" type="submit" name="thanhtoan" value="Thanh toán"></td>
                                </tr>
                                </table>
                                </form>
                                </div>
                                <a href="ClientController.php?act=san">Tiếp tục đặt sân</a> 
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
