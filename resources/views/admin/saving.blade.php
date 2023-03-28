@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="p-5">
    <div class="row">
        <div class="col-sm-4">
            <h1>Savings</h1>
        </div>

        <div class="col-sm-4 offset-sm-4">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-primary" id="addButton">
                        Add
                    </button>
                </div>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Search" aria-controls="savings-table">
                        <span class="input-group-text" id="basic-addon2">search</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{ $dataTable->table() }}
        {{-- <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction Number</th>
                    <th>Date</th>
                    <th>Member</th>
                    <th>Mandatory Saving</th>
                    <th>Voluntary Saving</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> --}}
    </div>

    {{-- {{ $savings->links("pagination::bootstrap-5") }}    --}}
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
                    <label for="name" class="col-sm-2 col-form-label text-end">Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="e.g. John Doe" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label text-end">NIP :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="e.g. 3120500000" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label text-end">Gender :</label>
                    <div class="col-sm-10">
                        <div class="form-control border-0">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male" required>
                                <label class="form-check-label" for="gender">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female" required>
                                <label class="form-check-label" for="gender">Female</label>
                            </div>
                        </div>
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
            url: 'saving/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#exampleModal').modal('show');
                $('#transaction_number').val(response.result.transaction_number),
                $('#date').val(response.result.date),
                $('#member').val(response.result.member),
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
        if (confirm('Are you fucking sure?') == true) {
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
                transaction_number: $('#transaction_number').val(),
                date: $('#date').val(),
                member: $('#member').val(),
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
        $('#transaction_number').val();
        $('#date').val();
        $('#member').val();
        $('#principal_saving').val();
        $('#mandatory_saving').val();
        $('#voluntary_saving').val();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="module">
    $(function() {window.LaravelDataTables=window.LaravelDataTables||{};window.LaravelDataTables["savings-table"]=$("#savings-table").DataTable({"serverSide":true,"processing":true,"ajax":{"url":"http:\/\/koperasi.webdev\/admin\/saving","type":"GET","data":function(data) {
            for (var i = 0, len = data.columns.length; i < len; i++) {
                if (!data.columns[i].search.value) delete data.columns[i].search;
                if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
            }
            delete data.search.regex;}},"columns":[{"data":"id","name":"id","title":"Id","orderable":true,"searchable":true},{"data":"transaction_number","name":"transaction_number","title":"Transaction Number","orderable":true,"searchable":true},{"data":"date","name":"date","title":"Date","orderable":true,"searchable":true},{"data":"member","name":"member","title":"Member","orderable":true,"searchable":true},{"data":"principal_saving","name":"principal_saving","title":"Principal Saving","orderable":true,"searchable":true},{"data":"mandatory_saving","name":"mandatory_saving","title":"Mandatory Saving","orderable":true,"searchable":true},{"data":"voluntary_saving","name":"voluntary_saving","title":"Voluntary Saving","orderable":true,"searchable":true},{"data":"action","name":"action","title":"Action","orderable":false,"searchable":false,"width":60,"className":"text-center"}],"order":[[1,"desc"]],"select":{"style":"single"},"buttons":[{"extend":"excel"},{"extend":"csv"},{"extend":"pdf"},{"extend":"print"},{"extend":"reset"},{"extend":"reload"}]});});
</script>
@endsection