@extends('layouts.app')

@section('content')
    <div class="p-5">
        <h1>Dashboard</h1>
        <div class="row">
            @foreach ($members as $member)
                <div class="col-sm-4 p-2">
                    {{ $member->name }} - 
                    @foreach ($member->loans as $loan)
                        {{ $loan->loan_number }}
                    @endforeach
                </div>
            @endforeach
        </div>
        {{ $members->links("pagination::bootstrap-5") }}
    </div>
@endsection