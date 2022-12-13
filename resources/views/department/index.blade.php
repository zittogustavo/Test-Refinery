@extends('department.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DEPARTMENT PAGE</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departments.create') }}"> Create New Department</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Depends on</th>
            <th>Departments Behind</th>
            <th>Empleoyees</th>
        </tr>
        @foreach ($departments as $department)
        <tr>
            <td>{{ $department->id }}</td>
            <td>{{ $department->name }}</td>
            <td>{{ $department->parent?->name }}</td>
            <td>
                @foreach ($department->children as $child)
                    {{ $child->name }} , 
                @endforeach
            </td>
            <td>
                @foreach ($department->user as $user)
                    {{ $user->name }} , 
                @endforeach
            </td>
            <td>
                <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('departments.show',$department->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection