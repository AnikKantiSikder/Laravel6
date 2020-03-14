
@extends('welcome')

@section('content')

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-10">

  @foreach($post as $row)
    <div class="post-preview">
      <a href="post.html">
        <h2 class="post-title">
          {{$row->title}}
        </h2>
       <img src="{{URL::to($row->image)}}" style="height: 300px; width: 700px;">
      </a>

      <p class="post-meta">Category:
        <a href="#">{{$row->name}}</a>
        on slug {{$row->slug}}
      </p>
    </div>
    @endforeach

    {{ $post->links() }}

    
  </div>
</div>

@endsection