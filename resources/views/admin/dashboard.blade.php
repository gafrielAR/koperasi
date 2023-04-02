@extends('layouts.app')

@section('content')
    <div class="p-5">
        <h1>Dashboard</h1>
        <div class="row">
            @foreach ($members as $member)
                <div class="col-12 col-md-4 p-3">
                    <a href="{{ route('admin.loan.read') }}">
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
                    </a>
                </div>
            @endforeach
        </div>
        {{ $members->links("pagination::bootstrap-5") }}
    </div>
@endsection