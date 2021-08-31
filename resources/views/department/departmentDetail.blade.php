@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="paren">
            <h1 class="title" style="text-align: center">{{$department->name}}</h1>
            <div class="form-group">
            <label  class="col-md-4 col-form-label ">Responsibility</label>
            <p class="blue">{!! $department->responsibility !!}</p>
            </div>
            <div class="form-group">
                <label  class="col-md-4 col-form-label ">Amount of Employee</label>
                <p class="blue">{{$department->amount}}</p>
            </div>
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
                    @foreach($employees as $version)
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


                <div class="img" >
                    <img src="https://learn.g2.com/hubfs/What_is_Information_Technology.jpg"
                         class="img-rounded w-32 lg:w-full" width="200" height="200" style="margin-left: auto; margin-right: auto; display: block">
                </div>
                <div class="infor" style="padding-top: 20px;text-align: center">
                    <span class="font-bold ">By CaoVu</span>
                    <div class="text-sm"><p>Certified Laravel | PHP | Laravel Developer.</p></div>
                </div>

        </div>
    </div>
@endsection
