@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="p-5">
    <h1>Members</h1>
    <div class="row">
        @foreach ($members as $member)
        <div class="col-12 col-md-4 p-3">
            <div class="row shadow p-2">
                <div class="col-4">
                    <img src="{{ asset('assets/img/profile.webp') }}" alt="" class="w-100">
                </div>
                <div class="col-8 m-auto">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $member->name }}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>: {{ $member->nip }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: {{ $member->gender }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $members->links("pagination::bootstrap-5") }}
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
                        <input type="text" class="form-control" id="name" name="name" placeholder="e.g. John Doe"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label text-end">NIP :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="e.g. 3120500000"
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label text-end">Gender :</label>
                    <div class="col-sm-10">
                        <div class="form-control border-0">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male"
                                    required>
                                <label class="form-check-label" for="gender">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female"
                                    required>
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
            url: 'member/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                console.log(response.result);
                $('#exampleModal').modal('show');
                $('#name').val(response.result.name);
                $('#nip').val(response.result.nip);
                $("input[name=gender][value=" + response.result.gender + "]").prop('checked', true);
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
                url: 'member/delete/' + id,
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
            var action = 'member/create';
            var method = 'POST';
        } else {
            var action = 'member/update/' + id;
            var method = 'POST';
        }
        console.log(action);
        $.ajax({
            url: action,
            type: method,
            data: {
                name: $('#name').val(),
                nip: $('#nip').val(),
                gender: $('#gender:checked').val(),
            },
            success: function(html) {
                location.reload();
            },
        });
    }   
    $('#exampleModal').on('hidden.bs.modal', function() {
        $('#name').val();
        $('#nip').val();
        $("input[name='gender']").prop('checked', true).val();
    });
</script>
@endsection