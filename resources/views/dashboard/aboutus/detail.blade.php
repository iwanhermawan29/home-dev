@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Detail About Us</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">About Us</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">About Us Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
               
               
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{ old('title', $about->title) }}">
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Description"> {{ old('description' , $about->description) }}</textarea>
                       
                    </div>
                </div>

                @if($about->image)
                <img src="{{ asset('storage/' . $about->image) }}" class="img-preview img-fluid mb-3 col-sm-3">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-3">
                @endif
               
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Image</label>
                   
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" disabled>
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
                     
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input class="form-control @error('image2')is-invalid @enderror" type="file" id="image2" name="image2" onchange="previewImage2()" disabled>
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
                               
                                    <input type="text" class="form-control" placeholder="Video" id="video" name="video" value="{{ old('video',  $about->video) }}">
                                    
                             
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Slug </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="slug" id="slug" name="slug" value="{{ old('slug',  $about->slug) }}">
                                   
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="status" id="status" name="status" value="{{ old('status',  $about->status) }}">
                    
                                </div>
                            </div>
                
                
             
               
                
                
            </form>
        </div>
    </div>
</div>





@endsection