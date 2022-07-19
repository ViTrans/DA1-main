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

            <div class="form-confirm-delete" style="display: none;" id="form-confirm-delete-box">
                <p>Bạn có chắc chắn muốn hủy đơn hàng này ?</p>
                <div class="form-confirm-delete-btn">
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-submit">Xác nhận</a>
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-close">Hủy</a>
                </div>
            </div>
            <div class="overlay" id="overlay" style="display:none;"></div>

            <div class="home-content-table">
                <div class="home-content-table_header">
                    <p>Chi tiết hóa đơn</p>
                    <a href="?controller=order" class="home-content-table_header-link">
                        <i class='bx bx-arrow-back'></i>
                        Quay lại
                    </a>
                </div>
                <div class="info-detail">
                    <div class="order-id-wrap">
                        <h4 class="order-id">Đơn hàng #<?php echo $order['id'] ?> <span style="color:
                                    <?php if ($order['status'] == 0) {
                                        echo '#F08000';
                                    } elseif ($order['status'] == 1) {
                                        echo '#12debc';
                                    } elseif ($order['status'] == 2) {
                                        echo '#999';
                                    } ?>"> <?php if ($order['status'] == 0) {
                                                echo 'Chờ duyệt đơn';
                                            } elseif ($order['status'] == 1) {
                                                echo 'Đã duyệt';
                                            } elseif ($order['status'] == 2) {
                                                echo 'Đã hủy';
                                            } ?></span></h4>
                        <h4 class=" order-id">Thời gian đặt: <?php $date = strtotime($order['time']);
                                                                $date = date('d/m/Y H:i:s', $date);
                                                                echo $date;
                                                                ?> </h4>
                    </div>
                    <div class="home-content-table_section home-content-table-order_details">
                        <table>
                            <thead>
                                <tr>
                                    <th class="order-item-product">STT</th>
                                    <th class="order-item-product">Hình ảnh</th>
                                    <th class="order-item-product">Tên sản phẩm</th>
                                    <th class="order-item-product">Số lượng</th>
                                    <th class="order-item-product">Giá</th>
                                    <th class="order-item-product">Thành tiền</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($table as $value) : ?>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="./Public/img/product/<?php echo $value['img'] ?>" alt=""></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['quantity'] ?></td>
                                        <td><?php echo number_format($value['price'], 0, '.', '.'); ?></td>
                                        <td><?php echo number_format($value['total'], 0, '.', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="order-info-receive-wrap">
                        <div class="order-info-receive">
                            <span class="order-info-receive-text"><span>Tên người nhận:</span> <?php echo $order['name_receive'] ?> </span>
                            <span class="order-info-receive-text"><span>Số điện thoại người nhận:</span><?php echo $order['phone_receive'] ?></span>
                            <span class="order-info-receive-text"><span>Địa chỉ người nhận:</span> <?php echo $order['address_receive'] ?></span>
                            <span class="order-info-receive-text" style="display:<?php if (!$order['note']) {
                                                                                        echo 'none';
                                                                                    }  ?> ;"><span>Ghi chú: </span> <?php echo $order['note'] ?></span>
                        </div>
                        <div class="order-info-receive-total">Tổng tiền: <?php echo number_format($order['total_price'], 0, '.', '.'); ?></div>
                    </div>
                    <div class="btn-status-wrap" style="display: 
                                        <?php if ($order['status'] == 0) {
                                            echo 'block';
                                        } elseif ($order['status'] == 1) {
                                            echo 'none';
                                        } elseif ($order['status'] == 2) {
                                            echo 'none';
                                        } ?>;">
                        <a href="?controller=order&action=updateShow&id=<?php echo $order['id'] ?>&status=1" class="btn-status-link">Xác nhận</a>
                        <a onclick="handleDelete(<?php echo $order['id'] ?>)" href="#" class="btn-status-link">Hủy</a>
                    </div>
                </div>
            </div>
            <!-- Home Content begin -->
        </div>
        <script>
            const formDeleteBox = document.getElementById('form-confirm-delete-box');
            const overlay = document.getElementById('overlay');
            const btnDeleteClose = document.getElementById('form-confirm-delete-btn-close');
            const btnDeleteSubmit = document.getElementById('form-confirm-delete-btn-submit');

            function handleDelete(id) {
                formDeleteBox.style.display = 'block';
                overlay.style.display = 'block';
                btnDeleteSubmit.href = `?controller=order&action=updateShow&id=${id}&status=2`;
            }

            overlay.onclick = function() {
                formDeleteBox.style.display = 'none';
                overlay.style.display = 'none';
            }

            btnDeleteClose.onclick = function() {
                formDeleteBox.style.display = 'none';
                overlay.style.display = 'none';
            }
        </script>
</body>

</html>