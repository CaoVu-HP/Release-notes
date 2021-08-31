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
                            <form class="form-inline" method="get" enctype="multipart/form-data"
                                  action="{{route('departments')}}">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                       aria-label="Search" name="name">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>

                    </div>

                    <p class="text-success" style="text-align: center">{{Session::get('message')}}</p>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Responsibility</th>
                                <th scope="col">Amount</th>
                                <th scope="col" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($department as $version)
                                <tr>
                                    <td>{{$version->name}}</td>
                                    <td>{!! $version->responsibility !!}</td>
                                    <td>{{$version->amount}}</td>

                                    <td>
                                        <div style=" display:flex ;justify-content: space-evenly">
                                            <button type="button" class="btn btn-secondary"><a
                                                    href="{{route('departmentDetail',['id'=>$version->id])}}"
                                                    class="text-white ">Detail</a></button>
                                            <button type="button" class="btn btn-success"><a
                                                    href="{{route('department.show',['id'=>$version->id])}}"
                                                    class="text-white ">Edit</a></button>
                                            <button type="button" class="btn btn-danger"><a
                                                    href="{{route('deleteDepartment',['id'=>$version->id])}}"
                                                    onclick="return confirm('Are you sure to delete this')"
                                                    class="text-white ">Delete</a></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create new Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{route('storeDepartment')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"/>
                        </div>

                        <div class="form-group">
                            <label for="description">Responsibility</label>
                            <textarea class="form-control" name="responsibility" id="editor"></textarea>
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
@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor',))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
