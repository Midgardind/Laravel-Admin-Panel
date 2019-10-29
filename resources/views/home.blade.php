@extends('layouts.app')

@section('content')
<div class="portfolio fill">
    <div class="container mb-5 mt-5">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8 offset-md-2">
                @foreach($posts as $post)
                    <div class="mb-3">
                        <h2 class="">{{$post->title}}</h2>
                        <h6>Published: {{date('M j, Y', strtotime($post->created_at))}}</h6>
                        <p class="">{{substr(strip_tags($post->body), 0, 200)}}{{strlen(strip_tags($post->body)) > 50 ? '...' : ''}}</p>
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
        </div>  
    </div>
</div>
@endsection
