@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/student-courses"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/student-courses/create">Student Courses</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Student Course</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Student Course</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/student-courses">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('name') }}"  name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror"></textarea>
                            </div>
                            @error('name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('details') }}"  name="details" placeholder="Details" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('location') }}"  name="location" placeholder="Location" class="form-control @error('location') is-invalid @enderror"></textarea>
                            </div>
                            @error('location')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ old('start_date') }}"  name="start_date" placeholder="Start Date" class="form-control @error('start_date') is-invalid @enderror"></input>
                            </div>
                            @error('start_date')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ old('end_date') }}"  name="end_date" placeholder="Start Date" class="form-control @error('end_date') is-invalid @enderror"></input>
                            </div>
                            @error('end_date')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>

    @if(session()->has('type'))
        <script>
            $.notify({
                // options
                title: '<h4 style="color:white">{{ session('title') }}</h4>',
                message: '{{ session('message') }}',
            },{
                // settings
                type: '{{ session('type') }}',
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 3000,
                timer: 1000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
        </script>
    @endif
@endsection
