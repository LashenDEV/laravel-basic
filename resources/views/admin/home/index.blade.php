@extends('admin.admin-master')

@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <h4>Home Slider</h4>
                    <a href="{{ route('add.about') }}">
                        <button class="btn btn-info">Add About</button>
                    </a>
                    <br><br>
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                Home About  
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">SL no</th>
                                        <th scope="col" width="15%">Title</th>
                                        <th scope="col" width="15%">Short Description</th>
                                        <th scope="col" width="25%">Long Description</th>
                                        <th scope="col" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($homeabouts as $homeabout)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $homeabout->title }}</td>
                                            <td>{{ $homeabout->short_description }}</td>
                                            <td>{{ $homeabout->long_description }}</td>
                                            <td>
                                                <a href="{{ route('edit.about', $homeabout->id) }}"
                                                    class="btn btn-info">Edit
                                                </a>
                                                <a href="{{ route('delete.about', $homeabout->id) }}" class="btn btn-danger"
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
