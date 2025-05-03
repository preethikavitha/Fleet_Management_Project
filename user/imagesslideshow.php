<?php 

include('dbcon.php');
//SQL query
$numplate=$_POST['num_plate_id'];
$sql = "SELECT * FROM images where num_plate_id='$numplate'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

           while($row = $result->fetch_assoc()) {
              $fullImage = $row['full_image'];
              $frontImage = $row['front_image'];
              $rearImage = $row['rear_image'];
          
              echo "<div class='content section' style='max-width:500px'>";
              
              if (!empty($fullImage)) {
                  echo "<img class='slides' src='$fullImage' style='width:100%' alt='Full Image'>";
              }
          
              if (!empty($frontImage)) {
                  echo "<img class='slides' src='$frontImage' style='width:100%' alt='Front Image'>";
              }
          
              if (!empty($rearImage)) {
                  echo "<img class='slides' src='$rearImage' style='width:100%' alt='Rear Image'>";
              }
          
              echo "    </div>";
          }
          
    
    
    
    
            }
 else {
    echo "Empty Gallery";
}
?>

<html>
<body>
<script>
var index = 0;
slideshow();
function plusSlides(x) {
        showSlides(slideIndex += x);
    }
function slideshow() {
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  index++;
  if (index > x.length) {index = 1} 
  
  x[index-1].style.display = "block";  
  setTimeout(slideshow, 3000); // Change slides every 3 seconds
}






 


</script>
</body>
</html>
