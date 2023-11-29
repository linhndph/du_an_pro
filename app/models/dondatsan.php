<?php 
function insert_hoa_don($ma_dat_san, $tong_don_hang, $ten_kh,$sdt_kh ,$email,$dia_chi_kh,$pttt){
    $sql = "INSERT INTO `chi_tiet_dat_san`(`ma_dat_san`, `tong_don_hang`, `ten_kh`, `sdt_kh`,`email`,`dia_chi_kh`,`pttt`) 
    VALUES ('$ma_dat_san', '$tong_don_hang', '$ten_kh', '$sdt_kh','$email','$dia_chi_kh','$pttt');";
    pdo_execute($sql);
    
}
function load_billdatsan(){
    $sql="";
}

?>