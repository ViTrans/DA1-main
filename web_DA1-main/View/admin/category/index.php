<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Public/css/admin/sidebar.css">
    <link rel="stylesheet" href="./Public/css/admin/category.css">
    <title>Danh mục</title>
</head>

<body>
    <div class="container">

        <!-- Sidebar begin -->
        <?php include "./View/admin/include/sidebar.php" ?>
        <!-- Sidebar end -->

        <!-- Home Content begin -->
        <div class="home-content">

            <div class="form-confirm-delete" style="display: none;" id="form-confirm-delete-box">
                <p>Nếu bạn xóa tất cả sản phẩm của danh mục này sẽ biến mất. Bạn chắc chắn muốn xóa ?</p>
                <div class="form-confirm-delete-btn">
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-submit">Có</a>
                    <a class="form-confirm-delete-btn-child" id="form-confirm-delete-btn-close">Hủy</a>
                </div>
            </div>
            <div class="overlay" id="overlay" style="display:none;"></div>


            <div class="home-content-table">

                <div class="home-content-table_header">
                    <p>Danh mục</p>

                    <!-- form create -->
                    <form action="?controller=category&action=create" method="POST" class="form-category" id='form-category-create'>
                        <div class="form-field">
                            <input type=" text" class="form-input" placeholder=" " name="name" autocomplete="off" id="name">
                            <label for=" name" class=" form-label">Nhập danh mục</label>
                        </div>
                        <button type="submit" class="form-category-btn">Thêm</button>
                        <span class="form-messages"></span>
                    </form>

                    <!-- Form update -->
                    <form method="POST" class="form-category" id="form-category-update" style="display: none;" autocomplete="off">
                        <div class=" form-field">
                            <input type=" text" class="form-input" placeholder=" " name="name" id="input-update">
                            <label for="name" class=" form-label">Cập nhật danh mục</label>
                        </div>
                        <button type="submit" class="form-category-btn">Cập nhật</button>
                        <a class="form-category-btn-close" id="form-category-update-close">Hủy</a>
                        <span class="form-messages"></span>
                    </form>
                </div>
                <div class="home-content-table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1;
                            foreach ($result as $value) : ?>
                                <tr>
                                    <td><?php echo $number;
                                        $number += 1; ?></td>
                                    <td id="name-category-<?php echo $value['id']; ?>"><?php echo $value['name']; ?></td>
                                    <td>
                                        <div class="button-wrap">
                                            <a href="#" class="button-wrap-link">
                                                <button onclick="handleUpdate(<?php echo $value['id']; ?>)" id="btn-update">
                                                    <i class='bx bxs-edit'></i>
                                                </button>
                                            </a>
                                            <a class="button-wrap-link">
                                                <button onclick="handleDelete(<?php echo $value['id']; ?>)" id="btn-delete">
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
        const createBox = document.querySelector("#form-category-create");
        const updateBox = document.querySelector("#form-category-update");
        const ValueCategory = document.querySelectorAll('#name-category');
        const inputUpdate = document.querySelector("#input-update");
        const formDelete = document.getElementById("form-confirm-delete-box");
        const overlay = document.getElementById("overlay");

        document.querySelector("#form-category-update-close").onclick = function() {
            createBox.style.display = "flex";
            updateBox.style.display = "none";
        }

        function handleUpdate(id) {
            createBox.style.display = "none";
            updateBox.style.display = "flex";
            let nameCategory = document.querySelector(`#name-category-${id}`).textContent;
            inputUpdate.value = nameCategory;
            updateBox.action = `?controller=category&action=update&id=${id}`;
        }

        function handleDelete(id) {
            formDelete.style.display = "block";
            overlay.style.display = "block";
            document.getElementById("form-confirm-delete-btn-submit").href = `?controller=category&action=delete&id=${id}`
        }

        overlay.onclick = function() {
            formDelete.style.display = "none";
            overlay.style.display = "none";
        }

        document.getElementById("form-confirm-delete-btn-close").onclick = function() {
            formDelete.style.display = "none";
            overlay.style.display = "none";
        }
    </script>
    <script src="./Public/js/validator.js"></script>
    <script>
        validator({
            form: '#form-category-create',
            errorSelector: '.form-messages',
            rules: [
                // isRequired
                validator.isRequired('#name', 'Vui lòng nhập danh mục'),
            ]
        });
    </script>
    <script>
        validator({
            form: '#form-category-update',
            errorSelector: '.form-messages',
            rules: [
                // isRequired
                validator.isRequired('#input-update', 'Vui lòng nhập danh mục'),
            ]
        });
    </script>
</body>

</html>