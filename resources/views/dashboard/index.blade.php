@extends('layouts.appV1')

@push('styles-css')
@endpush

@section('title')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3"><strong>Selamat Datang di {{ env('APP_NAME') }}</strong></h1>
            <h3 class="h4">Proyek ini adalah sistem pakar untuk membantu mengidentifikasi kebutuhan khusus anak
                berdasarkan gejala yang diinputkan.</h3>
        </div>
        <div>
            <h5 class="p-2 bg-white rounded-pill h5">
                {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h5>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mt-0 col">
                                    <h5 class="card-title">Data Users</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $users }}</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ $users }}</span>
                                <span class="text-muted">Data yang ada didatabase</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mt-0 col">
                                    <h5 class="card-title">Data Gejala</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $gejala }}</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i>
                                    {{ $gejala }}</span>
                                <span class="text-muted">Data yang ada didatabase</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mt-0 col">
                                    <h5 class="card-title">Data Penyakit</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $penyakit }}</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $penyakit }}
                                </span>
                                <span class="text-muted">Data yang ada didatabase</span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mt-0 col">
                                    <h5 class="card-title">Data Diagnosis</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="check-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $diagnosis }}</h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $diagnosis }}
                                </span>
                                <span class="text-muted">Data yang ada didatabase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content3')
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="mb-0 card-title">Latest Projects</h5>
            </div>
            <table class="table my-0 table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-xl-table-cell">Start Date</th>
                        <th class="d-none d-xl-table-cell">End Date</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Assignee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Project Apollo</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                    </tr>
                    <tr>
                        <td>Project Fireball</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                        <td class="d-none d-md-table-cell">William Harris</td>
                    </tr>
                    <tr>
                        <td>Project Hades</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Sharon Lessman</td>
                    </tr>
                    <tr>
                        <td>Project Nitro</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-warning">In progress</span></td>
                        <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                    </tr>
                    <tr>
                        <td>Project Phoenix</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-success">Done</span></td>
                        <td class="d-none d-md-table-cell">William Harris</td>
                    </tr>
                    <tr>
                        <td>Project X</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Sharon Lessman</td>
                    </tr>
                    <tr>
                        <td>Project Romeo</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-success">Done</span></td>
                        <td class="d-none d-md-table-cell">Christina Mason</td>
                    </tr>
                    <tr>
                        <td>Project Wombat</td>
                        <td class="d-none d-xl-table-cell">01/01/2023</td>
                        <td class="d-none d-xl-table-cell">31/06/2023</td>
                        <td><span class="badge bg-warning">In progress</span></td>
                        <td class="d-none d-md-table-cell">William Harris</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>
@endpush
