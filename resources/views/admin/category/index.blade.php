<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
{{--            Hi...! <b>{{Auth::user()->name}}</b>--}}
{{--            <b style="float: right">--}}
{{--                Total--}}
{{--                <span class="badge bg-danger">--}}
{{--                </span>--}}
{{--            </b>--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">SL no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
