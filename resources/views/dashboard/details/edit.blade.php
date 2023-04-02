@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Edit Details</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Details</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Details Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/dashboard/details/{{ $detail->id }}" method="post" enctype="multipart/form-data">
                @method('put')
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
                        <input type="text" class="form-control @error('type')is-invalid @enderror" placeholder="Type" id="type" name="type" value="{{ old('type', $detail->type) }}">
                        @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Beedroom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('bedroom')is-invalid @enderror" placeholder="Beedroom" id="bedroom" name="bedroom" value="{{ old('bedroom', $detail->bedroom) }}">
                        @error('bedroom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bathroom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('bathroom')is-invalid @enderror" placeholder="Baathroom" id="bathroom" name="bathroom" value="{{ old('bathroom', $detail->bathroom) }}">
                        @error('bathroom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                
                
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Garage</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('garage')is-invalid @enderror" placeholder="Garage" id="garage" name="garage" value="{{ old('garage', $detail->garage) }}">
                        @error('garage')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Area</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('area')is-invalid @enderror" placeholder="Area" id="area" name="area" value="{{ old('area', $detail->area) }}">
                        @error('area')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('price')is-invalid @enderror" placeholder="Price" id="price" name="price" value="{{ old('price', $detail->price) }}">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>


                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('status')is-invalid @enderror" placeholder="Status" id="status" name="status" value="{{ old('status', $detail->status) }}">
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>



                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label"> Video </label>
                    <input type="hidden" name="oldVideo" value="{{ $detail->video }}">
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control" type="text" value="{{ $detail->video }}" readonly>
                            <input class="form-control @error('video')is-invalid @enderror" type="file" id="video" name="video">
                        @error('video')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                        
                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Map</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('map')is-invalid @enderror" placeholder="Map" id="map" name="map" value="{{ old('map',  $detail->map) }}">
                            @error('map')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Latitude</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('latitude')is-invalid @enderror" placeholder="Latitude" id="latitude" name="latitude" value="{{ old('latitude',  $detail->latitude) }}">
                            @error('latitude')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Longitude</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('longitude')is-invalid @enderror" placeholder="Longitude" id="longitude" name="longitude" value="{{ old('longitude',  $detail->longitude) }}">
                            @error('longitude')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('year')is-invalid @enderror" placeholder="Year" id="year" name="year" value="{{ old('year',  $detail->year) }}">
                            @error('year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Roof</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('roof')is-invalid @enderror" placeholder="Roof" id="roof" name="roof" value="{{ old('roof',  $detail->roof) }}">
                            @error('roof')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Floor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('floor')is-invalid @enderror" placeholder="Floor" id="floor" name="floor" value="{{ old('floor',  $detail->floor) }}">
                            @error('floor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>
                

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Heating</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('heating')is-invalid @enderror" placeholder="Heating" id="heating" name="heating" value="{{ old('heating',  $detail->heating) }}">
                            @error('heating')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>


                    
                    @if($detail->image_plan)
                    <img src="{{ asset('storage/' . $detail->image_plan) }}" class="img-preview img-fluid mb-3 col-sm-3">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-3">
                    @endif
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Image Plan</label>
                    <input type="hidden" name="oldImage" value="{{ $detail->image_plan }}">
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control @error('image_plan')is-invalid @enderror" type="file" id="image_plan" name="image_plan" onchange="previewImage()">
                        @error('image_plan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                         @enderror
                        
                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Land Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('land_area')is-invalid @enderror" placeholder="Land Area" id="land_area" name="land_area" value="{{ old('land_area', $detail->land_area) }}">
                            @error('land_area')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Building Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('building_area')is-invalid @enderror" placeholder="Building Area" id="building_area" name="building_area" value="{{ old('building_area', $detail->building_area) }}">
                            @error('building_area')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>
                
                
                
              

                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
     function previewImage(){
    const image = document.querySelector('#image_plan');
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