@extends('layouts.app')

@section('content')
<div class="portfolio fill">
    <div class="hero2 jumbotron jumbotron-fluid text-center align-middle" style="background-image:url('{{ asset('images/BG2.png') }}');">
        <div class="herooverlay2">
            <div class="container text-center hero-text2">
                <h1 class="display-3">Blog</h1>
            </div>
        </div>
    </div>
    <div class="container mb-5 mt-5">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-9">
                @foreach($posts as $post)
                    <div class="mb-3">
                        <h2 class="">{{$post->title}}</h2>
                        <h6>Published: {{date('M j, Y', strtotime($post->created_at))}}</h6>
                        <p class="">{{substr($post->body, 0, 200)}}{{strlen($post->body) > 50 ? '...' : ''}}</p>
                        <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary btn-sm">Read More</a>
                        <hr>
                    </div>
                @endforeach
                <div class="row mx-auto">
                    <div class="col-md-12 mx-auto">
                        {!!$posts->links()!!}
                    </div>
                </div>
            </div>
            <div class="col-md-2 offset-md-1">
                <h2>Sidebar</h2>
            </div>
        </div>  
    </div>
</div>
@endsection
