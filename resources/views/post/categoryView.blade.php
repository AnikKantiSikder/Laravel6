@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.category')}}" class="btn btn-primary">Add category</a>  
      <a href="{{route('all.category')}}" class="btn btn-success">All category</a>
      <hr/>
       
      <div>
          <ol>
              <li>Category name: {{$cat->name}}</li>
              <li>Category slug: {{$cat->slug}}</li>
              <li>Created at: {{$cat->created_at}}</li>
          </ol>
      </div> 

      </div>
    </div>
  </div>

@endsection