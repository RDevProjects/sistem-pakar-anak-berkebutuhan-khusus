<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="{{ env('APP_AUTHOR') }}">
    <meta name="keywords" content="superior, website, responsive, admin, dashboard, template, bootstrap">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Daftar | {{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Mulai</h1>
                            <p class="lead">
                                Mulailah menciptakan pengalaman pengguna terbaik untuk pelanggan Anda.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('register.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input class="form-control form-control-lg" type="text" name="name"
                                                placeholder="Masukkan nama Anda" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Pengguna</label>
                                            <input class="form-control form-control-lg" type="text" name="username"
                                                placeholder="Masukkan nama pengguna Anda" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Masukkan email Anda" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kata Sandi</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Masukkan kata sandi" />
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Daftar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Sudah punya akun? <a href="{{ route('login.index') }}">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>
