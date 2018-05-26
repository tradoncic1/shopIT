

<div class="row">
  <div class="col-md-5 about-left">
    <!--<p>Lorem <label>ipsum</label> dol <span>-sitamet</span></p>-->
    <p>Welcome!</p>
    <p>Please<label>Log In</label></p>
  </div>
  <div class="col-md-7 about-right">
    <form id="login-form" method="post">
        <input type="email" name="email">
        <p><label>Email:</label></p><br>
        <br>
        <input type="password" name="password" required>
        <p><label>Password:</label></p><br>
        <br>
        <input type="submit" value="log in" name="login">
      </form>
      <br><br>
      <h4>Don't have an account? Click <a href="#signup">here</a></h4>
  </div>
</div>
<div class="clearfix"> </div>


<script>
    $("#login-form").validate({
      rules: {
        firstname: {
          minlength: 2,
          maxlength: 10
        },
        lastname: {
          minlength: 2,
          maxlength: 20
        },
        password: {
          minlength: 5,
          maxlength: 18
        }
      },
      messages: {
        firstname: {
          required: "First name required",
          minlength: "First name too short",
          maxlength: "First name too long"
        }
        lastname: {
          required: "Last name required",
          minlength: "Last name too short",
          maxlength: "Last name too long"
        }
      },
      submitHandler: function(form) {
        if (confirm('Are you sure?')){
          console.log(form);
          form.submit();
        }
      }
    });
  </script>
