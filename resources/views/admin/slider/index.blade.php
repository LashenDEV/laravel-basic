@extends('admin.admin-master')

@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <h4>Home Slider</h4>
                    <a href="{{route('add.slider')}}">
                        <button class="btn btn-info">Add Slider</button>
                    </a>
                    <br><br>
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{   session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                All Sliders
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL no</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td><img src="{{asset($slider->image)}}" style="height: 40px; width: 70px">
                                        </td>
                                        <td>
                                            <a href="#"
                                               class="btn btn-info">Edit
                                            </a>
                                            <a href="#"
                                               class="btn btn-danger"
                                               onclick="return confirm('Are You Sure to Delete This Item')">Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
