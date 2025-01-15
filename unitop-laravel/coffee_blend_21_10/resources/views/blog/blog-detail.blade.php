@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')

@section('title')
    <title>Blog</title>
@endsection

@section('content')
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $blog->name }}</h2>
                            <p>Blog <span>- {{ $blog->created_at }}</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="{{ $baseUrl . $blog->feature_image_path }}" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>{!! $blog->content !!}</p>
                        </div>
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>Travel</li>
                                    <li>Beauty</li>
                                    <li>Fashion</li>
                                </ul>
                            </div>
                            <div class="blog-share">
                                <span>Share:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post">
                            <div class="row">
                                @if ($previousBlog)
                                    <div class="col-lg-5 col-md-6">
                                        <a href="{{ route('blog.detail', ['blogId' => $previousBlog->id]) }}"
                                            class="prev-blog">
                                            <div class="pb-pic">
                                                <i class="ti-arrow-left"></i>
                                                <img src="{{ $baseUrl . $previousBlog->feature_image_path }}"
                                                    alt="">
                                            </div>
                                            <div class="pb-text">
                                                <span>Previous Blog:</span>
                                                <h5>{{ $previousBlog->name }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="col-lg-5 col-md-6">
                                    </div>
                                @endif
                                @if ($nextBlog)
                                    <div class="col-lg-5 offset-lg-2 col-md-6">
                                        <a href="{{ route('blog.detail', ['blogId' => $nextBlog->id]) }}" class="next-blog">
                                            <div class="nb-pic">
                                                <img src="{{ $baseUrl . $nextBlog->feature_image_path }}" alt="">
                                                <i class="ti-arrow-right"></i>
                                            </div>
                                            <div class="nb-text">
                                                <span>Next Blog:</span>
                                                <h5>{{ $nextBlog->name }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
