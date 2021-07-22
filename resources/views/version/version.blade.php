@extends('layouts.app')
<style>
    .ck-editor__editable_inline {
        max-height: 80px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModal">Create New
                        </button>
                    </div>
                    <p class="text-success" style="text-align: center">{{Session::get('message')}}</p>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Content</th>
                                <th scope="col">Author</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($allVersion as $version)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$version->name}}</td>
                                    <td>{!!$version->content!!}</td>
                                    <td>{{$version->author}}</td>
                                    <td>{{$version->time}}</td>
                                    <td>
                                        <a href="{{route('editVersion',['id'=>$version->id])}}">Edit</a>
                                        <a href="{{route('deleteVersion',['id'=>$version->id])}}"
                                           onclick="return confirm('Are you sure to delete this')">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create new Version</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('insertVersion')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"/>
                        </div>

                        <div class="form-group" >
                            <label for="description">Content</label>
                            <textarea class="form-control" name="content"  id="editor"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Author</label>
                            <input type="text" name="author" class="form-control" placeholder="Enter Author"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Time</label>
                            <input type="text" name="time" class="form-control" placeholder="Enter Time"/>
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
            .create( document.querySelector( '#editor',) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endsection
