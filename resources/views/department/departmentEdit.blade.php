@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <h4>Edit Department</h4>
                </div>

                <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{route('updateDepartment')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" id="name" name="name" class="form-control " value="{{$department->name}}" required
                        />
                        <input type="hidden" name="id"   class="form-control" value="{{$department->id}}" placeholder="Enter Name" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Responsibility</label>
                        <textarea name="responsibility" id="editor"  class="form-control"  placeholder="" required >{{$department->responsibility }}</textarea>
                    </div>
                    <div class="modal-footer">
                    <button type="button" onclick="window.location='{{ route("departments") }}'" class="btn btn-secondary" >Cancel</button>
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
