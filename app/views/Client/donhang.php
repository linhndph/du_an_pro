<style>
    .input {

        margin-left: 110px;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 5px 100px 5px 100px;
    }

    ::placeholder {
        text-align: center;
    }

    #pttt {
        text-align: center;
    }

    .btn {
        margin-left: 240px;
        background-color: red;
        border-color: black;

    }
</style>
<div class="sign-in-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <span class="sp-color">Đơn hàng</span>
                            <h2>Thông tin đặt sân</h2>
                        </div>

                        <div class="row">


                            <table>
                                <tr>
                                    <td><input class="input" type="text" value="<?php  ?>" name="hoten"
                                            placeholder="Nhập họ tên"></td>
                                </tr>
                                <tr>
                                    <td><input class="input" type="text" value="<?php ?>" name="diachi"
                                            placeholder="Nhập địa chỉ"></td>
                                </tr>
                                <tr>
                                    <td><input class="input" type="text" value="<?php ?>" name="email"
                                            placeholder="Nhập email"></td>
                                </tr>
                                <tr>
                                    <td><input class="input" type="text" value="<?php ?>" name="sdt"
                                            placeholder="Nhập số điện thoại"></td>
                                </tr>
                                <tr>
                                    <td id="pttt">Phương thức thanh toán <br>
                                        <input type="radio" name="pttt" id="" value="1"> Thanh toán khi đá xong <br>
                                        <input type="radio" name="pttt" id="" value="2"> Thanh toán chuyển khoản <br>
                                    </td>
                                </tr>

                            </table>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>