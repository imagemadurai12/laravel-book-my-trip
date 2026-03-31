@extends('/layouts/master')

@section('content')
   	<div class="grid1440" id="section-margin">
        <h1>Blogs Page</h1>

        @foreach($blogs as $blog)

        <a href="/blogs/{{$blog->id}}" class="blogs-card">
            <div class="blog-image-container">
                <img src="/images/mountain.jpeg" alt="">
            </div>
            <div class="blog-content-container">
                <h1>{{$blog->title}}</h1>
                <p>{{$blog->description}}</p>
            </div>
        </a>

        @endforeach

        <a href="/blogs/create" class="btn-primary">Create a New Blog</a>
    </div>
@endsection
  