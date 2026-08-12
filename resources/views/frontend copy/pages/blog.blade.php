@extends('frontend.layouts.master')
@section('title','E-Paninting || Blog Page')
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Blog Grid Sidebar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section class="blog-sec padding-bottom">
        <div class="container">
            <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4">
                    <div class="blog-area">
                        <h4 class="mb-3">{{$post->title}}</h4>
                        <p class="mb-4">{!! html_entity_decode($post->summary) !!}</p>
                        <span class="mb-4">Posted by {{$post->author_info->name ?? 'Anonymous'}}<br>{{$post->created_at->format('d M, Y. D')}}</span>
                    <a href="{{route('blog.detail',$post->slug)}}">
                            <img src="{{$post->photo}}" class="img-fluid">
                        </a>
                        <div class="blog-more">
                            <ul class="blog-share"> 
                                <li><a href="#"><img src="images/instra-i.png" class="img-fluid"></a></li>
                                <li><a href="#"><img src="images/whatsapp.png" class="img-fluid"></a></li>
                                <li><a href="#"><img src="images/facebook-i.png" class="img-fluid"></a></li>
                                <li><a href="#"><img src="images/twi-i.png" class="img-fluid"></a></li>
                                <li><a href="#"><img src="images/in-i.png" class="img-fluid"></a></li>                         
                            </ul>
                            <a href="{{route('blog.detail',$post->slug)}}" class="theme-btn2">
                                <span> <i class="fas fa-angle-right"></i></span>
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                   
            @endforeach

                <div class="col-lg-12">
                    <ul class="pagination mt-3">
                        <li><a href=""><i class="fas fa-angle-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="" class="active">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">6</a></li>
                        <li><a href="">7</a></li>
                        <li><a href="">8</a></li>
                        <li><a href="">9</a></li>
                        <li><a href="">10</a></li>
                        <li><a href=""><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush
