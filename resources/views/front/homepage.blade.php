@extends('front.layouts.main')       
@section('content')
            <div class="row tm-row">
            @foreach($blogs as $blog)
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="{{ url('/blog')}}/{{$blog->id}}" class="effect-lily tm-post-link tm-pt-20">
                        <div class="tm-post-link-inner">
                            <img src="../{{$blog->image}}" alt="Image" class="img-fluid">
                        </div>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">
                        {{$blog->title}}
                       </h2>
                    </a>                    
                    <p class="tm-pt-30"> {{str_limit($blog->content , 70)}}</p>
                    <div class="d-flex justify-content-between tm-pt-45">
                     <span> {{$blog->created_at}}</span>
                        <span class="tm-color-primary">  {{$blog->category->name}}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                 
      <span class="tm-color-primary">  {{$blog->comment_count}} Yorum</span>
                        <span> {{$blog->user->name}} {{$blog->user->surname}}</span>
                    </div>
                </article>
                @endforeach
            </div>
            {{ $blogs->links() }}          
@endsection