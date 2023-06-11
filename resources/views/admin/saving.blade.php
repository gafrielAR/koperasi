@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Simpanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Simpanan</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="row">

        <div class="col-lg-8">
            <div class="col-12 d-flex align-content-between">
                <div class="col pr-5">
                    <div class="card info-card loan-card p-0">

                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ci-2 ci-simpanan-pokok"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>Simpanan Pokok</h5>
                                    <h6>Rp. 10.000.000</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col px-5">
                    <div class="card info-card saving-card p-0">

                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ci-2 ci-simpanan-wajib"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>Simpanan Wajib</h5>
                                    <h6>Rp. 10.000.000</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col pl-5">

                    <div class="card info-card installment-card p-0">

                        <div class="p-3">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ci-2 ci-dashboard-total-pinjaman"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>Simpanan Sukarela</h5>
                                    <h6>Rp. 10.000.000</h6>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Seluruh Simpanan</h5>
                                <button type="button" class="btn btn-primary" id="addButton">
                                    Tambah Data Baru
                                </button>
                            </div>

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table datatable" id="savingHistoryTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">No.Transaksi</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Anggota</th>
                                                <th scope="col">S.Pokok</th>
                                                <th scope="col">S.Wajib</th>
                                                <th scope="col">S.Sukarela</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($savings as $saving)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</td>
                                                <td>{{ $saving->prefix }}{{ str_pad($saving->id, 6, '0',
                                                    STR_PAD_LEFT)
                                                    }}</td>
                                                <td>{{ $saving->date }}</td>
                                                <td>
                                                    {{ $saving->member->nip }} - {{ $saving->member->name }}
                                                </td>
                                                <td>{{ number_format($saving->principal_saving, 2) }}</td>
                                                <td>{{ number_format($saving->mandatory_saving, 2) }}</td>
                                                <td>{{ number_format($saving->voluntary_saving, 2) }}</td>
                                                <td>
                                                    <span class="btn badge text-bg-primary">
                                                        <a class="text-decoration-none text-light" id="editButton"
                                                            href="#" data-id="{{ $saving->id }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                            Edit
                                                        </a>
                                                    </span>
                                                    <span class="btn badge text-bg-danger">
                                                        <a class="text-decoration-none text-light" id="deleteButton"
                                                            href="#" data-id="{{ $saving->id }}">
                                                            <i class="bi bi-trash3"></i>
                                                            Hapus
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('layouts.partials.info')

    </div>
</section>

<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label text-end">Tanggal <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="member_id" class="col-sm-2 col-form-label text-end">Anggota <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <select name="member_id" id="member_id" class="form-control" required>
                            <option value="" selected disabled>Pilih Anggota</option>
                            @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="principal_saving" class="col-sm-2 col-form-label text-end">S. Pokok :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="principal_saving" name="principal_saving"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="mandatory_saving" class="col-sm-2 col-form-label text-end">S. Wajib :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="mandatory_saving" name="mandatory_saving"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="voluntary_saving" class="col-sm-2 col-form-label text-end">S. Sukarela :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="voluntary_saving" name="voluntary_saving"
                            required>
                    </div>
                </div>

                <div style="display: block; text-align: -webkit-center;">
                    <button class="btn btn-primary mb-3" id="save"> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#member_id').select2({
            dropdownParent: "#exampleModal",
            theme: 'bootstrap-5'
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 02_PROSES SIMPAN
    $('body').on('click', '#addButton', function(e) {
        e.preventDefault();
        $('#exampleModal').modal('show');
        $('#save').click(function() {
            save();
        });
    });

    // 03_PROSES EDIT
    $('body').on('click', '#editButton', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'saving/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#exampleModal').modal('show');
                $('#date').val(response.result.date),
                $('#date').attr('disabled', true),
                $('#member_id').val(response.result.member_id),
                $('#member_id').attr('disabled', true),
                $('#principal_saving').val(response.result.principal_saving),
                $('#mandatory_saving').val(response.result.mandatory_saving),
                $('#voluntary_saving').val(response.result.voluntary_saving),
                $('#save').click(function() {
                    save(id);
                });
            }
        });
    });

    // 04_PROSES Delete
    $('body').on('click', '#deleteButton', function(e) {
        if (confirm('are you sure?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'saving/delete/' + id,
                type: 'POST',
                success: function(html) {
                    location.reload();
                },
            });
        }
    });

    // fungsi simpan dan update
    function save(id = '') {
        if (id == '') {
            var action = 'saving/create';
            var method = 'POST';
        } else {
            var action = 'saving/update/' + id;
            var method = 'POST';
        }
        console.log(action);
        $.ajax({
            url: action,
            type: method,
            data: {
                date: $('#date').val(),
                member_id: $('#member_id').val(),
                principal_saving: $('#principal_saving').val(),
                mandatory_saving: $('#mandatory_saving').val(),
                voluntary_saving: $('#voluntary_saving').val(),
            },
            success: function(html) {
                location.reload();
            },
        });
    }   
    $('#exampleModal').on('hidden.bs.modal', function() {
        $('#date').val();
        $('#member_id').val();
        $('#principal_saving').val();
        $('#mandatory_saving').val();
        $('#voluntary_saving').val();
    });
</script>
<script>
    $('#savingHistoryTable').dataTable( {
        paging: true,
        autoWidth: true
    });
</script>
@endsection