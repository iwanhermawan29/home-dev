@extends('dashboard.layouts.main')


@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Show Home</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Show</a></li>
        </ol>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Show Form</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
                
             
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name', $homes->name) }}">
                     
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Slug" id="slug" name="slug" value="{{ old('slug',  $homes->slug) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Address" id="address" name="address" value="{{ old('address', $homes->address) }}">
                    
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <select id="unit_id" class="form-control" name="unit_id" disabled>
                         
                            @foreach($units as $unit)
                            @if(old('unit_id' == $unit->id))
                            <option value="{{ $unit->id }}" selected>{{ $unit->name }}</option>
                            @else
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <select id="city_id" class="form-control" name="city_id" disabled>
                         
                            @foreach($cities as $citi)
                            @if(old('city_id' == $citi->id))
                            <option value="{{ $citi->id }}" selected>{{ $citi->name }}</option>
                            @else
                            <option value="{{ $citi->id }}">{{ $citi->name }}</option>
                            @endif
                            @endforeach
                        </select>
                      
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Province</label>
                    <div class="col-sm-10">
                        <select id="province_id" class="form-control" name="province_id" disabled>
                         
                            @foreach($provinces as $province)
                            @if(old('province_id' == $province->id))
                            <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                            @else
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endif
                            @endforeach
                        </select>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Zip</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Zip" id="zip" name="zip" value="{{ old('zip',  $homes->zip) }}">
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Country" id="country" name="country" value="{{ old('country',  $homes->country) }}">
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