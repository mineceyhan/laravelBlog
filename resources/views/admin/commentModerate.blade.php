@extends('admin.layouts.main')
@section('title' , 'Yorum Denetle')
@section('content')

<div class="row">
@foreach($comments as $comment)
  <div class="col-sm-8">
    <div class="card">
    <div class="card-header">
    {{$comment->blog->title}}
    </div>
      <div class="card-body">
        <p class="card-text">{{$comment->content}}</p>
      </div>
      <footer class="blockquote-footer"> <cite title="Source Title">{{$comment->user->name}} {{$comment->user->surname}}</cite>
    </footer>
    <footer class="blockquote-footer"> <cite title="Source Title">{{$comment->created_at}}</cite>
    </footer>
     
     <div class="card-body">
    @if($comment->is_suitable == '0')
        <a href="{{ url('admin/updateComment')}}/{{$comment->id}}" class="btn btn-sm btn-primary">Yayınla</a>
        @elseif($comment->is_suitable == '1')
        <a href="{{ url('admin/updateComment')}}/{{$comment->id}}" class="btn btn-sm btn-primary">Yayından Kaldır</a>
        @endif
        <a href="{{ url('admin/destroyComment')}}/{{$comment->id}}" class="btn btn-sm  btn-primary">Sil</a>
    </div>

  </div> </div>
  @endforeach
</div>
@endsection

        