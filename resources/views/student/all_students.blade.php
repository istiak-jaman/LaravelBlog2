@extends('welcome')
@section('content')
	<div class="container">
          <div class="row">
      <div class="col-lg-10  mx-auto">
        
        	<a href="{{route('student')}}" class="btn btn-danger">Add Student</a>
    
       <hr>

       <table class="table table-responsive">
          <tr>
            <th width="5%">SL</th>
            <th width="20%">Student Name</th>
            <th width="25%">Email</th>
            <th width="20%">Phone No</th>
            <th width="30%">Action</th>
          </tr>
          
            
          

        @foreach($student as $row)
          
          <tr>
            <td>{{$row -> id}}</td>
            <td>{{$row -> name}}</td>
            <td>{{$row -> email}}</td>
            <td>{{$row -> phone}}</td>
            <td>
              <a href="{{ URL::to('edit/student/'.$row -> id)}}"class="badge badge-info">Edit</a>
              <a href="{{ URL::to('delete/student/'.$row -> id)}}"class="badge badge-danger delete-confirm" id="delete">Delete</a>
              <a href="{{ URL::to('view/student/'.$row -> id)}}"class="badge badge-success">View</a>
            </td>
          </tr>

        @endforeach
         

       </table>
        
   
        
      </div>
    </div>
        </div>
@endsection

