<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Public/css/admin/sidebar.css">
    <link rel="stylesheet" href="./Public/css/admin/user.css">
    <title>Khách hàng</title>
</head>

<body>
    <div class="container">
        <!-- Sidebar begin -->
        <?php include "./View/admin/include/sidebar.php" ?>
        <!-- Sidebar end -->

        <!-- Home Content begin -->
        <div class="home-content">
            <div class="home-content-table">
                <div class="home-content-table_header">
                    <p>Chi tiết thông tin</p>
                    <a href="?controller=user" class="home-content-table_header-link">
                        <i class='bx bx-arrow-back'></i>
                        Quay lại
                    </a>
                </div>

                <div class="info-details">
                    <div class="info-details-heading">
                        <p>Thông tin</p>
                    </div>
                    <div class="info-details-child">
                        <span class=info-details-child-text>
                            <?php echo $user['name']; ?>
                            <span class=info-details-child-text-label>Tên Khách hàng</span>
                        </span>
                        <span class=info-details-child-text>
                            <?php if ($user['gender'] == 1) {
                                echo 'Nam';
                            }
                            if ($user['gender'] == 0) {
                                echo 'Nữ';
                            }
                            ?>
                            <span class=info-details-child-text-label>Giới tính</span>
                        </span>
                    </div>
                    <div class="info-details-child">
                        <span class=info-details-child-text>
                            <?php $date = strtotime($value['birthday']);
                            $date = date('d/m/Y', $date);
                            echo $date; ?>
                            <span class=info-details-child-text-label>Ngày sinh</span>
                        </span>
                        <span class=info-details-child-text>
                            <?php echo $user['phone']; ?>
                            <span class=info-details-child-text-label>Số điện thoại</span>
                        </span>
                    </div>
                    <div class="info-details-child">
                        <span class=info-details-child-text>
                            <?php echo $user['email']; ?>
                            <span class=info-details-child-text-label>Email</span>
                        </span>
                        <span class=info-details-child-text>
                            **********
                            <span class=info-details-child-text-label>Mật khẩu</span>
                        </span>
                    </div>
                    <div class="info-details-child">
                        <span class=info-details-child-text>
                            <?php echo $user['address']; ?>
                            <span class=info-details-child-text-label>Địa chỉ</span>
                        </span>
                    </div>
                    <div class="info-details-link-wrap">
                        <a href="?controller=user&action=formUpdate&id=<?php echo $user['id'] ?>" class="info-details-link">
                            Sửa thông tin
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>

            </div>
            <!-- Home Content begin -->
        </div>
</body>

</html>