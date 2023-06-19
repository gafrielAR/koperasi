@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Dashboard <span id="tahunIniText">| Tahun ini</span></h1>
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
                    <h5 class="card-title">Uang Masuk</h5>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-uang-masuk"></i>
                            </div>
                            <div class="ps-3">
                                <h6 id="totalSavings">Rp. 0</h6>
                                <span class="small pt-1 fw-bold" id="savingsPercentage">0%</span>
                                <span class="text-muted small pt-2 ps-1" id="savingsChangeText"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card info-card income-card p-0">
                <div class="p-3">
                    <h5 class="card-title">Uang Keluar</h5>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-uang-keluar"></i>
                            </div>
                            <div class="ps-3">
                                <h6 id="totalSpendings">Rp. 0</h6>
                                <span class="small pt-1 fw-bold" id="spendingsPercentage">0%</span>
                                <span class="text-muted small pt-2 ps-1" id="spendingsChangeText"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card info-card income-card p-0">
                <div class="p-3">
                    <h5 class="card-title">Total Pinjaman</h5>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-total-pinjaman"></i>
                            </div>
                            <div class="ps-3">
                                <h6 id="totalLoan">Rp. 0</h6>
                                <span class="small pt-1 fw-bold" id="loanPercentage">0%</span>
                                <span class="text-muted small pt-2 ps-1" id="loanChangeText"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card info-card income-card p-0">
                <div class="p-3">
                    <h5 class="card-title">Total Simpanan</h5>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-total-simpanan"></i>
                            </div>
                            <div class="ps-3">
                                <h6 id="totalSaving">Rp. 0</h6>
                                <span class="small pt-1 fw-bold" id="savingPercentage">0%</span>
                                <span class="text-muted small pt-2 ps-1" id="savingChangeText"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card info-card income-card p-0">
                <div class="p-3">
                    <h5 class="card-title">Total Angsuran</h5>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="ci-2 ci-dashboard-total-angsuran"></i>
                            </div>
                            <div class="ps-3">
                                <h6 id="totalInstallments">Rp. 0</h6>
                                <span class="small pt-1 fw-bold" id="installmentsPercentage">0%</span>
                                <span class="text-muted small pt-2 ps-1" id="installmentsChangeText"></span>
                            </div>
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
                                    <button class="nav-link active" id="simpanan-tab" data-bs-toggle="tab" data-bs-target="#simpanan" type="button" role="tab" aria-controls="simpanan" aria-selected="true">Simpanan</button>
                                </li>
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link" id="pinjaman-tab" data-bs-toggle="tab" data-bs-target="#pinjaman" type="button" role="tab" aria-controls="pinjaman" aria-selected="false">Pinjaman</button>
                                </li>
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link" id="angsuran-tab" data-bs-toggle="tab" data-bs-target="#angsuran" type="button" role="tab" aria-controls="angsuran" aria-selected="false">Angsuran</button>
                                </li>
                                <li class="nav-item mr-4" role="presentation">
                                    <button class="nav-link" id="shu-tab" data-bs-toggle="tab" data-bs-target="#shu" type="button" role="tab" aria-controls="shu" aria-selected="false">Shu</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="historyContent">
                                <div class="tab-pane fade show active overflow-x-scroll" id="simpanan" role="tabpanel" aria-labelledby="simpanan-tab">
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
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $shu['member'] }}</td>
                                                        <td>{{ $shu['year'] }}</td>
                                                        <td>Rp. {{ number_format($shu['total_savings']) }}</td>
                                                        <td>Rp. {{ number_format($shu['total_interest']) }}</td>
                                                        <td>Rp. {{ number_format($shu['shu']) }}</td>
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
                    <label for="date" class="col-sm-2 col-form-label text-end">Tanggal <span class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="member_id" class="col-sm-2 col-form-label text-end">Anggota <span class="text-danger fw-bold">*</span>:</label>
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
                        <input type="number" min="1" class="form-control" id="principal_saving" name="principal_saving" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="mandatory_saving" class="col-sm-2 col-form-label text-end">S. Wajib :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="mandatory_saving" name="mandatory_saving" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="voluntary_saving" class="col-sm-2 col-form-label text-end">S. Sukarela :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="voluntary_saving" name="voluntary_saving" required>
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
                    <label for="date" class="col-sm-2 col-form-label text-end">Tanggal <span class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" required disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="member_id" class="col-sm-2 col-form-label text-end">Anggota <span class="text-danger fw-bold">*</span>:</label>
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
                        <input type="number" min="1" class="form-control" id="term" name="term" placeholder="Bulan" required>
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
                    <label for="date" class="col-sm-2 col-form-label text-end">Tanggal <span class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" required disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="loan_id" class="col-sm-2 col-form-label text-end">No.Pinjaman <span class="text-danger fw-bold">*</span>:</label>
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
                        <input type="number" min="1" class="form-control" id="installment_number" name="installment_number" required>
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
        // Function to update the card content based on the selected year
        function updateCard(year) {
            $.ajax({
                url: "{{ route('admin.filter') }}"
                , method: 'GET'
                , data: {
                    year: year
                }
                , success: function(response) {
                    // Calculate the total savings for the selected year
                    var totalSavings = response.savings.reduce(function(sum, item) {
                        return sum + item.principal_saving + item.mandatory_saving + item.voluntary_saving;
                    }, 0);

                    // Calculate the total spendings from loans for the selected year
                    var totalSpendings = response.loans.reduce(function(sum, item) {
                        return sum + item.loan;
                    }, 0);

                    // Calculate the total spendings from loans for the selected year
                    var totalInstallments = response.installments.reduce(function(sum, item) {
                        return sum + item.ammount;
                    }, 0);

                    // Calculate the total spendings for the previous year
                    var previousYear = year - 1;
                    $.ajax({
                        url: "{{ route('admin.filter') }}"
                        , method: 'GET'
                        , data: {
                            year: previousYear
                        }
                        , success: function(previousResponse) {
                            var previousYearSavings = previousResponse.savings.reduce(function(sum, item) {
                                return sum + item.principal_saving + item.mandatory_saving + item.voluntary_saving;
                            }, 0);

                            var previousYearSpendings = previousResponse.loans.reduce(function(sum, item) {
                                return sum + item.loan;
                            }, 0);

                            var previousYearInstallments = previousResponse.installments.reduce(function(sum, item) {
                                return sum + item.ammount;
                            }, 0);

                            // Calculate the savings percentage change from the previous year
                            var savingsPercentage = 0;
                            if (previousYearSavings !== 0) {
                                savingsPercentage = ((totalSavings - previousYearSavings) / previousYearSavings) * 100;
                            }

                            // Calculate the spendings percentage change from the previous year
                            var spendingsPercentage = 0;
                            if (previousYearSpendings !== 0) {
                                spendingsPercentage = ((totalSpendings - previousYearSpendings) / previousYearSpendings) * 100;
                            }

                            // Calculate the spendings percentage change from the previous year
                            var installmentsPercentage = 0;
                            if (previousYearInstallments !== 0) {
                                installmentsPercentage = ((totalInstallments - previousYearInstallments) / previousYearInstallments) * 100;
                            }

                            // Update the card content with the new values
                            $('#savingsPercentage').removeClass('text-danger text-success');
                            $('#totalSavings').text('Rp. ' + totalSavings.toLocaleString());
                            $('#savingsPercentage').text(savingsPercentage.toFixed(2) + '%');
                            $('#savingsPercentage').addClass(savingsPercentage >= 0 ? 'text-success' : 'text-danger');
                            $('#savingsChangeText').text(savingsPercentage >= 0 ? 'increase' : 'decrease');

                            $('#savingPercentage').removeClass('text-danger text-success');
                            $('#totalSaving').text('Rp. ' + totalSavings.toLocaleString());
                            $('#savingPercentage').text(savingsPercentage.toFixed(2) + '%');
                            $('#savingPercentage').addClass(savingsPercentage >= 0 ? 'text-success' : 'text-danger');
                            $('#savingChangeText').text(savingsPercentage >= 0 ? 'increase' : 'decrease');

                            // Update the spendings card content
                            $('#totalSpendings').text('Rp. ' + totalSpendings.toLocaleString());
                            $('#spendingsPercentage').removeClass('text-danger text-success');
                            $('#spendingsPercentage').text(spendingsPercentage.toFixed(2) + '%');
                            $('#spendingsPercentage').addClass(spendingsPercentage >= 0 ? 'text-success' : 'text-danger');
                            $('#spendingsChangeText').text(spendingsPercentage >= 0 ? 'increase' : 'decrease');

                            // Update the spendings card content
                            $('#totalLoan').text('Rp. ' + totalSpendings.toLocaleString());
                            $('#loanPercentage').removeClass('text-danger text-success');
                            $('#loanPercentage').text(spendingsPercentage.toFixed(2) + '%');
                            $('#loanPercentage').addClass(spendingsPercentage >= 0 ? 'text-success' : 'text-danger');
                            $('#loanChangeText').text(spendingsPercentage >= 0 ? 'increase' : 'decrease');

                            // Update the spendings card content
                            $('#totalInstallments').text('Rp. ' + totalInstallments.toLocaleString());
                            $('#installmentsPercentage').removeClass('text-danger text-success');
                            $('#installmentsPercentage').text(installmentsPercentage.toFixed(2) + '%');
                            $('#installmentsPercentage').addClass(installmentsPercentage >= 0 ? 'text-success' : 'text-danger');
                            $('#installmentsChangeText').text(installmentsPercentage >= 0 ? 'increase' : 'decrease');
                        }
                        , error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
                , error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }



        function savingHistory(year) {
            year = year || new Date().getFullYear();

            $.ajax({
                url: "{{ route('admin.getData') }}"
                , method: 'GET'
                , data: {
                    year: year
                }
                , success: function(response) {
                    var dataTable = $('#savingHistoryTable').DataTable();
                    dataTable.clear();
                    $.each(response.savings, function(index, saving) {
                        var row = [
                            (index + 1)
                            , saving.prefix + ("000000" + saving.id).slice(-6)
                            , saving.date
                            , saving.member.nip + ' - ' + saving.member.name
                            , parseFloat(saving.principal_saving).toFixed(2)
                            , parseFloat(saving.mandatory_saving).toFixed(2)
                            , parseFloat(saving.voluntary_saving).toFixed(2)
                            , '<span class="btn badge text-bg-primary">' +
                            '<a class="text-decoration-none text-light" id="editButtonSavings" href="#" data-id="' + saving.id + '">' +
                            '<i class="bi bi-pencil-square"></i> Edit' +
                            '</a>' +
                            '</span>' +
                            '<span class="btn badge text-bg-danger">' +
                            '<a class="text-decoration-none text-light" id="deleteButtonSavings" href="#" data-id="' + saving.id + '">' +
                            '<i class="bi bi-trash3"></i> Hapus' +
                            '</a>' +
                            '</span>'
                        ];
                        dataTable.row.add(row);
                    });
                    dataTable.draw();
                }
                , error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function loanHistory(year) {
            year = year || new Date().getFullYear();

            $.ajax({
                url: "{{ route('admin.getData') }}"
                , method: 'GET'
                , data: {
                    year: year
                }
                , success: function(response) {
                    var dataTable = $('#loanHistoryTable').DataTable();
                    dataTable.clear();

                    $.each(response.loans, function(index, loan) {
                        var row = [
                            (index + 1)
                            , loan.prefix + ("000000" + loan.id).slice(-6)
                            , loan.member.name
                            , loan.date
                            , 'Rp. ' + parseFloat(loan.loan).toFixed(2)
                            , 'Rp. ' + parseFloat(loan.interest).toFixed(2)
                            , loan.term + ' Bulan'
                            , 'Rp. ' + parseFloat(loan.installment).toFixed(2)
                            , '<span class="btn badge text-bg-primary">' +
                            '<a class="text-decoration-none text-light" id="editButtonLoan" href="#" data-id="' + loan.id + '">' +
                            '<i class="bi bi-pencil-square"></i> Edit' +
                            '</a>' +
                            '</span>' +
                            '<span class="btn badge text-bg-danger">' +
                            '<a class="text-decoration-none text-light" id="deleteButtonLoan" href="#" data-id="' + loan.id + '">' +
                            '<i class="bi bi-trash3"></i> Hapus' +
                            '</a>' +
                            '</span>'
                        ];

                        dataTable.row.add(row);
                    });

                    dataTable.draw();
                }
                , error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function installmentHistory(year) {
            year = year || new Date().getFullYear();

            $.ajax({
                url: "{{ route('admin.getData') }}"
                , method: 'GET'
                , data: {
                    year: year
                }
                , success: function(response) {
                    var dataTable = $('#installmentHistoryTable').DataTable();
                    dataTable.clear();

                    $.each(response.installments, function(index, installment) {
                        var row = [
                            (index + 1)
                            , installment.prefix + ("000000" + installment.id).slice(-6)
                            , installment.date
                            , installment.loan.prefix + ("000000" + installment.loan.id).slice(-6)
                            , installment.loan.member.nip + ' - ' + installment.loan.member.name
                            , installment.installment_number
                            , 'Rp. ' + parseFloat(installment.ammount).toFixed(2)
                            , '<span class="btn badge text-bg-primary">' +
                            '<a class="text-decoration-none text-light" id="editButtonInstallment" href="#" data-id="' + installment.id + '">' +
                            '<i class="bi bi-pencil-square"></i> Edit' +
                            '</a>' +
                            '</span>' +
                            '<span class="btn badge text-bg-danger">' +
                            '<a class="text-decoration-none text-light" id="deleteButtonInstallment" href="#" data-id="' + installment.id + '">' +
                            '<i class="bi bi-trash3"></i> Hapus' +
                            '</a>' +
                            '</span>'
                        ];

                        dataTable.row.add(row);
                    });

                    dataTable.draw();
                }
                , error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        // Event listener for filter selection
        $('.filter-option').click(function(e) {
            e.preventDefault();
            var selectedYear = $(this).data('year');
            $('#tahunIniText').text('| ' + selectedYear);
            updateCard(selectedYear);
            savingHistory(selectedYear);
            loanHistory(selectedYear);
            installmentHistory(selectedYear);
        });

        // Initial card update for the current year
        var currentYear = new Date().getFullYear();
        $('#tahunIniText').text('| ' + currentYear);
        updateCard(currentYear);
        savingHistory(currentYear);
        loanHistory(currentYear);
        installmentHistory(currentYear);
    });

</script>
<script>
    $(document).ready(function() {
        $('#member_id').select2({
            dropdownParent: ".modal"
            , theme: 'bootstrap-5'
        });
        $('#loan_id').select2({
            dropdownParent: ".modal"
            , theme: 'bootstrap-5'
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
            url: 'admin/saving/' + id + '/edit'
            , type: 'GET'
            , success: function(response) {
                console.log(response.result);
                $('#savingModal').modal('show');
                $('#date').val(response.result.date)
                    , $('#date').attr('disabled', true)
                    , $('#member_id').val(response.result.member_id)
                    , $('#member_id').attr('disabled', true)
                    , $('#principal_saving').val(response.result.principal_saving)
                    , $('#mandatory_saving').val(response.result.mandatory_saving)
                    , $('#voluntary_saving').val(response.result.voluntary_saving)
                    , $('#saveSavings').click(function() {
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
                url: 'admin/saving/delete/' + id
                , type: 'POST'
                , success: function(html) {
                    location.reload();
                }
            , });
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
            url: action
            , type: method
            , data: {
                date: $('#date').val()
                , member_id: $('#member_id').val()
                , principal_saving: $('#principal_saving').val()
                , mandatory_saving: $('#mandatory_saving').val()
                , voluntary_saving: $('#voluntary_saving').val()
            , }
            , success: function(html) {
                location.reload();
            }
        , });
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
            url: 'admin/loan/' + id + '/edit'
            , type: 'GET'
            , success: function(response) {
                console.log(response.result);
                $('#loanModal').modal('show');
                $('#date').val(response.result.date)
                    , $('#date').attr('disabled', true)
                    , $('#member_id').val(response.result.member_id)
                    , $('#member_id').attr('disabled', true)
                    , $('#term').val(response.result.term)
                    , $('#loan').val(response.result.loan)
                    , $('#interest').val(response.result.interest)
                    , $('#installment').val(response.result.installment)
                    , $('#saveLoan').click(function() {
                        save(id);
                    });
            }
            , error: function(xhr) {
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
                url: 'admin/loan/delete/' + id
                , type: 'POST'
                , success: function(html) {
                    location.reload();
                }
            , });
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
            url: action
            , type: method
            , data: {
                date: $('#date').val()
                , member_id: $('#member_id').val()
                , term: $('#term').val()
                , loan: $('#loan').val()
                , interest: $('#interest').val()
                , installment: $('#installment').val()
            , }
            , success: function(html) {
                location.reload();
            }
        , });
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
            url: 'admin/installment/' + id + '/edit'
            , type: 'GET'
            , success: function(response) {
                console.log(response.result);
                $('#installmentModal').modal('show');
                $('#date').val(response.result.date)
                    , $('#date').attr('disabled', true)
                    , $('#loan_id').val(response.result.loan_id)
                    , $('#loan_id').attr('disabled', true)
                    , $('#installment_number').val(response.result.installment_number)
                    , $('#ammount').val(response.result.ammount)
                    , $('#saveInstallment').click(function() {
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
                url: 'admin/installment/delete/' + id
                , type: 'POST'
                , success: function(html) {
                    location.reload();
                }
            , });
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
            url: action
            , type: method
            , data: {
                date: $('#date').val()
                , member_id: $('#member_id').val()
                , loan_id: $('#loan_id').val()
                , installment_number: $('#installment_number').val()
                , ammount: $('#ammount').val()
            , }
            , success: function(html) {
                location.reload();
            }
        , });
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
        $('.datatable').dataTable({
            paging: true
            , autoWidth: true
        });
    });

</script>
@endsection
