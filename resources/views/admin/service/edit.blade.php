@extends('admin.admin-master')
@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Update Service</h2>
            </div>
            <div class="card-body">
                <form action="{{route('update.service', $service->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Service Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               value="{{ $service->title }}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Service Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="description">{{ $service->description }}</textarea>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
