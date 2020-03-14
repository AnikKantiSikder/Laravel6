@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.category')}}" class="btn btn-primary">Add category</a>  
      <a href="{{route('all.category')}}" class="btn btn-success">All category</a>
      
       <h2>Edit category</h2>
       <hr/>
        <form action="{{ url('update/category/'.$edit->id) }}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category name</label>
              <input type="text" class="form-control" value="{{ $edit->name }}" name="categoryname">
              
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="text" class="form-control" value="{{ $edit->slug }}" name="slugname">
              
            </div>
          </div>
         
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection