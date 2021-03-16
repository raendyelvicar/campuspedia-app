@include('layouts.app')

<div class="container-fluid" style="margin-bottom:100px;">
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
