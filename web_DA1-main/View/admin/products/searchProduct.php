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
                    <p>Kết quả tìm kiếm</p>
                    <a href="?controller=product" class="home-content-table_header-link">
                        <i class='bx bx-arrow-back'></i>
                        Quay lại
                    </a>
                </div>
                <div class="home-content-table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1;
                            foreach ($result as $value) : ?>
                            <tr>
                                <td><?php echo $number;
                                        $number++ ?>
                                </td>
                                <td><img src="./Public/img/product/<?php echo $value['img'] ?>" alt=""></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo number_format($value['price'], 0, '.', '.'); ?> VND</td>
                                <td>
                                    <div class="button-wrap">
                                        <a href="?controller=product&action=show&id=<?php echo $value["id"]; ?>">
                                            <button>
                                                <i class='bx bx-show'></i>
                                            </button>
                                        </a>
                                        <a href="?controller=product&action=update">
                                            <button>
                                                <i class='bx bxs-edit'></i>
                                            </button>
                                        </a>

                                        <a href="?controller=product&action=delete">
                                            <button>
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Home Content begin -->
    </div>
</body>

</html>