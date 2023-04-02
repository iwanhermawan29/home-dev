@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit Home</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Home Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/homes/{{ $homes->slug }}" method="post">
                @method('put')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name')is-invalid @enderror" placeholder="Name" id="name" name="name" value="{{ old('name', $homes->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" placeholder="Slug" id="slug" name="slug" value="{{ old('slug',  $homes->slug) }}">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('address')is-invalid @enderror" placeholder="Address" id="address" name="address" value="{{ old('address', $homes->address) }}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <select id="unit_id" class="form-control" name="unit_id">
                         
                            @foreach($units as $unit)
                            @if(old('unit_id' == $unit->id))
                            <option value="{{ $unit->id }}" selected>{{ $unit->name }}</option>
                            @else
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('unit_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <select id="city_id" class="form-control" name="city_id">
                         
                            @foreach($cities as $citi)
                            @if(old('city_id' == $citi->id))
                            <option value="{{ $citi->id }}" selected>{{ $citi->name }}</option>
                            @else
                            <option value="{{ $citi->id }}">{{ $citi->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('city_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Province</label>
                    <div class="col-sm-10">
                        <select id="province_id" class="form-control" name="province_id">
                         
                            @foreach($provinces as $province)
                            @if(old('province_id' == $province->id))
                            <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                            @else
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('province_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Zip</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('zip')is-invalid @enderror" placeholder="Zip" id="zip" name="zip" value="{{ old('zip',  $homes->zip) }}">
                        @error('zip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('country')is-invalid @enderror" placeholder="Country" id="country" name="country" value="{{ old('country',  $homes->country) }}">
                        @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" placeholder="Description" >{{ old('description', $homes->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

           
              


                
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Home</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/dashboard/homes/checkSlug?name=' + name.value)
        .then(response => response.json())

        .then(data => slug.value = data.slug)
    });

</script>
@endsection