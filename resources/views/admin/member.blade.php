@extends('layouts.app')

@section('content')
    <div class="p-5">
        <div class="row">
            <div class="col-sm-4">
                <h1>Members</h1>
            </div>

            <div class="col-sm-4 offset-sm-4">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-4">
                        <button class="btn btn-primary">Add</button>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Member" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">search</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach ($members as $member)
                <div class="col-sm-4 p-2">
                    {{ $member->name }}
                </div>
            @endforeach
        </div>
        {{ $members->links("pagination::bootstrap-5") }}
    </div>
@endsection