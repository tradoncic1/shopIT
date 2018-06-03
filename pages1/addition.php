<div class="row">
  <div class="col-md-5 about-left">
    <!--<p>Lorem <label>ipsum</label> dol <span>-sitamet</span></p>-->

  </div>
  <div class="col-md-7 about-right">
    <!--<h3>Lorem ipsum dolor sit amet, consec</h3>
    <p>Donec bibendum massa metus, vel aliquet nunc varius eu. Curabitur nec scelerisque dui. Quisque mattis libero et enim ultricies gravida. Nulla ut commodo massa, eget tincidunt ligula. Vivamus eu ante tincidunt, fermentum risus nec, pharetra turpis.
      Donec rhoncus eros sed felis aliquet tincidunt. In consectetur tempor quam</p>
    <ul class="list-unstyled list-inline">
      <li>Sed vitae facilisis nisi, in finibus lacus. Duis vel nulla orci.</li>
      <li>fringilla, at ultrices felis dignissim. Integer ultricies posuere odio</li>
      <li>Sed vestibulum mattis laoreet. Donec sollicitudin justo luctus nulla consectetur</li>
      <li>Nam dolor tellus, dictum sit amet libero eu, semper placerat massa.</li>
      <li>consectetur tempor quam, aliquam dignissim diam hendrerit nec. Cras sodales at nisl</li>
    </ul>-->
    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
    <br>
    <form id="add_product" method="post">
        <input type="text" name="product_name" class=" col-md-3" required>
        <br><br>
        <p><label>Product Name:</label></p>
        <br>
        <br>
        
        <select class="form-control col-md-3" id="select_type" name="type">
          <option>PC</option>
          <option>Laptop</option>
          <option>Peripherals</option>
          <option>Photo/Video</option>
          <option>Tablets</option>
          <option>Consoles</option>
          <option>Software</option>
        </select>
        <br><br>
        <label for="select_type">Select list:</label>
        <br>
        <br>
        
        <br><input type="text" name="price" class=" col-md-3" required>
        <br><br>
        <p><label>Price:</label></p>
        
        
        <textarea class="form-control col-md-3" rows="5" id="comment" name="description"></textarea>
        <p><label>Description</label></p>
        <br><br>
        
        <br>
        <br>
        <br>
        <input type="submit" value="add product" name="addProduct">
      </form>
  </div>


</div>
<div class="clearfix"> </div>
