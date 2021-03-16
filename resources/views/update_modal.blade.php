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
            <form id="update-news" enctype="multipart/form-data">
                {{  csrf_field()  }}

                <div class="form-group">
                    <label for="formFile" class="form-label">Thumbnail</label>
                    <input class="form-control" type="file" name="imgURL" id="imgURL">
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" id="save-btn" >Save changes</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

