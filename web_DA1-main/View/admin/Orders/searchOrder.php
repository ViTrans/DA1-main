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
        <div class="home-content">
            <div class="home-content-table">
                <div class="home-content-table_header">
                    <p>Kết quả tìm kiếm</p>
                    <a href="?controller=order" class="home-content-table_header-link">
                        <i class='bx bx-arrow-back'></i>
                        Quay lại
                    </a>
                </div>
                <div class="home-content-table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>Mã Đơn</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Tên Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Duyệt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $value) : ?>
                                <tr>
                                    <td><?php echo $value['id']  ?></td>
                                    <td> <?php $date = strtotime($value['time']);
                                            $date = date('d/m/Y H:i:s', $date);
                                            echo $date;
                                            ?></td>
                                    <td style="color:
                                    <?php if ($value['status'] == 0) {
                                        echo '#F08000';
                                    } elseif ($value['status'] == 1) {
                                        echo '#12debc';
                                    } elseif ($value['status'] == 2) {
                                        echo '#999';
                                    } ?> ; font-size:18px">
                                        <?php if ($value['status'] == 0) {
                                            echo 'Chờ duyệt đơn';
                                        } elseif ($value['status'] == 1) {
                                            echo 'Đã duyệt';
                                        } elseif ($value['status'] == 2) {
                                            echo 'Đã hủy';
                                        } ?>
                                    </td>
                                    <td><?php echo $value['name']  ?></td>
                                    <td><?php echo number_format($value['total'], 0, '.', '.'); ?> đ</td>
                                    <td>
                                        <div class="button-wrap-confirm">
                                            <a href=""><button class="btn-submit">Xác nhận</button></a>
                                            <button class="btn-destroy">Hủy</button>
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
    <script src="./js/main.js"></script>
</body>

</html>