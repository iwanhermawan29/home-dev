@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit Banners</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Banners</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Banners Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/banners/{{ $banner->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
              
               

                @if($banner->image)
                <img src="{{ asset('storage/' . $banner->image) }}" class="img-preview img-fluid mb-3 col-sm-3">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-3">
                @endif
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $banner->image }}">
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
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title')is-invalid @enderror" placeholder="Title" id="title" name="title" value="{{ old('title', $banner->title) }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>

                    
                
             
               
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Banners</button>
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