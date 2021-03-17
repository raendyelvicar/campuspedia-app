@extends('layouts.app')

@section('content')
    <section class="news-feeds">
       <div class="container">
           <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">

                        @foreach ($data as $news)
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="#" title="">
                                            <img src="{{asset($news->thumbnailURL)}}" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="#" title="">{{$news->title}}</a></h4>
                                    <p class="limit-char-text">{{$news->content}}</p>
                                    <small class="firstsmall"><a class="bg-orange" href="#" title="">{{$news->category}}</a></small>
                                    <small><a href="#" title="">{{$news->created_at}}</a></small>
                                    <small><a href="#" title="">by {{$news->author}}</a></small>
                                    <small class="meta_icon">
                                        <a href="" data-toggle="modal" id="delete-news" data-target="#delete-form" data-id="{{$news->id}}"><i class="fa fa-trash-o" style="" aria-hidden="true"></i></a>
                                    </small>
                                    <small class="meta_icon">
                                        <a href="" data-toggle="modal" id="edit-news" data-target="#update-form" data-id="{{$news->id}}"><i class="fa fa-pencil" style="" aria-hidden="true"></i></a>
                                    </small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                        @endforeach
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->
           </div>
           </div>
       </div>
    </section>

    @include('update_modal')
    @include('delete_modal')

@endsection

@push('ajax_crud')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/js/ajax.js"></script>
@endpush
