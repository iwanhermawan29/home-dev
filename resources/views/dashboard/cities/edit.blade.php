@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit Cities</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Cities</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Cities Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/cities/{{ $city->slug }}" method="post" >
                @method('put')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name')is-invalid @enderror"  id="name" name="name" value="{{ old('name', $city->name) }}">
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
                        <input type="text" class="form-control @error('slug')is-invalid @enderror"  id="slug" name="slug" value="{{ old('slug',  $city->slug) }}">
                        @error('slug')
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
                            @if(old('province_id', $city->province_id) == $province->id)
                            <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                            @else
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                

                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Cities</button>
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
        fetch('/dashboard/cities/checkSlug?name=' + name.value)
        .then(response => response.json())

        .then(data => slug.value = data.slug)
    });

  

</script>
@endsection