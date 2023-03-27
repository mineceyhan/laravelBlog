@extends('user.layouts.main')
@section('title' , 'Kategorier')
@section('content')
<div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Blog Sayısı</th>
                                            <th>İşlemler</th>
                                    </thead>
                              
                                    <tbody>
                                        @foreach($categories  as $category)

                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->blogs_count}}</td>
                                            <td>
                                                <a href="{{ url('user/updateCategoryPage')}}/{{$category->id}}" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a>
                                                <a href="{{ url('user/delete')}}/{{$category->id}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <form>

</form>
                    </div>
 <div class="form-row">
    <form action="{{url('user/createCategory')}}" method="POST">
        @csrf
    <div class="col">
        <label for="N-newcategory">Kategori Ekle</label>
    <hr>
      <input type="text" class="form-control" name='category'id="N-newcategory"placeholder="Kategori İsmi">
    </div>
    <div class="col">
        <br>
    <button type="submit" class="btn btn-sm btn-primary">Ekle</button>
    </div>
    </form>
  </div>
@endsection
