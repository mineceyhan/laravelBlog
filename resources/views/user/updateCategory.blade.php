@extends('user.layouts.main')
@section('title' , 'Kategori Güncelle')
@section('content')
<form action="{{url('user/updateCategory')}}/{{$category->id}}" method="POST">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Kategori İsmi</label>
    <textarea class="form-control" name="name" id="exampleFormControlTextarea1" rows="1">{{$category->name}}</textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-md btn-primary">Ekle</button>
</div>
</form>
@endsection

        