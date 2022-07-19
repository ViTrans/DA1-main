<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Public/css/admin/sidebar.css">
    <link rel="stylesheet" href="./Public/css/admin/manufacturer.css">
    <title>Nhà sản xuất</title>
</head>

<body>
    <div class="container">
        <!-- Sidebar begin -->
        <?php include "./View/admin/include/sidebar.php" ?>
        <!-- Sidebar end -->

        <!-- Home Content begin -->
        <div class="home-content">
            <div class="form-confirm-delete" style="display: none;" id="form-confirm-delete-box">
                <p>Nếu bạn xóa tất cả sản phẩm của nhà sản xuất này này sẽ biến mất. Bạn chắc chắn muốn xóa ?</p>
                <div class="form-confirm-delete-btn">
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-submit">Có</a>
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-close">Hủy</a>
                </div>
            </div>
            <div class="overlay" id="overlay" style="display:none;"></div>
            <div class="home-content-table">
                <div class="home-content-table_header">
                    <p>Nhà sản xuất</p>
                    <a href="?controller=manufacturer&action=formCreate">
                        <button class="btn-card-add">
                            <i class='bx bxs-clinic'></i>
                        </button>
                    </a>
                </div>
                <div class="home-content-table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1;
                            foreach ($result as $value) : ?>
                                <tr>
                                    <td> <?php echo $number;
                                            $number += 1; ?></td>
                                    <td>
                                        <?php echo $value['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['phone']; ?>
                                    </td>
                                    <td>
                                        <div class="button-wrap">
                                            <a href="?controller=manufacturer&action=update&id= <?php echo $value['id']; ?>">
                                                <button>
                                                    <i class='bx bxs-edit'></i>
                                                </button>
                                            </a>
                                            <a href="#" onclick="handleDelete(<?php echo $value['id']; ?>)">
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
    <script>
        const formDeleteBox = document.getElementById('form-confirm-delete-box');
        const overlay = document.getElementById('overlay');
        const btnDeleteClose = document.getElementById('form-confirm-delete-btn-close');
        const btnDeleteSubmit = document.getElementById('form-confirm-delete-btn-submit');

        function handleDelete(id) {
            formDeleteBox.style.display = 'block';
            overlay.style.display = 'block';
            btnDeleteSubmit.href = `?controller=manufacturer&action=delete&id=${id}`;
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