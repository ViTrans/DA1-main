<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Public/css/admin/sidebar.css">
    <link rel="stylesheet" href="./Public/css/admin/order.css">
    <title>Hóa đơn</title>
</head>

<body>
    <div class="container">
        <!-- Sidebar begin -->
        <?php include "./View/admin/include/sidebar.php" ?>
        <!-- Sidebar end -->

        <!-- Home Content begin -->
        <div class="form-layout-wrap">
            <div class="form-layout-header">
                <p>Sửa Đơn hàng mới</p>
                <a href="?controller=order" class="btn-wrap-link">
                    <i class='bx bx-arrow-back'></i>
                    Quay lại
                </a>
            </div>
            <form class="form-layout">
                <p>Sửa Thông tin</p>
                <div class="form-field-wrap">
                    <div class="form-field add-product form-child-1">
                        <input type="text" class="form-input" placeholder=" ">
                        <label for=" name" class=" form-label">Tên người nhận</label>
                    </div>
                    <div class="form-field add-product form-child-2">
                        <input type=" text" class="form-input" placeholder=" ">
                        <label for=" name" class=" form-label">Số điện thoại người nhận</label>
                    </div>
                </div>
                <div class="form-field add-product">
                    <textarea class="form-input" placeholder=" "></textarea>
                    <label for=" name" class=" form-label">Ghi chú</label>
                </div>
                <div class="form-field add-product">
                    <textarea class="form-input" placeholder=" "></textarea>
                    <label for=" name" class=" form-label">Địa chỉ</label>
                </div>
                <div class="btn-wrap">
                    <button type="submit" class="btn-wrap-child">Cập nhật</button>
                </div>
            </form>
        </div>
        <!-- Home Content begin -->
    </div>
    <script src="./js/main.js"></script>
</body>

</html>