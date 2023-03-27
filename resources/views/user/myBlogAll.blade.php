@extends('user.layouts.main')
@section('title' , 'Bloglarım')
@section('content')
<div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th> </th>
                                            <th>Blog Başlığı</th>
                                            <th>Kategori</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>Güncelleme Tarihi</th>
                                            <th>İşlemler</th>
                                    </thea
                              
                                    <tbody>
                                        @foreach($blogs  as $blog)
                                        <tr>
                                            <td><img src="{{$blog->image}}" alt="" width="40"height="50"></td>
                                            <td>{{$blog->title}}</td>
                                            <td>{{$blog->category->name}}</td>
                                            <td>{{$blog->created_at}}</td>
                                            <td>{{$blog->updated_at}}</td>
                                            <td>
                                                <a href="{{ url('user/blogs')}}/{{$blog->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{ url('user/updateBlogPage')}}/{{$blog->id}}" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a>
                                                <a href="{{ url('user/destroy')}}/{{$blog->id}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
