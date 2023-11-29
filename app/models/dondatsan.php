<?php 
function insert_hoa_don($ma_dat_san, $tong_don_hang, $id_tk,$ten_kh,$sdt_kh ,$email,$dia_chi_kh,$pttt,$ten_san,$ca_san){
    $sql = "INSERT INTO `chi_tiet_dat_san`(`ma_dat_san`, `tong_don_hang`,`id_tai_khoan` ,`ten_kh`, `sdt_kh`,`email`,`dia_chi_kh`,`pttt`,`ten_san`,`ca_san`) 
    VALUES ('$ma_dat_san', '$tong_don_hang','$id_tk' ,'$ten_kh', '$sdt_kh','$email','$dia_chi_kh','$pttt','$ten_san','$ca_san');";
    pdo_execute($sql);
    
}
function load_billdatsan(){
    $sql="select * from chi_tiet_dat_san ORDER BY id_ctdatsan";
    $bill= pdo_query($sql);
    return $bill;

}

?>