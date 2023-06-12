@extends('layouts.admin ')

@section('content')
<div class="pagetitle">
    <h1>Pinjaman</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Pinjaman</li>
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
                                    <i class="ci-2 ci-angsuran-total-angsuran"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>Total Pinjaman</h5>
                                    <h6>Rp. {{ number_format($loans->sum('loan')) }}</h6>
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
                                    <i class="ci-2 ci-angsuran-total-kembali"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>Total Kembali</h5>
                                    <h6>Rp. {{ number_format($loans->sum('installment')) }}</h6>
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
                                    <i class="ci-2 ci-angsuran-jumlah-pengangsur"></i>
                                </div>
                                <div class="ps-3">
                                    <h5>Jumlah Peminjam</h5>
                                    <h6>{{ count($loans) }} Orang</h6>
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
                            <h5 class="card-title">Seluruh Pinjaman</h5>
                            <button type="button" class="btn btn-primary" id="addButton">
                                Add
                            </button>

                            <div class="col-lg-12">
                                <div class="table-responsive">

                                    <table class="table datatable" id="loanHistoryTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">No.Transaksi</th>
                                                <th scope="col">Anggota</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Pinjaman</th>
                                                <th scope="col">Bunga</th>
                                                <th scope="col">Masa</th>
                                                <th scope="col">Angsuran</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($loans as $loan)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</td>
                                                <td>{{ $loan->prefix }}{{ str_pad($loan->id, 6, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td>{{ $loan->member->name }}</td>
                                                <td>{{ $loan->date }}</td>
                                                <td>Rp. {{ number_format($loan->loan, 2) }}-</td>
                                                <td>Rp. {{ number_format($loan->interest, 2) }}-</td>
                                                <td>{{ $loan->term }} Bulan</td>
                                                <td>Rp. {{ number_format($loan->installment, 2) }}-</td>
                                                <td>
                                                    <span class="btn badge text-bg-primary">
                                                        <a class="text-decoration-none text-light" id="editButton"
                                                            href="#" data-id="{{ $loan->id }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                            Edit
                                                        </a>
                                                    </span>
                                                    <span class="btn badge text-bg-danger">
                                                        <a class="text-decoration-none text-light" id="deleteButton"
                                                            href="#" data-id="{{ $loan->id }}">
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

        @include('layouts.partials.info', ['loans' => $loans])

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
                    <label for="term" class="col-sm-2 col-form-label text-end">Masa :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="term" name="term" placeholder="Bulan"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="loan" class="col-sm-2 col-form-label text-end">Pinjaman :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="loan" name="loan" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="interest" class="col-sm-2 col-form-label text-end">Bunga :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="interest" name="interest" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="installment" class="col-sm-2 col-form-label text-end">Angsuran :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="installment" name="installment" required>
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
            url: 'loan/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#exampleModal').modal('show');
                $('#date').val(response.result.date),
                $('#date').attr('disabled', true),
                $('#member_id').val(response.result.member_id),
                $('#member_id').attr('disabled', true),
                $('#term').val(response.result.term),
                $('#loan').val(response.result.loan),
                $('#interest').val(response.result.interest),
                $('#installment').val(response.result.installment),
                $('#save').click(function() {
                    save(id);
                });
            },
            error: function(xhr) {
                // Handle error response
                var errors = xhr.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    var errorHtml = '';
                    $.each(messages, function(index, message) {
                        errorHtml += '<li>' + message + '</li>';
                    });
                    $('#' + field + '_error').html(errorHtml);
                });
            }
        });
    });

    // 04_PROSES Delete
    $('body').on('click', '#deleteButton', function(e) {
        if (confirm('are you sure?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'loan/delete/' + id,
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
            var action = 'loan/create';
            var method = 'POST';
        } else {
            var action = 'loan/update/' + id;
            var method = 'POST';
        }
        console.log(action);
        $.ajax({
            url: action,
            type: method,
            data: {
                date: $('#date').val(),
                member_id: $('#member_id').val(),
                term: $('#term').val(),
                loan: $('#loan').val(),
                interest: $('#interest').val(),
                installment: $('#installment').val(),
            },
            success: function(html) {
                location.reload();
            },
        });
    }
    $('#exampleModal').on('hidden.bs.modal', function() {
        $('#date').val();
        $('#member_id').val();
        $('#term').val();
        $('#loan').val();
        $('#interest').val();
        $('#installment').val();
    });
</script>
<script>
    $('#loanHistoryTable').dataTable( {
        paging: true,
        autoWidth: true
    });
</script>
@endsection