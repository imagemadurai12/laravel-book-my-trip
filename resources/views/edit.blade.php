@extends('/layouts/master')
@section('content')


<div class="grid1440" id="section-margin">
    <h1>Edit a Blog</h1>

    <form method="POST" action="/blogs/{{$blog->id}}">
        @CSRF
        @method('PATCH')
        <div class="input-controller title-section">
            <label for="title">Blog Title</label>
            <input type="text" name="title" id="title" placeholder="Enter Blog Title" required value="{{$blog->title}}">
        </div>

        <div class="input-controller image-section">
            <label for="image">Blog Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="input-controller description-section">
            <label for="description">Blog Description</label>
            <textarea name="description" id="description" required placeholder="Enter Blog Description">{{$blog->description}}</textarea>
        </div>

        <div class="submit-btn-section">
            <input type="submit" value="Submit" name="submit"
                class="btn-primary">
        </div>

    </form>

</div>


@endsection