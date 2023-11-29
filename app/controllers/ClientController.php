<?php
session_start();
ob_start();

if (!isset($_SESSION["dondatsan"]))
    $_SESSION["dondatsan"] = [];
// session_destroy();        
include "../models/bienthe.php";
include "../models/ql_san.php";
include "../models/pdo.php";
include "../models/tintuc.php";
include "../models/taikhoan.php";
include "../models/danhmuc.php";
include "../models/lienhe.php";
include "../models/binhluan.php";
include "../models/datsan.php";
include "../models/casan.php";
include "../models/quanlyhethong.php";
include "../models/dondatsan.php";

$listdm = loadAll();



include "../views/Client/layout/header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case 'dangnhap':

            include "../views/Client/sign-in.php";
            break;

        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {

                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $taikhoan = checkuser($user, $pass);

                // var_dump($ten_dang_nhap);die();
                if (is_array($taikhoan)) {
                    extract($taikhoan);
                    $_SESSION['id_chuc_vu'] = $id_chuc_vu;
                    $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;
                    $_SESSION['id_tai_khoan'] = $id_tai_khoan;

                    echo "<script>window.location.href='ClientController.php?act=trangchu'</script>";
                    // header('location:ClientController.php');     
                    // include "../views/Client/layout/index.php";

                } else {
                    $thongbao = "Sai tài khoản hoặc mật khẩu vui lòng xem lại";
                    $_SESSION['thongbao'] = $thongbao;
                    header("location:?act=dangnhap");
                    // include "../views/Client/sign-in.php";
                    exit();
                }

            }

            break;
        case "trangchu":
            // var_dump($_SESSION["ten_dang_nhap"]);die();
            if (isset($_SESSION["ten_dang_nhap"])) {
                include "../views/Client/layout/index.php";
            }
            break;

        case 'dangky':
            include "../views/Client/sign-up.php";
            break;

        case "dk":
            if (isset($_POST["signup"]) && ($_POST['signup'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $id_chuc_vu = 3;
                $trang_thai = "Sử dụng";

                $img_tai_khoan = $_FILES['img_tai_khoan']['name'];
                $target_dir = "../views/Admin/quanlytaikhoan/anhtaikhoan/";
                $target_file = $target_dir . basename($_FILES['img_tai_khoan']['name']);
                if (move_uploaded_file($_FILES['img_tai_khoan']['tmp_name'], $target_file)) {
                    echo "Bạn đã upload ảnh thành công";
                } else {
                    echo "upload ảnh không thành công";
                }
                $ten_tai_khoan = $_POST['ten_tai_khoan'];

                insert_tai_khoan($ten_dang_nhap, $mat_khau, $sdt, $email, $address, $id_chuc_vu, $trang_thai, $img_tai_khoan, $ten_tai_khoan);
                $thongbao = "Đăng ký thành công. Đăng nhập ngay!";
                $_SESSION['thongbao'] = $thongbao;
                header("location:?act=dangnhap");
                // include "../views/Client/sign-in.php";
                exit();
            }
            break;

        case 'dangxuat':

            session_unset();
            // include "ClientController.php?act=xuat";
            header("location:?act");

            break;


        case "quenmk":
            include "../views/Client/quenmk.php";
            break;

        case "quenmatkhau":
            if (isset($_POST["quenmk"]) && $_POST["quenmk"]) {
                $email = $_POST['email'];
                $taikhoan = quen_mat_khau($email);
                if (is_array($taikhoan)) {
                    $thongbao = "Mật khẩu của bạn là: " . $taikhoan['mat_khau'];
                    $_SESSION['thongbao'] = $thongbao;
                    header('location:?act=quenmk');
                }
            }
            break;

        case 'suataikhoan':
            if (isset($_GET['id_tai_khoan']) && ($_GET['id_tai_khoan'] > 0)) {
                $id_tai_khoan = $_GET['id_tai_khoan'];
                $taikhoan = loadone_tk($id_tai_khoan);

            }
            include '../views/Client/suathongtintaikhoan.php';
            break;

        case 'suatk':
            $listchucvu = ds_tk_inner();
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_tai_khoan = $_POST['idtaikhoan'];
                $ten_dang_nhap = $_POST['tendangnhap'];
                $mat_khau = $_POST['matkhau'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $id_chuc_vu = $_POST['id_chuc_vu'];
                $trang_thai = $_POST['trangthai'];
                $img_tai_khoan = $_FILES['img_tai_khoan']['name'];
                $target_dir = "../views/Admin/quanlytaikhoan/anhtaikhoan/";
                $target_file = $target_dir . basename($_FILES['img_tai_khoan']['name']);
                if (move_uploaded_file($_FILES['img_tai_khoan']['tmp_name'], $target_file)) {
                    echo "Bạn đã upload ảnh thành công";
                } else {
                    echo "upload ảnh không thành công";
                }
                $ten_tai_khoan = $_POST['ten_tai_khoan'];

                update_tai_khoan($id_tai_khoan, $ten_dang_nhap, $mat_khau, $sdt, $email, $address, $id_chuc_vu, $trang_thai, $img_tai_khoan, $ten_tai_khoan);
                $thongbao = "Cập nhật thành công";
                $_SESSION['thongbao'] = $thongbao;

            }
            header('location:?act=suataikhoan');
            $listtk = loadAll_tai_khoan();
            break;



        case 'listsan5':
            $listbienthe = ds_san_inner();
            include '../views/Client/listsan5.php';
            break;
        case 'listsan7':
            $listbienthe = ds_san_inner();
            include '../views/Client/listsan7.php';
            break;
        case 'listsan9':
            $listbienthe = ds_san_inner();
            include '../views/Client/listsan9.php';
            break;
        case 'listsan11':
            $listbienthe = ds_san_inner();
            include '../views/Client/listsan11.php';
            break;
        case 'chitietsan':
            if (isset($_SESSION['id_tai_khoan'])) {
                $id_TaiKhoan = loadone_tk($_SESSION['id_tai_khoan']);
            }


            if (isset($_GET['id_san']) && $_GET['id_san'] > 0) {
                $id_san = $_GET['id_san'];
                $chitietsan = loadone_SAN_BT($id_san);
                $bl = load_BL("$id_san");
                $listdatsan = loadAllDatSan($id_san);
                $listcasan = loadAllCASAN();
                // include '../views/Client/chitietsan.php';
                // break;
            }
            include '../views/Client/chitietsan.php';
            break;
        case 'san':
            if (isset($_POST['listok'])) {
                $tukhoa = $_POST['tukhoa'];
                echo $tukhoa;
                $listsanClient = loadAll_sanClient($tukhoa);
                include '../views/Client/san.php';
                break;
            } else {
                $tukhoa = "";
            }

            $listsanClient = ds_san_inner();
            include '../views/Client/san.php';
            break;
        // case 'sancungloai':
        //     if (isset($_GET['id_san']) && $_GET['id_san'] > 0) {
        //         $id_san = $_GET['id_san'];
        //         $listsan_cungloai = loadOne_SAN_CUNGLOAI($id_san, $id_danh_muc);
        //         $bl = load_BL("$id_san");
        //     }
        //     $listsanClient = ds_san_inner();
        //     include '../views/Client/chitietsan.php';
        //     break;
        case 'danhsachtintuc':
            if (isset($_POST['listok'])) {
                $tukhoa = $_POST['tukhoa'];
                $dstintuc = loadAll_tintuchaha($tukhoa);
                include '../views/Client/danhsachtintuc.php';
                break;
            }
            $dstintuc = loadall_tintuc();
            include '../views/Client/danhsachtintuc.php';
            break;
        case 'chitiettintuc':
            if (isset($_GET['id_tin_tuc']) && ($_GET['id_tin_tuc'] > 0)) {
                $id_tin_tuc = $_GET['id_tin_tuc'];
                $tt = loadOne_tin_tuc($id_tin_tuc);

            }
            include '../views/Client/chitiettintuc.php';
            break;

        case 'lienhe':
            if (isset($_SESSION["ten_dang_nhap"])) {
                $id_TaiKhoan = loadone_tk($_SESSION['id_tai_khoan']);
                if (isset($_POST["guilienhe"])) {
                    $id_tai_khoan = $_POST['id_tai_khoan'];
                    $noi_dung = $_POST['message'];
                    $trang_thai_lh = "Chưa Phản Hồi";
                    insert_lien_he($id_tai_khoan, $noi_dung, $trang_thai_lh);
                    $thong_bao = "Gửi thành công";
                    $_SESSION['thongbao'] = $thong_bao;
                }
            }
            include '../views/Client/lienhe.php';
            break;


        case 'binhluan':

            if (isset($_SESSION['ten_dang_nhap'])) {

                // $id_TaiKhoan = loadone_tk($_SESSION['id_tai_khoan']);
                if (isset($_POST['binhluan']) && ($_POST['binhluan'])) {
                    $id_san = $_POST['id_san'];
                    // $chitietsan = loadone_SAN($id_san);

                    $id_tai_khoan = $_POST['id_tai_khoan'];
                    $ngayGioHomNay = date("Y-m-d H:i:s");
                    $ngay_binh_luan = $ngayGioHomNay;
                    $noi_dung = $_POST['noi_dung'];

                    insert_binh_luan($id_tai_khoan, $id_san, $ngay_binh_luan, $noi_dung);
                    $thongbao = "Gửi bình luận thành công";
                    $_SESSION['thongbao'] = $thongbao;

                    $bl = load_BL("$id_san");
                    header("location: ?act=chitietsan&id_san=" . $id_san);


                }
            }
            include '../views/Client/chitietsan.php';
            break;



        case 'themdondatsan':
            if (isset($_POST['booknow']) && ($_POST['booknow'])) {
                $id_san = $_POST['idsan'];
                $ten_san = $_POST['tensan'];
                $gia = $_POST['gia'];
                $the_loai = $_POST['theloai'];
                $ngay_sudung = $_POST['ngay_da'];
                $ca_san = $_POST['casan'];

                $item = array($id_san, $ten_san, $gia, $the_loai, $ngay_sudung, $ca_san);
                $_SESSION["dondatsan"][] = $item;
                // header("location:ClientController.php?act=xemdondatsan");
                include '../views/Client/xemdondatsan.php';
                break;
            }
            // include '';
            include '../views/Client/xemdondatsan.php';
            break;

        case 'xemdondatsan':
            include '../views/Client/xemdondatsan.php';
            break;

        case 'huydon':
            if (isset($_GET['i']) && ($_GET['i'] > 0)) {
                if (isset($_SESSION['dondatsan']))
                    array_splice($_SESSION['dondatsan'], $_GET['i'], 1);

            } else {
                if (isset($_SESSION['dondatsan']))
                    unset($_SESSION['dondatsan']);
            }


            if (isset($_SESSION['dondatsan']) && (count($_SESSION['dondatsan']) > 0)) {
                include '../views/Client/xemdondatsan.php';
            } else {
                header("location:ClientController.php?act=san");
            }

            break;
        case 'thanhtoan':
            if (isset($_SESSION["ten_dang_nhap"])) {
                $bill = loadone_tk($_SESSION['id_tai_khoan']);
                if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
                    $tong_don_hang = $_POST['tong_don_hang'];
                    $id_tk = $_POST['id'];
                    $ten_kh = $_POST['hoten'];
                    $dia_chi_kh = $_POST['diachi'];
                    $email = $_POST['email'];
                    $sdt_kh = $_POST['sdt'];
                    $pttt = $_POST['pttt'];
                    $ten_san = $_POST['ten_san'];
                    $ca_san = $_POST['ca_san'];
                    $ma_dat_san = "PolyScoccer" . rand(0, 99999);

                    $hd = insert_hoa_don($ma_dat_san, $tong_don_hang,$id_tk ,$ten_kh, $sdt_kh, $email, $dia_chi_kh, $pttt, $ten_san,$ca_san);
                    // $id_TaiKhoan = loadone_tk($_SESSION['id_tai_khoan']);

                    unset($_SESSION['dondatsan']);

                    include "../views/Client/donhang.php";
                    break;
                }
            }
            include "../views/Client/xemdondatsan.php";
            break;

        case 'donhang':




            include "../views/Client/donhang.php";
            break;

        default:
            include "../views/Client/layout/index.php";
            break;
    }
} else {
    include "../views/Client/layout/index.php";
}
include "../views/Client/layout/footer.php";
ob_end_flush();

?>