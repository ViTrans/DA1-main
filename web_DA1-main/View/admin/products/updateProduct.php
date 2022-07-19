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
        <div class="form-layout-wrap">
            <div class="form-layout-header">
                <p>Cập nhật sản phẩm</p>
                <a href="?controller=product" class="btn-wrap-link">
                    <i class='bx bx-arrow-back'></i>
                    Quay lại
                </a>
            </div>
            <?php
            $category_id = $product['category_id'];
            $manufacturer_id = $product['manufacturer_id'];
            ?>
            <form class="form-layout" action="?controller=product&action=update&id=<?php echo $product['id'] ?>" method="POST" enctype="multipart/form-data" id="form-product-update">
                <p>Nhập sản phẩm</p>
                <div class="form-field-wrap">
                    <div class="add-product form-child-1">
                        <div class="form-field">
                            <input type="text" class="form-input" placeholder=" " name="name" autocomplete="off" id="name" value="<?php echo $product['name'] ?>">
                            <label for=" name" class=" form-label">Tên</label>
                        </div>
                        <span class="form-messages"></span>
                    </div>
                    <div class="add-product form-child-2">
                        <div class="form-field">
                            <input type=" text" class="form-input" placeholder=" " name="price" autocomplete="off" id="price" value="<?php echo $product['price'] ?>">
                            <label for=" name" class=" form-label">Giá</label>
                        </div>
                        <span class="form-messages"></span>
                    </div>
                </div>
                <div class="add-product">
                    <div class="form-field" style="height: 80px;">
                        <textarea type="text" class="form-input" placeholder=" " name="description" id="description"><?php echo $product['description'] ?></textarea>
                        <label for=" name" class=" form-label">Mô tả</label>
                    </div>
                    <span class="form-messages"></span>
                </div>
                <div class="form-select-wrap">
                    <div class="form-select">
                        <div>
                            <select name="manufacturer" class="form-select-child" id="manufacturer">
                                <option selected disabled value=" ">-- Nhà cung cấp --</option>
                                <?php foreach ($manufacturer as $value) : ?>
                                    <option value="<?php echo $value['id'] ?>" <?php if ($value['id'] == $manufacturer_id) {
                                                                                    echo 'selected';
                                                                                } ?>>
                                        <?php echo $value['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="form-messages"></span>
                    </div>
                    <div class="form-select">
                        <div>
                            <select name="category" class="form-select-child" id="category">
                                <option selected disabled value=" ">-- Danh mục --</option>
                                <?php foreach ($category as $value) : ?>
                                    <option value="<?php echo $value['id'] ?>" <?php if ($value['id'] == $category_id) {
                                                                                    echo 'selected';
                                                                                } ?>>
                                        <?php echo $value['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="form-messages"></span>
                    </div>
                </div>
                <div>
                    <div class="form-file-wrap">
                        <img id="blah" src="./Public/img/product/<?php echo $product['img'] ?>" alt="Hình ảnh" />
                        <input type="file" id="imgInp" accept="image/*" name="file">
                        <label for="imgInp" class="form-label-file">
                            <i class='bx bx-image'></i>
                        </label>
                    </div>
                    <span class="form-messages"></span>
                </div>
                <div class="btn-wrap">
                    <button type="submit" class="btn-wrap-child">Cập nhật</button>
                </div>
            </form>
        </div>
        <!-- Home Content begin -->
    </div>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file);
            }
        }
    </script>
    <script src="./Public/js/validator.js"></script>
    <script>
        validator({
            form: '#form-product-update',
            errorSelector: '.form-messages',
            rules: [
                // isRequired
                validator.isRequired('#name', 'Vui lòng nhập tên sản phẩm'),
                validator.isRequired('#price', 'Bạn chưa nhập giá của sản phẩm'),
                validator.isRequired('#description', 'Bạn chưa nhập thông tin mô tả'),
                validator.isRequired('#manufacturer', 'Bạn chưa chọn nhà sản xuất'),
                validator.isRequired('#category', 'Bạn chưa chọn danh mục cho sản phẩm'),
            ]
        });
    </script>
</body>

</html>