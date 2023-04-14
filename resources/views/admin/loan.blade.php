@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="p-5 overflow-scroll hide-scrollbar">
    <div class="row">
        <div class="col-sm-4">
            <h1>Loans</h1>
        </div>

        <div class="col-sm-4 offset-sm-4">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-primary" id="addButton">
                        Add
                    </button>
                </div>
                <div class="col-sm-8">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="What you looking for?">
                    </div>
                    <span class="counter pull-right"></span>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-hover table-bordered results">
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
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr>
                <th scope="row">{{ $loop->index+1 }}</td>
                <td>{{ $loan->prefix }}{{ str_pad($loan->id, 6, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $loan->member->name }}</td>
                <td>{{ $loan->date }}</td>
                <td>Rp. {{ number_format($loan->loan, 2) }}-</td>
                <td>Rp. {{ number_format($loan->interest, 2) }}-</td>
                <td>{{ $loan->term }} Bulan</td>
                <td>Rp. {{ number_format($loan->installment, 2) }}-</td>
                <td>
                    <span class="btn badge text-bg-primary">
                        <a class="text-decoration-none text-light" id="editButton" href="#" data-id="{{ $loan->id }}">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    </span>
                    <span class="btn badge text-bg-danger">
                        <a class="text-decoration-none text-light" id="deleteButton" href="#"
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

    {{ $loans->links("pagination::bootstrap-5") }}
</div>

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
                            <option value="" selected disabled>choose member</option>
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
                        <input type="number" min="1" class="form-control" id="loan" name="loan"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="interest" class="col-sm-2 col-form-label text-end">Bunga :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="interest" name="interest"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="installment" class="col-sm-2 col-form-label text-end">Angsuran :</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="installment" name="installment"
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
    $(document).ready(function() {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }});

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' item');

            if(jobCount == '0') {$('.no-result').show();}
            else {$('.no-result').hide();}
        });
    });
</script>
@endsection