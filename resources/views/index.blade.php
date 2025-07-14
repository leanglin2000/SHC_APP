@extends('layout.app')


@section('title', 'Homepage Title')
@push('page-styles')
  <style>
    .post-item-image {
    height: 250px;
    }

    .post-item-content {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: 2;
    -webkit-box-orient: vertical;
    }
    .post-item-title {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    line-clamp: 1;
    -webkit-box-orient: ;
    -webkit-box-orient: vertical;
    }
   
  </style>
@endpush

@section('content')
  <div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
      @if ($posts->count())

      @foreach ($posts as $post)
      <div class="col-lg-6">
      <!-- Blog post-->
      <div class="card mb-4">
      <a href="{{route('article', ['id' => $post->id]) }}"><img class="card-img-top post-item-image"
      src="{{ $post->image }}" alt="..." /></a>
      <div class="card-body">
      <div class="small text-muted">{{$post->displayDate()}}</div>
      <h2 class="card-title h4 post-item-title">
      {{$post->title}}
      </h2>
      <p class="card-text​​ post-item-content">
      {{$post->content}}
      </p>
      <a class="btn btn-primary" href="{{route('article', ['id' => $post->id]) }}">Read more →</a>
      </div>
      </div>
      </div>

    @endforeach

    @else
      Not Post found...!
    @endif



    </div>

    {{$posts->links()}}
    </div>

    <!-- Side widgets-->
    <div class="col-lg-4">
    <!-- Search widget-->
    @include('components.search-form')
    <!-- Tags widget-->
    @include('components.tag')
    <!-- gallary widget-->
    @include('components.donate')
     @include('components.map')
    </div>
  </div>
@endsection