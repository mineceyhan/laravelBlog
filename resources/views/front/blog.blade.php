
@extends('front.layouts.main')
@section('title' , 'BLOG')
@section('content')
<div class="row tm-row">
@foreach($blogs  as $blog)
                <div class="col-12">
                <div class="tm-post-link-inner">
                            <img src="../{{$blog->image}}" alt="Image" class="img-fluid">
                        </div>
                </div>
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{$blog->title}}</h2>
                            <p class="tm-mb-40">{{$blog->user->name}} {{$blog->user->surname}}</p>
                            <p class="tm-mb-40">{{$blog->updated_at}}</p>
                            <p>{{$blog->content}}</p>
                        </div>
                        <!-- Comments -->
                        @if($blog->comment)
                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            <a class="small" href="{{url('registerPage')}}">Yarum yapmak için Hesap Oluştur!</a>

                            <hr class="tm-hr-primary tm-mb-45">
                           
                            @foreach($blog->comment as $comment)
                        <div class="tm-comment tm-mb-45">
                            <figure class="tm-comment-figure">
                                <figcaption class="tm-color-primary">{{$comment->user->name}} {{$comment->user->surname}}</figcaption>
                            </figure>
                            <div>
                                <p>{{$comment->content}}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <span class="tm-color-primary">{{$comment->updated_at}} </span>
                                </div>                                                 
                            </div>                                
                        </div>
                             @endforeach
                        @endif
                                             
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
@endsection