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
                    <p>Hóa đơn</p>
                    <form action="?controller=order&action=find" method="POST">
                        <input type=" text" placeholder="Tìm kiếm" autocomplete="off" name="id">
                        <button class="btn-search">
                            <i class='bx bx-search'></i>
                        </button>
                    </form>
                    <div class="category-status-order">
                        <form id="form-select" method="POST">
                            <select name="select_id" id="select-option-order">
                                <option selected value="3">Tất cả</option>
                                <option value="0">Chờ duyệt</option>
                                <option value="1">Đã duyệt</option>
                                <option value="2">Đã hủy</option>
                            </select>
                        </form>
                    </div>
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
                                <tr onclick=handleNextPage(<?php echo $value['id'] ?>);>
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
                                    <td><?php echo number_format($value['total_price'], 0, '.', '.'); ?> đ</td>
                                    <td>
                                        <?php if ($value['status'] == 1) {
                                            echo 'Trống';
                                        } elseif ($value['status'] == 2) {
                                            echo 'Trống';
                                        } ?>
                                        <div class="button-wrap-confirm" style="display: 
                                        <?php if ($value['status'] == 0) {
                                            echo 'flex';
                                        } elseif ($value['status'] == 1) {
                                            echo 'none';
                                        } elseif ($value['status'] == 2) {
                                            echo 'none';
                                        } ?>;">
                                            <a href="?controller=order&action=update&id=<?php echo $value['id'] ?>&status=1" onclick="event.stopPropagation();"><button class="btn-submit">Xác nhận</button></a>
                                            <a onclick="event.stopPropagation()">
                                                <button class="btn-destroy" onclick=" handleDelete(<?php echo $value['id']; ?>)">Hủy</button>
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
        <a id='form-next-page' style="display: none;"></a>
        <!-- Home Content begin -->
    </div>
    <script>
        selectElement = document.querySelector('#select-option-order');
        formElement = document.querySelector('#form-select');
        selectElement.onchange = function() {
            formElement.action = '?controller=order&action=categoryOrder';
            formElement.submit();
        }
    </script>
    <script>
        const formDeleteBox = document.getElementById('form-confirm-delete-box');
        const overlay = document.getElementById('overlay');
        const btnDeleteClose = document.getElementById('form-confirm-delete-btn-close');
        const btnDeleteSubmit = document.getElementById('form-confirm-delete-btn-submit');

        function handleDelete(id) {
            formDeleteBox.style.display = 'block';
            overlay.style.display = 'block';
            btnDeleteSubmit.href = `?controller=order&action=update&id=${id}&status=2`;
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
    <script>
        formNextPage = document.querySelector("#form-next-page");

        function handleNextPage(id) {
            formNextPage.href = `?controller=order&action=show&id=${id}`;
            formNextPage.click();
        }
    </script>
</body>

</html>