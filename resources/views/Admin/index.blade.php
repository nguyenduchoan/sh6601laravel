<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Css/adminindex.css') }}">
    <title></title>
</head>

<body>
    <div class="main">
        <table>
            <button class="btn-add-product">Add Product</button>
            <Caption>Bảng sản phẩm</Caption>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Sake_price</th>
                    <th>Image</th>
                    <th>Cate</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>$19.99</td>
                    <td>$19.99</td>
                    <td><img src="" alt=""></td>
                    <td>Quan ao</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table-1">
            <button class="btn-add-cate">Add Cate</button>
            <Caption>Bảng Loai sản phẩm</Caption>
            <thead>
                <tr>
                    <th>Price</th>
                    <th>Product Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>ádasdasdasd</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>