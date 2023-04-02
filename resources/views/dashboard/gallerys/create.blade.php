@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Create new Gallerys</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Gallerys</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Gallerys Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/gallerys" method="post" enctype="multipart/form-data">
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


                <img class="img-preview img-fluid mb-3 col-sm-3">
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Image</label>
                  
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
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Caption</label>
                    <di<v class="col-sm-10">
                        <textarea class="form-control @error('caption')is-invalid @enderror" name="caption" id="caption" placeholder="Caption"> {{ old('caption') }}</textarea>
                        @error('caption')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>


                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Create Cities</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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