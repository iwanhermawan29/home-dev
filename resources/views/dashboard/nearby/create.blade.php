@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Create new nearbys</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Nearbys</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Nearbys Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/nearbys" method="post">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Home</label>
                    <div class="col-sm-10">
                        <select id="home_property_id" class="form-control" name="home_property_id">
                         
                            @foreach($homes as $home)
                            @if(old('home_property_id' == $home->id))
                            <option value="{{ $home->id }}" selected>{{ $home->name }}</option>
                            @else
                            <option value="{{ $home->id }}">{{ $home->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('home_property_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select id="type" class="form-control" name="type">
                            <option value="Education">Education</option>
                            <option value="Health & Medical">Health & Medical</option>
                            <option value="Transportation">Transportation</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('name')is-invalid @enderror" name="name" id="name" placeholder="Name"> {{ old('name') }}</textarea>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Distance</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('distance')is-invalid @enderror" name="distance" id="distance" placeholder="Distance"> {{ old('distance') }}</textarea>
                        @error('distance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rating</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('rating')is-invalid @enderror" placeholder="Rating" id="rating" name="rating" value="{{ old('rating') }}">
                        @error('rating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                





                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Create Nearbys</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection