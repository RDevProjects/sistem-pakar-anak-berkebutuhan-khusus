@extends('layouts.appV1')

@push('styles-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1 class="h3 d-inline align-middle">Data Penyakit</h1>
        <h5 class="p-2 bg-white rounded-pill h5">
            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h5>
    </div>
@endsection
@section('content2')
    <div class="col-md-8 col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="align-middle me-2" data-feather="book"></i>
                    <h5 class="card-title mb-0">Data Penyakit</h5>
                </div>
                <button type="button" class="btn btn-md btn-success d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#addPenyakitModal"><i class="align-middle me-2" data-feather="book"></i>Tambah
                    Data</button>
            </div>
            <div class="card-body">
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
                <div class="col-md-8 col-xl-12 mb-3">
                    <table id="userTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Deskripsi Penyakit</th>
                                <th>Penanganan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($dataPenyakit as $penyakit)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $penyakit->kode_penyakit }}</td>
                                    <td>{{ $penyakit->nama_penyakit }}</td>
                                    <td>{{ $penyakit->deskripsi }}</td>
                                    <td>{{ $penyakit->penanganan }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editPenyakitModal"
                                            data-penyakit-id="{{ $penyakit->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletePenyakitModal"
                                            data-penyakit-id="{{ $penyakit->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Penyakit -->
    <div class="modal fade" id="addPenyakitModal" tabindex="-1" aria-labelledby="addPenyakitModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPenyakitModalLabel">Tambah Data Penyakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penyakit.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_penyakit" class="form-label">Kode Penyakit</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_penyakit" class="form-label">Nama Penyakit</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                        <div class="mb-3">
                            <label for="penanganan" class="form-label">Penanganan</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="penanganan" name="penanganan" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Penyakit -->
    <div class="modal fade" id="editPenyakitModal" tabindex="-1" aria-labelledby="editPenyakitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPenyakitModalLabel">Edit Data Penyakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPenyakitForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kode_penyakit" class="form-label">Kode Penyakit</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit"
                                value="{{ $penyakit->kode_penyakit }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_penyakit" class="form-label">Nama Penyakit</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit"
                                value="{{ $penyakit->nama_penyakit }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{ $penyakit->deskripsi }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="penanganan" class="form-label">Penanganan</label><span
                                class="text-danger">*</span>
                            <input type="text" class="form-control" id="penanganan" name="penanganan"
                                value="{{ $penyakit->penanganan }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Penyakit -->
    <div class="modal fade" id="deletePenyakitModal" tabindex="-1" aria-labelledby="deletePenyakitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePenyakitModalLabel">Delete Penyakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus gejala ini beserta relasinya?
                </div>
                <div class="modal-footer">
                    <form id="deletePenyakitForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="user_id" id="deletePenyakitId" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $('#userTable').DataTable();
    </script>
    <script>
        $(document).ready(function() {
            $('[data-bs-target="#editPenyakitModal"]').on('click', function() {
                var penyakitId = $(this).data('penyakit-id');

                $.ajax({
                    url: '/dashboard/penyakit/show/' + penyakitId,
                    method: 'GET',
                    success: function(data) {
                        $('#editPenyakitModal #kode_penyakit').val(data.kode_penyakit);
                        $('#editPenyakitModal #nama_penyakit').val(data.nama_penyakit);
                        $('#editPenyakitModal #deskripsi').val(data.deskripsi);
                        $('#editPenyakitModal #penanganan').val(data.penanganan);

                        $('#editPenyakitForm').attr('action', '/dashboard/penyakit/update/' +
                            penyakitId);
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat memuat data gejala: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#deletePenyakitModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var penyakitId = button.data('penyakit-id');

                var modal = $(this);
                modal.find('#deletePenyakitId').val(penyakitId);
                modal.find('#deletePenyakitForm').attr('action', '{{ route('penyakit.destroy', '') }}/' +
                    penyakitId);
            });
        });
    </script>
@endpush
