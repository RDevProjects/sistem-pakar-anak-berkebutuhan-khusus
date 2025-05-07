@extends('layouts.appV1')

@push('styles-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1 class="h3 d-inline align-middle">Data Pengguna</h1>
        <h5 class="p-2 bg-white rounded-pill h5">
            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h5>
    </div>
@endsection
@section('content2')
    <div class="col-md-8 col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="align-middle me-2" data-feather="user"></i>
                    <h5 class="card-title mb-0">Data Profile</h5>
                </div>
                <button type="button" class="btn btn-md btn-success d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#addUserModal"><i class="align-middle me-2" data-feather="user-plus"></i>Tambah
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editUserModal" data-user-id="{{ $user->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModal"
                                            data-user-id="{{ $user->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label><span class="text-danger">*</span>
                            <select class="form-select" id="role" name="role" required>
                                <option selected disabled>Pilih Role User</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" id="changePasswordCheckbox" name="change_password">
                            <label for="changePasswordCheckbox" class="form-label">Change Password ?</label>
                        </div>
                        <div class="mb-3" id="passwordField" style="display: none;">
                            <label for="password" class="form-label">Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label><span class="text-danger">*</span>
                            <select class="form-select" id="role" name="role" required>
                                <option selected disabled>Pilih Role User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="photo_profile" class="form-label">Photo Profile</label>
                            <input type="file" class="form-control" id="photo_profile" name="photo_profile">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete User -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus user ini beserta relasinya?
                </div>
                <div class="modal-footer">
                    <form id="deleteUserForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="user_id" id="deleteUserId" value="">
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

        $('#changePasswordCheckbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#passwordField').show();
                $('#password').attr('required', true);
            } else {
                $('#passwordField').hide();
                $('#password').removeAttr('required');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-bs-target="#editUserModal"]').on('click', function() {
                var userId = $(this).data('user-id');

                $.ajax({
                    url: '/dashboard/user/show/' +
                        userId,
                    method: 'GET',
                    success: function(data) {
                        $('#editUserModal #name').val(data.name);
                        $('#editUserModal #username').val(data.username);
                        $('#editUserModal #email').val(data.email);
                        $('#editUserModal #password').val(data.password);
                        $('#editUserModal #role').val(data.role);

                        $('#editUserForm').attr('action', '/dashboard/user/update/' +
                            userId);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data pengguna.');
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#deleteUserModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var userId = button.data('user-id');

                var modal = $(this);
                modal.find('#deleteUserId').val(userId);
                modal.find('#deleteUserForm').attr('action', '{{ route('user.destroy', '') }}/' +
                    userId);
            });
        });
    </script>
@endpush
