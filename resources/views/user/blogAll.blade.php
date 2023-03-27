@extends('user.layouts.main')
@section('title' , 'Bloglar')
@section('content')
<div class="card shadow mb-4">
<nav class="navbar navbar-light bg-light">
  <form class="form-inline"  action="{{route('searchBlogOfCategory')}}" method="POST">
    @csrf
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Kategoriye Göre Ara..." aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i class="fas fa-search fa-sm"></i></button>
  </form>
</nav>
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> </th>
                                            <th>Blog Başlığı</th>
                                            <th>Kategori</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>Yazar</th>
                                            <th>İşlemler</th>
                                    </thea
                              
                                    <tbody>
                                        @foreach($blogs  as $blog)
                                        <tr>
                                            <td><img src="{{$blog->image}}" alt="" width="40"height="50"></td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->category->name}}</td>
                                            <td>{{$blog->created_at}}</td>
                                            <td>{{$blog->user->name}}</td>
                                            <td>
                                                <a href="{{ url('user/blogs')}}/{{$blog->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $blogs->links() }}    
@endsection
