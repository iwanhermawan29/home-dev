@extends('dashboard.layouts.main')

@section('container')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>My Contact Us</h4>
            <p class="mb-0"> </p>
        </div>
    </div>
   
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Contact Us</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success solid alert-square ">
    <strong>{{ session('success') }}</strong>
 </div>
@endif


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Table Contact Us</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive col-lg-12">
                    <a href="/dashboard/contactus/create" class="btn btn-primary mb-3">Create New Contact Us</a>
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Hours</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($contactus as $contact)

                        
                        <tbody>
                            <tr>
                                <td style="color:black">{{ $loop->iteration }}</td>
                                <td style="color:black">{{ $contact->description }}</td>
                                <td style="color:black">{{ $contact->address }}</td>
                                <td style="color:black">{{ $contact->phone }}</td>
                                <td style="color:black">{{ $contact->hours }}</td>
                                <td style="color:black">{{ $contact->email }}</td>
                                <td style="color:black">
                                    <a href="/dashboard/contactus/{{ $contact->id }}/edit" class="badge bg-primary"><i class="icon-pencil" style="color:white"></i> </a>
                                    <form action="/dashboard/contactus/{{ $contact->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"> <i class="icon-trash" style="color:white"></i></button>
                                    </form>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Hours</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 