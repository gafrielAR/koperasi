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
            <h1>Installment</h1>
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
                <th scope="col">Tanggal</th>
                <th scope="col">No.Pinjaman</th>
                <th scope="col">Anggota</th>
                <th scope="col">Ke</th>
                <th scope="col">Nominal</th>
                <th scope="col">Aksi</th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($installments as $installment)
            <tr>
                <th scope="row">{{ $loop->index+1 }}</td>
                <td>{{ $installment->prefix }}{{ str_pad($installment->id, 6, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $installment->date }}</td>
                <td>{{ $installment->loan->prefix }}{{ str_pad($installment->loan->id, 6, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $installment->loan->member->nip }} - {{ $installment->loan->member->name }}</td>
                <td>{{ $installment->installment_number }}</td>
                <td>Rp. {{ number_format($installment->ammount, 2) }}-</td>
                <td>
                    <span class="btn badge text-bg-primary">
                        <a class="text-decoration-none text-light" id="editButton" href="#"
                            data-id="{{ $installment->id }}">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    </span>
                    <span class="btn badge text-bg-danger">
                        <a class="text-decoration-none text-light" id="deleteButton" href="#"
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

    {{ $installments->links("pagination::bootstrap-5") }}
</div>

<!-- Modal Create -->
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="loan_id" class="col-sm-2 col-form-label text-end">No.Pinjaman <span
                            class="text-danger fw-bold">*</span>:</label>
                    <div class="col-sm-10">
                        <select name="loan_id" id="loan_id" class="form-control" disabled required></select>
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
            url: 'installment/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#exampleModal').modal('show');
                $('#date').val(response.result.date),
                $('#date').attr('disabled', true),
                $('#member_id').val(response.result.member_id),
                $('#member_id').attr('disabled', true),
                $('#loan_id').val(response.result.loan_id),
                $('#loan_id').attr('disabled', true),
                $('#installment_number').val(response.result.installment_number),
                $('#ammount').val(response.result.ammount),
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
                url: 'installment/delete/' + id,
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
            var action = 'installment/create';
            var method = 'POST';
        } else {
            var action = 'installment/update/' + id;
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
    $('#exampleModal').on('hidden.bs.modal', function() {
        $('#date').val();
        $('#member_id').val();
        $('#loan_id').val();
        $('#installment_number').val();
        $('#ammount').val();
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
<script>
    $(document).ready(function() {
        $('#member_id').select2({
            dropdownParent: "#exampleModal",
            theme: 'bootstrap-5'
        });
        
        $('#loan_id').select2({
            dropdownParent: "#exampleModal",
            theme: 'bootstrap-5'
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#member_id').on('change', function () {
            var id_member = this.value;
            $('#loan_id').html('');
            $('#loan_id').removeAttr('disabled');
            $.ajax({
                url: "{{ route('admin.installment.api_loan') }}",
                type: "POST",
                data: {
                    member_id: id_member,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#loan_id').html('<option value="">-- Pilih Pinjaman --</option>');
                    $.each(result.loans, function (key, value) {
                        $("#loan_id").append('<option value="' + value.id + '">' + value.prefix + ("0000000" + value.id).slice(-6) + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection