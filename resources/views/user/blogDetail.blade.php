@extends('user.layouts.main')
@section('title' , 'Blog')
@section('content')
@foreach($blogs as $blog)
<div class="card" style="width: 75rem;">
  <img class="card-img-top"  src="../{{$blog->image}}" alt="Image" width="300"height="500">
  <div class="card-body">
    <h5 class="card-title">{{$blog->title}}</h5>
    <p class="card-text">{{$blog->content}}</p>
  </div>
  <h6 class="card-subtitle mb-2 text-muted">{{$blog->created_at}}</h6>

</div>
   <!-- Comments -->   
   @if($blog->comment)
<div class="card" style="width: 75rem;  margin: 20px 20px 20px 20px; padding: 20px 20px 20px 20px;" >
    <div>
        <h2 class="card-header">Yorumlar</h2>
        @foreach($blog->comment as $comment)
            <div class="card-title" style="width: 75rem;  margin: 20px 20px 20px 20px; padding: 20px 20px 20px 20px;">
                <p>{{$comment->content}}
                </p>
                <footer class="blockquote-footer"><cite title="Source Title">{{$comment->user->name}} {{$comment->user->surname}}</cite>
                <cite title="Source Title">{{$comment->updated_at}} </cite></footer>
            </div>  
            <hr>                              
    @endforeach
    @endif
    <form action="{{route('createComment',$blog->id)}}" method="POST" class="mb-5 tm-comment-form">
            @csrf
            <h2 class="card-header mb-4">Yorum Yap</h2>
            <h6 class=" mb-4"> <i> Yazar tarafından denetlenip yayına alınacaktır.</i></h6>
            @if($errors->any())
                <div class="alert  alert-danger" >
                    @foreach($errors->all() as $error)
                    <li> {{$error}}</li>
                    @endforeach
                </div>
            @endif
            <div class="mb-4">
                <textarea class="form-control" name="content" rows="6" placeholder="Yorum..."></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary tm-btn-medium">Gönder</button>                        
            </div>                                
        </form>    
</div>
@endforeach
@endsection