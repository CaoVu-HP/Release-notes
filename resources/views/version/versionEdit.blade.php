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
                <form method="post" enctype="multipart/form-data" action="{{route('updateVersion')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                        <img src="/storage/{{$singleVersion->image}}" class=" rounded-circle w-25">
                        <input type="file" class="form-control-file" id="image" name="image" value="{{ old('url') ?? $singleVersion->image}}">
                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" id="name" name="name" class="form-control " value="{{$singleVersion->name}}" required
                        />
                        <input type="hidden" name="id"   class="form-control" value="{{$singleVersion->id}}" placeholder="Enter Name" />
                    </div>

                    <!-- Example single danger button -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1"  name="department" >
                            <option selected hidden>{{$singleVersion->department}}</option>
                            @foreach($department as $departments)
                                <option >{{$departments}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Position</label>
                        <input type="text" id="author" name="position" class="form-control" value="{{$singleVersion->position}}" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Started Time</label>
                        <input type="date" id="time" name="time" class="form-control" value="{{$singleVersion->time}}" required />
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


