<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multi Image
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-group">
                            @foreach($images as $image)
                                <div class="col-md-4 p-2">
                                    <div class="card">
                                        <img src="{{asset($image->image)}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Multi Image
                            </div>
                            <div class="card-body">
                                <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Multi Image</label>
                                        <input type="file" class="form-control" name="image[]" multiple="">
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
