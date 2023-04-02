@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Create new unit</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Unit</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Unit Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/units" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name')is-invalid @enderror" placeholder="Name" id="name" name="name" value="{{ old('name') }}">
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
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" placeholder="Slug" id="slug" name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('type')is-invalid @enderror" placeholder="Type" id="type" name="type" value="{{ old('type') }}">
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" placeholder="Description" ></textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
              
                <img class="img-preview img-fluid mb-3 col-sm-3">
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Unit Image</label>
                  
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                        
                    </div>
                        </div>
                    </div>
                </div>


             
               
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Create Unit</button>
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
        fetch('/dashboard/units/checkSlug?name=' + name.value)
        .then(response => response.json())

        .then(data => slug.value = data.slug)
    });

    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }

    }
    

</script>
@endsection