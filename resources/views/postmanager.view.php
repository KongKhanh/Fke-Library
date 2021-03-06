<!doctype html>
<html lang="en">

<head>
    <title>Demo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#">FPT PoLy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        <h2>Quản lý bài viết</h2>
        <div class="row">
            <div class="col-9 article__customer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>New MV</td>
                            <td>20-08-2020</td>
                            <td><a href="#">Xoá</a> | <a href="#">Sửa</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Phong Tom</td>
                            <td>19-08-2020</td>
                            <td><a href="#">Xoá</a> | <a href="#">Sửa</a></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-3 aside__customer">
                <h3>Thêm - sửa bài viết</h3>
                <form action="#">
                    <div class="form-group">
                        <input type="text" placeholder="Tiêu đề bài viết"">
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="10" placeholder="Nội dung bài viết"></textarea>
                    </div>
                    <div class="form-group btnX">
                        <button class="btn btn-success center">Lưu</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
