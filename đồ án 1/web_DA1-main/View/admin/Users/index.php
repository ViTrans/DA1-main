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
            <div class="form-confirm-delete" style="display: none;" id="form-confirm-delete-box">
                <p>Bạn có chắc chắn muốn xóa không ?</p>
                <div class="form-confirm-delete-btn">
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-submit">Có</a>
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-close">Hủy</a>
                </div>
            </div>
            <div class="overlay" id="overlay" style="display:none;"></div>

            <div class="home-content-table">
                <div class="home-content-table_header header-user-main">
                    <p class="header-user-main-text">Khách hàng</p>
                    <form action="?controller=user&action=find" method="POST">
                        <input type="text" placeholder="Tìm kiếm" name='name' autocomplete="off">
                        <button class="btn-search" type="submit">
                            <i class='bx bx-search'></i>
                        </button>
                    </form>
                </div>
                <div class="home-content-table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ngày sinh</th>
                                <th>Điện thoại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $number = 1;
                            foreach ($user as $value) : ?>
                                <tr>
                                    <td><?php echo $number;
                                        $number++ ?></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td>
                                        <?php $date = strtotime($value['birthday']);
                                        $date = date('d/m/Y', $date);
                                        echo $date;
                                        ?>
                                    </td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td>
                                        <div class="button-wrap">
                                            <a href="?controller=user&action=show&id=<?php echo $value['id'] ?>" class="">
                                                <button>
                                                    <i class='bx bx-show'></i>
                                                </button>
                                            </a>
                                            <a href="?controller=user&action=formUpdate&id=<?php echo $value['id'] ?>">
                                                <button>
                                                    <i class='bx bxs-edit'></i>
                                                </button>
                                            </a>
                                            <a onclick=handleDelete(<?php echo $value['id'] ?>)>
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
            btnDeleteSubmit.href = `?controller=user&action=delete&id=${id}`;
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