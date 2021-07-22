@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h4>Edit Version</h4>
                </div>

                <div class="modal-body">
                <form method="post" action="{{route('updateVersion')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$singleVersion->name}}" placeholder="Enter Name" />
                        <input type="hidden" name="id"   class="form-control" value="{{$singleVersion->id}}" placeholder="Enter Name" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="content" id="editor"  class="form-control"  placeholder="Enter Content" >{{$singleVersion->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Author</label>
                        <input type="text" name="author" class="form-control" value="{{$singleVersion->author}}" placeholder="Enter Author" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Time</label>
                        <input type="text" name="time" class="form-control" value="{{$singleVersion->time}}" placeholder="Enter Time" />
                    </div>
                    <div class="modal-footer">
                    <button type="button" onclick="window.location='{{ route("version") }}'" class="btn btn-secondary" >Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
