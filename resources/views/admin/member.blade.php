@extends('layouts.admin')

@section('content')
<div class="pagetitle d-flex align-item-between">
    <div class="col-auto me-auto">
        <h1>Anggota</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Anggota</li>
            </ol>
        </nav>
    </div>

    <div class="col-auto">
        <div class="row d-flex justify-content-center">
            <div class="col">
                <button type="button" class="btn btn-primary" id="addButton">
                    Tambah Anggota Baru
                </button>
            </div>
            <div class="col">
                <div class="form-group pull-right">
                    <input type="text" class="search form-control" placeholder="Cari">
                </div>
                <span class="counter pull-right"></span>
            </div>
        </div>
    </div>
</div>

<section class="section dashboard results">
    <div class="row data">
        @foreach ($members as $member)
        <div class="col-md-2 member-data">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="{{ asset('assets/img/profile.webp') }}" alt="Profile" class="rounded-circle"
                        style="width: 85px">
                    <h2 class="text-center pt-2 m-0" style="font-size: 16px; font-weight: 900;">{{ $member->name }}</h2>
                    <h3 style="font-size: 12px;" class="m-0">{{ $member->nip }}</h3>
                    <h3 style="font-size: 12px;" class="m-0">
                        <i class='bx bx-{{ $member->gender === "male" ? "male" : "female" }}-sign'></i>
                        {{ $member->gender }}
                    </h3>
                    <div class="social-links mt-2">
                        <a href="{{ route('admin.member.show', ['id' => $member->id]) }}">
                            <button class="btn btn-sm btn-primary">Lihat Detail</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach

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
        if (confirm('Are you sure deleting this data ?') == true) {
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
<script>
    $(document).ready(function() {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results .data').children('.member-data');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }});

            $(".results .data .member-data").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).addClass('d-none');
            });

            $(".results .data .member-data:containsi('" + searchSplit + "')").each(function(e){
                $(this).removeClass('d-none')
            });
        });
    });
</script>
@endsection