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
                                <li class="nav-item mx-4" role="presentation">
                                    <button class="nav-link" id="pinjaman-tab" data-bs-toggle="tab"
                                        data-bs-target="#pinjaman" type="button" role="tab" aria-controls="pinjaman"
                                        aria-selected="false">Pinjaman</button>
                                </li>
                                <li class="nav-item ml-4" role="presentation">
                                    <button class="nav-link" id="angsuran-tab" data-bs-toggle="tab"
                                        data-bs-target="#angsuran" type="button" role="tab" aria-controls="angsuran"
                                        aria-selected="false">Angsuran</button>
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
                                                                <a class="text-decoration-none text-light"
                                                                    id="editButton" href="#"
                                                                    data-id="{{ $saving->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                    Edit
                                                                </a>
                                                            </span>
                                                            <span class="btn badge text-bg-danger">
                                                                <a class="text-decoration-none text-light"
                                                                    id="deleteButton" href="#"
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
                                                        <th scope="row">{{ $loop->index+1 }}</td>
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
                                                                    id="editButton" href="#" data-id="{{ $loan->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                    Edit
                                                                </a>
                                                            </span>
                                                            <span class="btn badge text-bg-danger">
                                                                <a class="text-decoration-none text-light"
                                                                    id="deleteButton" href="#"
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
                                                        <th scope="row">{{ $loop->index+1 }}</td>
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
                                                                    id="editButton" href="#"
                                                                    data-id="{{ $installment->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                    Edit
                                                                </a>
                                                            </span>
                                                            <span class="btn badge text-bg-danger">
                                                                <a class="text-decoration-none text-light"
                                                                    id="deleteButton" href="#"
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
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('layouts.partials.info')

    </div>
</section>
@endsection

@section('script')
<script>
    $('#savingHistoryTable').dataTable( {
        paging: true,
        autoWidth: true
    });

    $('#loanHistoryTable').dataTable( {
        paging: true,
        autoWidth: true
    });

    $('#installmentHistoryTable').dataTable( {
        paging: true,
        autoWidth: true
    });
</script>
@endsection