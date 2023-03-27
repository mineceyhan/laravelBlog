@extends('user.layouts.main')
@section('title' , 'Blog Güncelle')
@section('content')
<form method="POST"   action="{{url('user/updateBlog')}}/{{$blog->id}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Blog Başlığı</label>
        <textarea class="form-control" name="title" id="exampleFormControlTextarea1" rows="1">{{$blog->title}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Kategori</label>
        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <img src="{{$blog->image}}" alt="">
        <label for="exampleFormControlFile1">Fotograf</label>
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Blog içeriği</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="10">{{$blog->content}}</textarea>
    </div>
    @if($errors->any())
        <div class="alert  alert-danger" >
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
        </div>
        @endif
    <div class="form-group">
    <button type="submit" class="btn btn-md btn-primary">Güncelle</button>
    </div>
</form>
<hr>

@endsection

        



        