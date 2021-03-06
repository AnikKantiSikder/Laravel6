@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
     
      <div class="col-md-10">
      <a href="{{route('add.category')}}" class="btn btn-primary">Add category</a>  
      <a href="{{route('all.category')}}" class="btn btn-success">All category</a>
      <hr/>
       
      <table class="table table-responsive">
          <tr>
              <th>SL</th>
              <th>Category name</th>
              <th>Slug name</th>
              <th>Created at</th>
              <th>Action</th>
          </tr>

          @foreach($category as $row)
          <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->slug}}</td>
              <td>{{$row->created_at}}</td>
              <td>
                  <a href="{{ URL::to('edit/category/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                  <a href="{{ URL::to('delete/category/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                  <a href="{{ URL::to('view/category/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
              </td>
          </tr>
          @endforeach
      </table>
       
      </div>
    </div>
  </div>

@endsection