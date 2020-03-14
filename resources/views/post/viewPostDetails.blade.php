@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('all.post')}}" class="btn btn-primary">See all post</a>
       
      <div>
      @foreach($post as $row)
              <p><b>Category name: </b> {{ $row->name }}</p>
              <p><b>Post title: </b> {{ $row->title }}</p>

              <img src="{{URL::to($row->image)}}" style="height: 300px; width:600px;">
              <p><b>Post details: </b><br/>
              {{ $row->details }}
              </p>
         
      </div> 
      @endforeach
      </div>
    </div>
  </div>

@endsection