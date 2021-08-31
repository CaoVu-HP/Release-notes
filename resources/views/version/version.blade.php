@extends('layouts.app')
<style>
    .ck-editor__editable_inline {
        max-height: 80px;
    }
</style>
.

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <div>
                        <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#exampleModal">Create New
                        </button>
                        </div>
                        <div style="margin-left: auto">
                        <form class="form-inline" method="get" enctype="multipart/form-data" action="{{route('version')}}">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="name">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        </div>
                    </div>

                    <p class="text-success" style="text-align: center">{{Session::get('message')}}</p>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Position</th>
                                <th scope="col">Started Time</th>
                                <th scope="col" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($allVersion as $version)
                                <tr>
                                    <td>
                                        <img src="/storage/{{$version->image}}" class=" rounded-circle w-50">
                                    </td>
                                    <td>{{$version->name}}</td>
                                    <td>{{$version->department}}</td>
                                    <td>{{$version->position}}</td>
                                    <td>{{$version->time}}</td>
                                    <td >
                                        <div class="d-flex" style="justify-content: space-around">
                                        <button type="button" class="btn btn-success"><a href="{{route('editVersion',['id'=>$version->id])}}" class="text-white ">Edit</a></button>
                                        <button type="button" class="btn btn-danger"> <a href="{{route('deleteVersion',['id'=>$version->id])}}"
                                           onclick="return confirm('Are you sure to delete this')" class="text-white ">Delete</a></button>
                                        </div>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:660px;height: 530px; margin-left: -80px; ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('insertVersion')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"/>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-4 col-form-label ">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            @error('image')
                            <strong>{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1"  name="department">
                                @foreach($department as $departments)
                                <option >{{$departments}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Position</label>
                            <input type="text" name="position" class="form-control" placeholder="Enter Position"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Started Time</label>
                            <input type="date"  name="time" class="form-control" placeholder="Enter Time"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

