{{--@if(count($errors)>0)

    <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach()
    </ul>

@endif--}}



<h2>Add new post</h2>

<form class="" action="/blog" method="post">
    <input type="text" name="title" value="" placeholder="This is title"><br>

    {{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>

    <textarea name="description" id="" cols="20" rows="5"></textarea><br>

    {{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="submit" name="name" value="post">
</form>




















