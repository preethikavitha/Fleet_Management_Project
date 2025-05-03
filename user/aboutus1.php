<?php
include("dbcon.php");
$sql1 = "SELECT COUNT(num_plate_id) AS totvehicle FROM vehicle";
$result1 = $conn->query($sql1);
if ($result1) {
    $row1 = $result1->fetch_assoc();
    $totalCount = $row1['totvehicle'];
} else {
    echo "Error executing query: " . $conn->error;
}
$sql2 = "SELECT COUNT(emailId) AS totcustomer FROM userdetail";
$result2 = $conn->query($sql2);
if ($result2) {
    $row2 = $result2->fetch_assoc();
    $totalCount2 = $row2['totcustomer'];
} else {
    echo "Error executing query: " . $conn->error;
}
$sql3 = "SELECT COUNT(book_id) AS totbooking FROM booking";
$result3 = $conn->query($sql3);
if ($result3) {
    $row3 = $result3->fetch_assoc();
    $totalCount3 = $row3['totbooking'];
} else {
    echo "Error executing query: " . $conn->error;
}
$sql4 = "SELECT COUNT(empid) AS totemployee FROM driver";
$result4 = $conn->query($sql4);
if ($result4) {
    $row4 = $result4->fetch_assoc();
    $totalCount4 = $row4['totemployee'];
} else {
    echo "Error executing query: " . $conn->error;
}
?>

<section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
              <span class="subheading">About us</span>
            <h2 class="mb-4">Welcome to Vehicle Rent</h2>

            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicles</a></p>
          </div>
                </div>
            </div>
        </div>
    </section>

    

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Blog</span>
        <h2>Recent Blog</h2>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
          </a>
          <div class="text pt-4">
              <div class="meta mb-3">
              <div><a href="#">Oct. 29, 2019</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
            <p><a href="#" class="btn btn-primary">Read more</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
          <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
          </a>
          <div class="text pt-4">
              <div class="meta mb-3">
              <div><a href="#">Oct. 29, 2019</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
            <p><a href="#" class="btn btn-primary">Read more</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry">
          <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
          </a>
          <div class="text pt-4">
              <div class="meta mb-3">
              <div><a href="#">Oct. 29, 2019</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
            <p><a href="#" class="btn btn-primary">Read more</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>	

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
        <div class="overlay bg-light"></div>
    <div class="container">
        <div class="row">
        
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="<?php echo $totalCount; ?>">0</strong>
            <span>Total <br>Vehicles</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="<?php echo $totalCount2; ?>">0</strong>
            <span>Happy <br>Customers</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="<?php echo $totalCount3; ?>">0</strong>
            <span>Total <br>Booking</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="<?php echo $totalCount4; ?>">0</strong>
            <span>Total <br>Employees</span>
          </div>
        </div>
      </div>
    
    </div>
    </div>
</section>	
