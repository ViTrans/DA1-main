<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Public/css/admin/sidebar.css">
    <link rel="stylesheet" href="./Public/css/admin/Product.css">
    <title>Sản phẩm</title>
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
                    <p>Chi tiết sản phẩm</p>
                    <a href="?controller=product" class="home-content-table_header-link">
                        <i class='bx bx-arrow-back'></i>
                        Quay lại
                    </a>
                </div>
                <?php foreach ($result as $value) : ?>
                    <div class="home-content-product-detail-wrap">
                        <div class="home-content-product-detail">
                            <span class="product-detail-category <?php if ($value['nameCategory'] == 'Nam') {
                                                                        echo 'active-boy';
                                                                    } elseif ($value['nameCategory'] == 'Nữ') {
                                                                        echo 'active-girl';
                                                                    } else {
                                                                        echo 'active-category';
                                                                    } ?>">
                                <?php echo $value['nameCategory']; ?>
                            </span>
                            <div class="product-detail-img">
                                <img src="./Public/img/product/<?php echo $value['img'] ?>" alt="">
                            </div>
                            <div class="product-detail-content">
                                <h2 class="product-detail-content-name"><?php echo $value['nameProduct']; ?></h2>
                                <span class="
                                product-detail-content-price"><?php echo number_format($value['price'], 0, '.', '.'); ?>
                                    VND</span>
                                <p class="product-detail-content-description"><?php echo $value['description']; ?></p>
                                <p class="product-detail-content-Manufacturer">Nhà sản xuất:
                                    <?php echo $value['nameManufacturer']; ?></p>
                            </div>
                            <div class="product-detail-time">
                                <p class="product-detail-create_at">Thời gian tạo:
                                    <?php $date = strtotime($value['create_at']);
                                    $date = date('d/m/Y H:i:s', $date);
                                    echo $date;
                                    ?>
                                </p>
                                <?php if ($value['update_at']) {
                                    $date = strtotime($value['update_at']);
                                    $date = date('d/m/Y H:i:s', $date);
                                    echo "<p class='product-detail-update_at'>Cập nhật lần cuối: " . $date . "</p>";
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Home Content begin -->
    </div>
</body>

</html>