@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')

@section('title')
    <title>Blog</title>
@endsection

@section('content') 
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Search . . .  ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="recent-post">
                            <h4>Latest Blog</h4>
                            <div class="recent-blog">
                                @foreach ($blogs as $blog )
                                    <a href="{{route('blog.detail',['blogId' => $blog->id])}}" class="rb-item">
                                        <div class="rb-pic">
                                            <img src="{{$baseUrl.$blog->feature_image_path}}" alt="">
                                        </div>
                                        <div class="rb-text">
                                            <h6>{{$blog->name}}</h6>
                                            <p>Blog <span>{{$blog->created_at}}</span></p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        @foreach ($blogs as $blog )
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="{{$baseUrl.$blog->feature_image_path}}" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="{{route('blog.detail',['blogId' => $blog->id])}}">
                                        <h4>{{$blog->name}}</h4>
                                    </a>
                                    <p>Blog <span>{{$blog->created_at}}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
