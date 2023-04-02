@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Show Details</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Show</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Show Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form >


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Home</label>
                    <div class="col-sm-10">
                        <select id="home_property_id" class="form-control" name="home_property_id" disabled>
                         
                            @foreach($homes as $home)
                            @if(old('home_property_id' == $home->id))
                            <option value="{{ $home->id }}" selected>{{ $home->name }}</option>
                            @else
                            <option value="{{ $home->id }}">{{ $home->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Type" id="type" name="type" value="{{ old('type', $detail->type) }}">
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Beedroom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Beedroom" id="bedroom" name="bedroom" value="{{ old('bedroom', $detail->bedroom) }}">
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bathroom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " placeholder="Baathroom" id="bathroom" name="bathroom" value="{{ old('bathroom', $detail->bathroom) }}">
                    </div>
                </div>

                
                
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Garage</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Garage" id="garage" name="garage" value="{{ old('garage', $detail->garage) }}">
                    </div>
                </div>

                

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Area</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Area" id="area" name="area" value="{{ old('area', $detail->area) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Price" id="price" name="price" value="{{ old('price', $detail->price) }}">
                    </div>
                </div>


                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Status" id="status" name="status" value="{{ old('status', $detail->status) }}">
                    </div>
                </div>



                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label"> Video </label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control" type="text" value="{{ $detail->video }}" readonly>
                            
                        
                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Map</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Map" id="map" name="map" value="{{ old('map',  $detail->map) }}">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Latitude</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Latitude" id="latitude" name="latitude" value="{{ old('latitude',  $detail->latitude) }}">
                
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Longitude</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Longitude" id="longitude" name="longitude" value="{{ old('longitude',  $detail->longitude) }}">
                    
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Year" id="year" name="year" value="{{ old('year',  $detail->year) }}">
                            
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Roof</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Roof" id="roof" name="roof" value="{{ old('roof',  $detail->roof) }}">
                         
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Floor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Floor" id="floor" name="floor" value="{{ old('floor',  $detail->floor) }}">
                        </div>
                    </div>
                

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Heating</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Heating" id="heating" name="heating" value="{{ old('heating',  $detail->heating) }}">
                        </div>
                    </div>


                    
                    @if($detail->image_plan)
                    <img src="{{ asset('storage/' . $detail->image_plan) }}" class="img-preview img-fluid mb-3 col-sm-3">
                    @else
                   
                    @endif
                <div class="form-group row">
                  
                    <label class="col-sm-2 col-form-label">Image Plan</label>
                    <input type="hidden" name="oldImage" value="{{ $detail->image_plan }}">
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input class="form-control" type="text" id="image_plan" name="image_plan"  value="{{ $detail->image_plan }}">
                    
                    </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Land Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Land Area" id="land_area" name="land_area" value="{{ old('land_area', $detail->land_area) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Building Area</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Building Area" id="building_area" name="building_area" value="{{ old('building_area', $detail->building_area) }}">
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