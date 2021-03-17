<meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Update Modal -->
  <div class="modal fade" id="update-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-success d-none" id="update_msg_div">
                <span id="update_res_message"></span>
           </div>
            <form id="update-contact">
                @csrf
                <div class="form-group row">
                    <div class="col">
                        <label for="FirstNameInputLabel">First Name</label>
                        <input type="text" class="form-control" name="edit_firstname" id="edit_firstname">
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                    </div>
                    <div class="col">
                    <label for="LastNameInputLabel">Last Name</label>
                    <input type="text" class="form-control" name="edit_lastname" id="edit_lastname">
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="EmailInputLabel">Email</label>
                    <input type="text" class="form-control"  name="edit_email" id="edit_email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                    <label for="PasswordInputLabel">Phone Number</label>
                    <input class="form-control" type="text" name="edit_phone_number" id="edit_phone_number">
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                </div>
               <div class="form-group">
                   <button type="submit" class="cust-btn cust-btn-primary" id="update-contact-btn"> Submit </button>
               </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
