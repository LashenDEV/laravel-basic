@extends('admin.admin-master')
@section('admin')
    <div class="col-lg-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Slider</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.slider', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Slider Title"
                            name="title" value="{{ $slider->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Slider Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="description">{{ $slider->description }}"</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Slider Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset($slider->image) }}" style="width: 400px; height: 200px">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
