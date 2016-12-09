<h2>edit article post</h2>

<form class="" action="/blog/{{ $blog->id }}" method="post">
    <input type="text" name="title" value="{{ $blog->title }}" placeholder="This is title"><br>

    {{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>

    <textarea name="description" id="" cols="20" rows="5" placeholder="this is the desciption">{{ $blog->description }}</textarea><br>

    {{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>

    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="edit">
</form>

