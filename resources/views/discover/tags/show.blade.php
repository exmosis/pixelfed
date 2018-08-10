@extends('layouts.app')

@section('content')

<div class="container">
  
  <div class="profile-header row my-5">
    <div class="col-12 col-md-3">
      <div class="profile-avatar">
        <img class="rounded-circle card" src="{{$posts->last()->thumb()}}" width="172px" height="172px">
      </div>
    </div>
    <div class="col-12 col-md-9 d-flex align-items-center">
      <div class="profile-details">
        <div class="username-bar pb-2  d-flex align-items-center">
          <span class="h1">{{$tag->name}}</span>
        </div>
        <p class="font-weight-bold">
          {{$tag->posts_count}} posts
        </p>
      </div>
    </div>
  </div>

  <div class="tag-timeline row">
    @foreach($posts as $status)
    <div class="col-12 col-md-4 mb-4">
      <a class="card" href="{{$status->url()}}">
        <img class="card-img-top" src="{{$status->thumb()}}" width="300px" height="300px">
      </a>
    </div>
    @endforeach
  </div>
  <div class="d-flex justify-content-center pagination-container mt-4">
    {{$posts->links()}}
  </div>
</div>

@endsection

@push('meta')
<meta property="og:description" content="Discover {{$tag->name}}">
@endpush

@push('scripts')
<script type="text/javascript">

  $(document).ready(function() {
    $('.pagination-container').hide();
    $('.pagination').hide();
    let elem = document.querySelector('.tag-timeline');
    let infScroll = new InfiniteScroll( elem, {
      path: '.pagination__next',
      append: '.tag-timeline',
      status: '.page-load-status',
      history: true,
    });
  });

</script>
@endpush
