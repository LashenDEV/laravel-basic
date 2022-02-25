<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
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
                                    <th scope="col">User Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        <td>{{$category->user->name}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('edit.category', ['id' => $category->id])}}"
                                               class="btn btn-info">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Add Category
                            </div>
                            <div class="card-body">
                                <form action="{{route('store.category')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name"
                                               id="exampleInputEmail1"
                                               aria-describedby="emailHelp">
                                        @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
