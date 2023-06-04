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
                                    <i class="ci-2 ci-dashboard-total-pinjaman"></i>
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
                                    <i class="ci-2 ci-dashboard-total-pinjaman"></i>
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
                                <button class="btn btn-primary">
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
@endsection

@section('script')
<script>
    $('#savingHistoryTable').dataTable( {
        paging: true,
        autoWidth: true
    });
</script>
@endsection