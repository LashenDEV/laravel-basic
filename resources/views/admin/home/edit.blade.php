@extends('admin.admin-master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit HomeAbout</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.about', $homeabout->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">About Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="About Title"
                            name="title" value="{{ $homeabout->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">About Short Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="short_description">{{ $homeabout->title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">About Long Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="long_description">{{ $homeabout->title }}</textarea>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
