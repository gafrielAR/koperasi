@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="col-12 row">
        <div class="col">
            <div class="card info-card income-card p-0">

                <div class="p-3">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ci-2 ci-dashboard-uang-masuk"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Uang Masuk</h5>
                            <h6>Rp. {{ number_format($savings->sum(function ($row) { return $row->principal_saving +
                                $row->mandatory_saving + $row->voluntary_saving; })) }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col">
            <div class="card info-card outcome-card p-0">

                <div class="p-3">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ci-2 ci-dashboard-uang-keluar"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Uang Keluar</h5>
                            <h6>Rp. {{ number_format($loans->sum('loan')) }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col">
            <div class="card info-card loan-card p-0">

                <div class="p-3">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ci-2 ci-dashboard-total-pinjaman"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Total Pinjaman</h5>
                            <h6>Rp. {{ number_format($loans->sum('loan')) }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col">
            <div class="card info-card saving-card p-0">

                <div class="p-3">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ci-2 ci-dashboard-total-simpanan"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Total Simpanan</h5>
                            <h6>Rp. {{ number_format($savings->sum('principal_saving')) }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col">

            <div class="card info-card installment-card p-0">

                <div class="p-3">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ci-2 ci-dashboard-total-angsuran"></i>
                        </div>
                        <div class="ps-3">
                            <h5>Total Angsuran</h5>
                            <h6>Rp. {{ number_format($installments->sum('ammount')) }}</h6>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="row">

        <div class="col-lg-8">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat</h5>

                            <ul class="nav nav-tabs" id="history" role="tablist">
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link active" id="simpanan-tab" data-bs-toggle="tab"
                                        data-bs-target="#simpanan" type="button" role="tab" aria-controls="simpanan"
                                        aria-selected="true">Simpanan</button>
                                </li>
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link" id="pinjaman-tab" data-bs-toggle="tab"
                                        data-bs-target="#pinjaman" type="button" role="tab" aria-controls="pinjaman"
                                        aria-selected="false">Pinjaman</button>
                                </li>
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link" id="angsuran-tab" data-bs-toggle="tab"
                                        data-bs-target="#angsuran" type="button" role="tab" aria-controls="angsuran"
                                        aria-selected="false">Angsuran</button>
                                </li>
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link" id="shu-tab" data-bs-toggle="tab" data-bs-target="#shu"
                                        type="button" role="tab" aria-controls="shu" aria-selected="false">Shu</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="historyContent">
                                <div class="tab-pane fade show active overflow-x-scroll" id="simpanan" role="tabpanel"
                                    aria-labelledby="simpanan-tab">
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
                                                        <th scope="row">{{ $loop->iteration }}</td>
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
                                                                <a class="text-decoration-none text-light"
                                                                    id="editButtonSavings" href="#"
                                                                    data-id="{{ $saving->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                    Edit
                                                                </a>
                                                            </span>
                                                            <span class="btn badge text-bg-danger">
                                                                <a class="text-decoration-none text-light"
                                                                    id="deleteButtonSavings" href="#"
                                                                    data-id="{{ $saving->id }}">
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
                                <div class="tab-pane fade" id="pinjaman" role="tabpanel" aria-labelledby="pinjaman-tab">
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
                                                        <th scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{ $loan->prefix }}{{ str_pad($loan->id, 6, '0',
                                                            STR_PAD_LEFT) }}</td>
                                                        <td>{{ $loan->member->name }}</td>
                                                        <td>{{ $loan->date }}</td>
                                                        <td>Rp. {{ number_format($loan->loan, 2) }}-</td>
                                                        <td>Rp. {{ number_format($loan->interest, 2) }}-</td>
                                                        <td>{{ $loan->term }} Bulan</td>
                                                        <td>Rp. {{ number_format($loan->installment, 2) }}-</td>
                                                        <td>
                                                            <span class="btn badge text-bg-primary">
                                                                <a class="text-decoration-none text-light"
                                                                    id="editButtonLoan" href="#"
                                                                    data-id="{{ $loan->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                    Edit
                                                                </a>
                                                            </span>
                                                            <span class="btn badge text-bg-danger">
                                                                <a class="text-decoration-none text-light"
                                                                    id="deleteButtonLoan" href="#"
                                                                    data-id="{{ $loan->id }}">
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
                                <div class="tab-pane fade" id="angsuran" role="tabpanel" aria-labelledby="angsuran-tab">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">

                                            <table class="table datatable" id="installmentHistoryTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">No.Transaksi</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">No.Pinjaman</th>
                                                        <th scope="col">Anggota</th>
                                                        <th scope="col">Ke</th>
                                                        <th scope="col">Nominal</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($installments as $installment)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{ $installment->prefix }}{{ str_pad($installment->id, 6,
                                                            '0', STR_PAD_LEFT) }}</td>
                                                        <td>{{ $installment->date }}</td>
                                                        <td>{{ $installment->loan->prefix }}{{
                                                            str_pad($installment->loan->id, 6, '0', STR_PAD_LEFT) }}
                                                        </td>
                                                        <td>{{ $installment->loan->member->nip }} - {{
                                                            $installment->loan->member->name }}</td>
                                                        <td>{{ $installment->installment_number }}</td>
                                                        <td>Rp. {{ number_format($installment->ammount, 2) }}-</td>
                                                        <td>
                                                            <span class="btn badge text-bg-primary">
                                                                <a class="text-decoration-none text-light"
                                                                    id="editButtonInstallments" href="#"
                                                                    data-id="{{ $installment->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                    Edit
                                                                </a>
                                                            </span>
                                                            <span class="btn badge text-bg-danger">
                                                                <a class="text-decoration-none text-light"
                                                                    id="deleteButtonInstallments" href="#"
                                                                    data-id="{{ $installment->id }}">
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
                                <div class="tab-pane fade" id="shu" role="tabpanel" aria-labelledby="shu-tab">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">

                                            <table class="table datatable" id="shuTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Member</th>
                                                        <th scope="col">Tahun Penerimaan SHU</th>
                                                        <th scope="col">Total Simpanan</th>
                                                        <th scope="col">Total Bunga</th>
                                                        <th scope="col">SHU yang diperoleh</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($shuData as $shu)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <th>{{ $shu['member'] }}</th>
                                                        <th>{{ $shu['year'] }}</th>
                                                        <th>Rp. {{ number_format($shu['total_savings']) }}</th>
                                                        <th>Rp. {{ number_format($shu['total_interest']) }}</th>
                                                        <th>Rp. {{ number_format($shu['shu']) }}</th>
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

            </div>
        </div>

        @include('layouts.partials.info')

    </div>
</section>

<!-- Modal Saving -->
<div class="modal fade" id="savingModal" tabindex="-1" aria-labelledby="savingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="savingModalLabel">Form</h1>
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
                    <button class="btn btn-primary mb-3" id="saveSavings"> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Loan --}}
<div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="loanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loanModalLabel">Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label text-end">Tanggal <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" required disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="member_id" class="col-sm-2 col-form-label text-end">Anggota <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <select name="member_id" id="member_id" class="form-control" required disabled>
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
                    <button class="btn btn-primary mb-3" id="saveLoan"> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Installment -->
<div class="modal fade" id="installmentModal" aria-labelledby="installmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="installmentModalLabel">Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label text-end">Tanggal <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" required disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="loan_id" class="col-sm-2 col-form-label text-end">No.Pinjaman <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <select name="loan_id" id="loan_id" class="form-control" required disabled>
                            <option value="" selected disabled>Loan Number</option>
                            @foreach ($loans as $loan)
                            <option value="{{ $loan->id }}">
                                {{ $loan->prefix }}
                                {{ str_pad($loan->id, 6, '0', STR_PAD_LEFT) }} -
                                {{ $loan->member->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="installment_number" class="col-sm-2 col-form-label text-end">Ke :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="installment_number"
                            name="installment_number" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="ammount" class="col-sm-2 col-form-label text-end">ammount :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="ammount" name="ammount" required>
                    </div>
                </div>

                <div style="display: block; text-align: -webkit-center;">
                    <button class="btn btn-primary mb-3" id="saveInstallment"> Save</button>
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
            dropdownParent: ".modal",
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

    // 03_PROSES EDIT
    $('body').on('click', '#editButtonSavings', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'admin/saving/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#savingModal').modal('show');
                $('#date').val(response.result.date),
                $('#date').attr('disabled', true),
                $('#member_id').val(response.result.member_id),
                $('#member_id').attr('disabled', true),
                $('#principal_saving').val(response.result.principal_saving),
                $('#mandatory_saving').val(response.result.mandatory_saving),
                $('#voluntary_saving').val(response.result.voluntary_saving),
                $('#saveSavings').click(function() {
                    save(id);
                });
            }
        });
    });

    // 04_PROSES Delete
    $('body').on('click', '#deleteButtonSavings', function(e) {
        if (confirm('are you sure?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'admin/saving/delete/' + id,
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
            var action = 'admin/saving/create';
            var method = 'POST';
        } else {
            var action = 'admin/saving/update/' + id;
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
    $('#savingModal').on('hidden.bs.modal', function() {
        $('#date').val();
        $('#member_id').val();
        $('#principal_saving').val();
        $('#mandatory_saving').val();
        $('#voluntary_saving').val();
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 03_PROSES EDIT
    $('body').on('click', '#editButtonLoan', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'admin/loan/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#loanModal').modal('show');
                $('#date').val(response.result.date),
                $('#date').attr('disabled', true),
                $('#member_id').val(response.result.member_id),
                $('#member_id').attr('disabled', true),
                $('#term').val(response.result.term),
                $('#loan').val(response.result.loan),
                $('#interest').val(response.result.interest),
                $('#installment').val(response.result.installment),
                $('#saveLoan').click(function() {
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
    $('body').on('click', '#deleteButtonLoan', function(e) {
        if (confirm('are you sure?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'admin/loan/delete/' + id,
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
            var action = 'admin/loan/create';
            var method = 'POST';
        } else {
            var action = 'admin/loan/update/' + id;
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
    $('#loanModal').on('hidden.bs.modal', function() {
        $('#date').val();
        $('#member_id').val();
        $('#term').val();
        $('#loan').val();
        $('#interest').val();
        $('#installment').val();
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 03_PROSES EDIT
    $('body').on('click', '#editButtonInstallments', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'admin/installment/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#installmentModal').modal('show');
                $('#date').val(response.result.date),
                $('#date').attr('disabled', true),
                $('#loan_id').val(response.result.loan_id),
                $('#loan_id').attr('disabled', true),
                $('#installment_number').val(response.result.installment_number),
                $('#ammount').val(response.result.ammount),
                $('#saveInstallment').click(function() {
                    save(id);
                });
            }
        });
    });

    // 04_PROSES Delete
    $('body').on('click', '#deleteButtonInstallments', function(e) {
        if (confirm('are you sure?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'admin/installment/delete/' + id,
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
            var action = 'admin/installment/create';
            var method = 'POST';
        } else {
            var action = 'admin/installment/update/' + id;
            var method = 'POST';
        }
        console.log(action);
        $.ajax({
            url: action,
            type: method,
            data: {
                date: $('#date').val(),
                member_id: $('#member_id').val(),
                loan_id: $('#loan_id').val(),
                installment_number: $('#installment_number').val(),
                ammount: $('#ammount').val(),
            },
            success: function(html) {
                location.reload();
            },
        });
    }   
    $('#installmentModal').on('hidden.bs.modal', function() {
        $('#date').val();
        $('#member_id').val();
        $('#loan_id').val();
        $('#installment_number').val();
        $('#ammount').val();
    });
</script>
<script>
    $(document).ready(function() {
        $('#loan_id').select2({
            dropdownParent: ".modal",
            theme: 'bootstrap-5'
        });
    });
</script>
<script>
    $('.datatable').dataTable( {
        paging: true,
        autoWidth: true
    });
</script>
@endsection