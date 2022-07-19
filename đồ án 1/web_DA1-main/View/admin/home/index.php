<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Public/css/admin/sidebar.css">
    <link rel="stylesheet" href="./Public/css/admin/home.css">
    <title>Trang chủ</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar begin -->
        <?php include "./View/admin/include/sidebar.php" ?>
        <!-- Sidebar end -->

        <!-- Home Content begin -->
        <div class="home-content">
            <div class="home-content-heading">
                <p>Tổng quan</p>
            </div>
            <div class="home-content-body">
                <ul class="home-content-body-list">
                    <li class="home-content-body-item">
                        <div class="item-body-info-wrap">
                            <div class="item-body-info">
                                <div class="item-body-info_quantity"><?php echo $total_order['order_new'] ?></div>
                                <div class="item-body-info_description">
                                    Đơn hàng mới
                                </div>
                            </div>
                            <div class="home-content-body-item_logo">
                                <i class='bx bxs-shopping-bag'></i>
                            </div>
                        </div>
                        <div class="home-content-body-item-link">
                            <a href="?controller=order">
                                Xem chi tiết
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </li>


                    <li class="home-content-body-item">
                        <div class="item-body-info-wrap">
                            <div class="item-body-info">
                                <div class="item-body-info_quantity"><?php echo $total_user['user_new'] ?></div>
                                <div class="item-body-info_description">
                                    Khách hàng
                                </div>
                            </div>
                            <div class="home-content-body-item_logo">
                                <i class='bx bx-user-plus'></i>
                            </div>
                        </div>
                        <div class="home-content-body-item-link">
                            <a href="?controller=user">
                                Xem chi tiết
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </li>
                    <li class="home-content-body-item">
                        <div class="item-body-info-wrap">
                            <div class="item-body-info">
                                <div class="item-body-info_quantity"><?php echo $total_product['product'] ?></div>
                                <div class="item-body-info_description">
                                    Sản phẩm
                                </div>
                            </div>
                            <div class="home-content-body-item_logo">
                                <i class='bx bxs-vial'></i>
                            </div>
                        </div>
                        <div class="home-content-body-item-link">
                            <a href="?controller=product">
                                Xem chi tiết
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </li>
                    <li class="home-content-body-item">
                        <div class="item-body-info-wrap">
                            <div class="item-body-info">
                                <div class="item-body-info_quantity" id="id_price"><?php echo number_format($total_price['total_price'], 0, '.', '.'); ?></div>
                                <div class="item-body-info_description" id="id_description">
                                    Doanh thu
                                </div>
                            </div>
                            <div class="home-content-body-item_logo">
                                <i class='bx bx-bar-chart'></i>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Home Content begin -->
    </div>
</body>

</html>