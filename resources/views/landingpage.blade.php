<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Campuspedia Internship Program</title>
   <!-- Design fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/colors.css') }}">

    <script src="https://kit.fontawesome.com/0f2732326e.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container-fluid" style="margin-bottom:100px; margin-top:30px;">
        <div class="row justify-content-center" style="margin-bottom:20px">
            <h2>
                Campuspedia News
            </h2>
        </div>
        <div class="row justify-content-center" style="margin:auto;">
            <div class="col-lg-6">
                {{-- <div class="alert alert-warning alert-dismissible fade" id="alert" role="alert">
                    Your content has been succesfully submitted.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div> --}}

                <form id="news-form" method="POST" action="/news" enctype="multipart/form-data">
                    {{  csrf_field()  }}

                    <div class="form-group row">
                        <div class="col">
                            <label for="LastNameInputLabel">Category</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                        <div class="col">
                        <label for="PositionInputLabel">Author</label>
                        <input type="text" class="form-control" name="author" id="author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FirstNameInputLabel">Title</label>
                        <input type="text" class="form-control"  name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="BioInputLabel">Content</label>
                        <textarea class="form-control" name="content" id="content" style="resize:none; height:210px"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Thumbnail Image</label>
                        <input class="form-control" type="file" name="file">
                    </div>

                    <button type="submit" class="cust-btn cust-btn-primary" id="form-submit-btn"> Submit </button>
                </form>
            </div>
        </div>
    </div>

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
                                        <a href="" data-toggle="modal" id="{{$news->id}}" data-target="#delete-form"><i class="fa fa-trash-o" style="" aria-hidden="true"></i></a>
                                    </small>
                                    <small class="meta_icon">
                                        <a href="" data-toggle="modal" id="{{$news->id}}" data-target="#update-form"><i class="fa fa-pencil" style="" aria-hidden="true"></i></a>
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

  <!-- Update Modal -->
  <div class="modal fade" id="update-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update News</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="news-form" method="POST" action="/news/update" enctype="multipart/form-data">
                {{  csrf_field()  }}
                <div class="form-group">
                    <label for="formFile" class="form-label">Thumbnail</label>
                    <input class="form-control" type="file" name="file">
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="LastNameInputLabel">Category</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                    <div class="col">
                    <label for="PositionInputLabel">Author</label>
                    <input type="text" class="form-control" name="author" id="author">
                    </div>
                </div>
                <div class="form-group">
                    <label for="FirstNameInputLabel">Title</label>
                    <input type="text" class="form-control"  name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="BioInputLabel">Content</label>
                    <textarea class="form-control" name="content" id="content" row="12"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Delete Modal -->
  <div class="modal fade" id="delete-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete News</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Apakah anda yakin ingin menghapusnya?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-primary" href="" >Yes</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Core JavaScript
    ================================================== -->

    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/tether.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
    </script>
</body>
</html>
