@extends('/layouts/master')
@section('content')


<div class="grid1440" id="section-margin">
    <h1>Blog</h1>


    <div class="blogs-card">
        <div class="blog-image-container">
            <img src="/images/mountain.jpeg" alt="">
        </div>
        <div class="blog-content-container">
            <h1>{{$blog->title}}</h1>
            <p>{{$blog->description}}</p>
        </div>
    </div>

    <div class="button-container">
        <!-- Edit -->
        <form action="/blogs/{{$blog->id}}/edit">
            <input type="submit" value="Edit" class="btn-primary">
        </form>

        <!-- Delete -->
        <form action="/blogs/{{$blog->id}}" method="POST">
            @CSRF
            @method('DELETE')
            <input type="submit" value="Delete" class="btn-primary">
        </form>
    </div>



</div>

@endsection