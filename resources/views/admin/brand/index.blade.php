<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{   session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                All Category
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL no</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                        <td>{{$brand->brand_name}}</td>
                                        <td><img src="{{asset($brand->brand_image)}}" style="height: 40px; width: 70px">
                                        </td>
                                        <td>{{$brand->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('edit.brand', $brand->id) }}"
                                               class="btn btn-info">Edit
                                            </a>
                                            <a href="{{ route('delete.brand', $brand->id) }}"
                                               class="btn btn-danger"
                                               onclick="return confirm('Are You Sure to Delete This Item')">Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$brands->links()}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Add Brand
                            </div>
                            <div class="card-body">
                                <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name">
                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                        <input type="file" class="form-control" name="brand_image">
                                        @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        <div class="card">--}}
    {{--                            <div class="card-header">--}}
    {{--                                Trashed Categories--}}
    {{--                            </div>--}}
    {{--                            <table class="table">--}}
    {{--                                <thead>--}}
    {{--                                <tr>--}}
    {{--                                    <th scope="col">SL no</th>--}}
    {{--                                    <th scope="col">User Id</th>--}}
    {{--                                    <th scope="col">Category Name</th>--}}
    {{--                                    <th scope="col">Created at</th>--}}
    {{--                                    <th scope="col">Action</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}
    {{--                                @foreach($trashCat as $brand)--}}
    {{--                                    <tr>--}}
    {{--                                        <th scope="row">{{$brands->firstItem()+$loop->index}}</th>--}}
    {{--                                        <td>{{$brand->brand_name}}</td>--}}
    {{--                                        <img src="" alt="">--}}
    {{--                                        <td>{{$brand->created_at->diffForHumans()}}</td>--}}
    {{--                                        <td><a href="{{route('restore.brand', ['id' => $brand->id])}}"--}}
    {{--                                               class="btn btn-info">Restore</a>--}}
    {{--                                            <a href="{{route('pdelete.brand', ['id' => $brand->id])}}"--}}
    {{--                                               class="btn btn-danger">P. Delete</a></td>--}}
    {{--                                    </tr>--}}
    {{--                                @endforeach--}}
    {{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                            {{$trashCat->links()}}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-4">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-app-layout>
