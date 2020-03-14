@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.category')}}" class="btn btn-primary">Add category</a>  
      <a href="{{route('all.category')}}" class="btn btn-success">All category</a>
      <hr/>
       

        <form action="{{ route('store.category') }}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category name</label>
              <input type="text" class="form-control" placeholder="Category name" name="categoryname">
              
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug name</label>
              <input type="text" class="form-control" placeholder="Slug name" name="slugname">
              
            </div>
          </div>
         
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection