@extends('front.layouts.main')
@section('title' , 'BLOG')
@section('content')
@include('front.widgets.categoryWidget')
                <div class="col-md-9 col-lg-8 col-xl-7">
                    @foreach($blogs as $blog)
                        <!-- Post preview-->
                        <div class="post-preview">
                        <a href="{{ url('/blog')}}/{{$blog->id}}">
                                <img src="{{$blog->photo_link}}" width="300" height="250" />
                                <h2 class="post-title">{{$blog->title}}</h2>
                                <h3 class="post-subtitle">{{str_limit($blog->content , 70)}}</h3>
                            </a>
                            <p class="post-meta">
                                <a href="#!">{{$blog->users->name}} {{$blog->users->surname}}</a>
                            </p>
                            {{$blog->created_at->diffForHumans()}}

                        </div>
                        
                        @if(!$loop->last)
                         <hr class="my-4" />
                        @endif
                    @endforeach
                </div>

                @endsection
      