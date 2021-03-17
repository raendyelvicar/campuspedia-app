@include('layouts.app')

<div class="container-fluid" style="margin-bottom:100px;">
    <div class="row justify-content-center" style="margin-bottom:20px">
        <h2>
            Contact Us
        </h2>
    </div>
    <div class="row justify-content-center" style="margin:auto;">
        <div class="col-lg-6">
            <form id="contact-form">
                @csrf
                <div class="alert alert-success d-none" id="msg_div">
                    <span id="res_message"></span>
               </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="FirstNameInputLabel">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname">
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                    </div>
                    <div class="col">
                    <label for="LastNameInputLabel">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname">
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="EmailInputLabel">Email</label>
                    <input type="text" class="form-control"  name="email" id="email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                    <label for="PasswordInputLabel">Phone Number</label>
                    <input class="form-control" type="text" name="phone_number" id="phone_number">
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                </div>
               <div class="form-group">
                   <button type="submit" class="cust-btn cust-btn-primary" id="add-contact-btn"> Submit </button>
               </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center" style="padding-top: 50px">
        <div class="col-lg-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $person)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$person->firstname}}</td>
                        <td>{{$person->lastname}}</td>
                        <td>{{$person->email}}</td>
                        <td>{{$person->phone_number}}</td>
                        <td>
                            <small class="meta_icon" style="margin: 12px">
                                <a href="" data-toggle="modal" id="delete-contact" data-target="#delete-form" data-id="{{$person->id}}"><i class="fa fa-trash-o" style="" aria-hidden="true"></i></a>
                            </small>
                            <small class="meta_icon" style="">
                                <a href="" data-toggle="modal" id="edit-contact" data-target="#update-form" data-id="{{$person->id}}"><i class="fa fa-pencil" style="" aria-hidden="true"></i></a>
                            </small>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@include('update_modal')
@include('delete_modal')

<script src="{{asset('js/ajax.js')}}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script>
    if ($("#contact-form").length > 0) {
        $("#contact-form").validate({
            rules: {
                firstname: {
                    required: true,
                    maxlength: 50,
                },
                lastname: {
                    required: true,
                    maxlength: 50,
                },
                phone_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 12,
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
            },
            submitHandler:function(form){
                $.ajax({
                    url: "/contact",
                    type: "POST",
                    data: $("#contact-form").serialize(),
                    success: function (response) {
                        $("#res_message").show();
                        $("#res_message").html(response.msg);
                        $("#msg_div").removeClass("d-none");
                        document.getElementById("contact-form").reset();
                        setTimeout(function () {
                            $("#res_message").hide();
                            $("#msg_div").hide();
                            location.reload();
                        }, 3000);
                    },
                })
            }
        })
    }
</script>

