@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit About Us</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">About Us</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">About Us Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/aboutus/{{ $about->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title')is-invalid @enderror" placeholder="Title" id="title" name="title" value="{{ old('title', $about->title) }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" placeholder="Description"> {{ old('description' , $about->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" class="img-preview img-fluid mb-3 col-sm-3">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-3">
                @endif
               
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $about->image }}">
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

                    @if($about->image2)
                    <img src="{{ asset('storage/' . $about->image2) }}" class="img-preview2 img-fluid mb-3 col-sm-3">
                    @else
                    <img class="img-preview2 img-fluid mb-3 col-sm-3">
                     @endif
                    <div class="form-group row">
                      
                        <label class="col-sm-2 col-form-label">Image 2</label>
                        <input type="hidden" name="oldImage2" value="{{ $about->image2 }}">
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input class="form-control @error('image2')is-invalid @enderror" type="file" id="image2" name="image2" onchange="previewImage2()">
                            @error('image2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                            
                        </div>
                            </div>
                        </div>

                        <div class="form-group row">
                      
                            <label class="col-sm-2 col-form-label">Video</label>
                          
                            <div class="col-sm-10">
                               
                                    <input type="text" class="form-control @error('video')is-invalid @enderror" placeholder="Video" id="video" name="video" value="{{ old('video',  $about->video) }}">
                                    @error('video')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                     @enderror
                             
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Slug </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('slug')is-invalid @enderror" placeholder="slug" id="slug" name="slug" value="{{ old('slug',  $about->slug) }}">
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('status')is-invalid @enderror" placeholder="status" id="status" name="status" value="{{ old('status',  $about->status) }}">
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                            </div>
                
                
             
               
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit About Us</button>
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

   function previewImage2(){
   const image2 = document.querySelector('#image2');
   const imgPreview = document.querySelector('.img-preview2');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();

   oFReader.readAsDataURL(image2.files[0]);

   oFReader.onload = function (oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }

   }
   
</script>



@endsection