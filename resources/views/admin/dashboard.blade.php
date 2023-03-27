@extends('admin.layouts.main')
@section('title' , 'Admin Yönetim Paneli')
@section('content')
       
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Kullanıcı Sayısı</th>
                    <th>Blog Sayısı</th>
                    <th>Kategori Sayısı</th>
                    <th>Yazar</th>
</thead>
            <tbody>
                <tr>
                    <td>{{$user_count}}</td>
                    <td>{{$blog_count}}</td>
                    <td>{{$category_count}}</td>
                    <td>asd</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

        