@extends('admin.admin-master')
@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Contact</h2>
            </div>
            <div class="card-body">
                <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="Contact Email" name="email">
                    </div><div class="form-group">
                        <label for="exampleFormControlInput1">Contact Phone</label>
                        <input type="tel" class="form-control" id="exampleFormControlInput1"
                               placeholder="Contact Phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               placeholder="Contact Address" name="address">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
