<?php

namespace App\Admin\Controllers;

abstract class Constant
{
    const STATUS = array("0" => "Mới đặt", "1" => "Thành công", "2" => "Đã huỷ");
    const PAYMENT = array("0" => "Tiền mặt", "1" => "Chuyển khoản", "2" => "Visa/Master");
}
