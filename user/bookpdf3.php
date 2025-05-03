<?php

require("fpdf/fpdf.php");
include("dbcon.php");

$sql="SELECT *FROM LOGIN";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $email= $row['email'];
   
}

$sql1 = "select * from booking"; // Corrected the email address
$result1 = $conn->query($sql1);
while ($row1 = $result1->fetch_assoc()) {
    
    $book_id = $row1['book_id'];
    $book_date = $row1['book_date'];
    $emailb=$row1['emailid'];
 
}
$sql2 = "select * from userdetail where emailId='$emailb'"; // Corrected the email address
$result2= $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$address = $row2['address'];
$name = $row2['name'];



$sql3 = "select * from day where bookid=$book_id"; // Corrected the email address
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$noofday=$row3['no_of_day'];
$totamt=$row3['dayamt'];
$drivercharge=$row3['driver_charge'];
  

$sql4="select num_plate_id,tot_amt from booking where book_id=$book_id";
$result4=$conn->query($sql4);
$row4=$result4->fetch_assoc();
$numplate=$row4['num_plate_id'];
$total=$row4['tot_amt'];

$sql5="select  rent_price_per_day,charges from rent_price where num_plate_id='$numplate'";
$result5=$conn->query($sql5);
$row5=$result5->fetch_assoc();
$perday=$row5['rent_price_per_day'];
$charges=$row5['charges'];



 // Create a function for converting the amount in words
 function AmountInWords(int $amount)
 {
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
      3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
      7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
      10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
      13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
      16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
      19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
      40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
      70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
     $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
     while( $x < $count_length ) {
       $get_divider = ($x == 2) ? 10 : 100;
       $amount = floor($num % $get_divider);
       $num = floor($num / $get_divider);
       $x += $get_divider == 10 ? 1 : 2;
       if ($amount) {
        $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
        $amt_hundred = ($counter == 1 && $string[0]) ? 'and' : null;
        $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
        '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
        '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
         }
    else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
    " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
 }
 
 

  $amt_words=$total;
   // nummeric value in variable
  
  $get_amount= AmountInWords($amt_words);

  






class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, 'Fleet Management System', 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->SetTextColor(56, 94, 252);
        $this->Cell(50, 7, 'Contact us', 0, 1);
        $this->Cell(50, 7,"Fleetmanagement@gmail.com", 0, 1);
        $this->SetY(15);
        $this->SetX(-80);
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(50, 64, 25);
        $this->Cell(50, 10, "Payment Details", 0, 1);
        $this->Line(0, 48, 210, 48);
    }

    function Body($name,$address,$book_id,$book_date,$noofday,$perday,$totamt,$drivercharge,$charges,$total,$get_amount)
    {
        $this->SetY(55);
        $this->SetX(10);
        $this->SetTextColor(30, 124, 125);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, "Bill To:", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(80, 14, 200);
        $this->Cell(50, 7, "Name:  " . $name,0,1);
        $this->Cell(50, 7, "Address:  " . $address,0,1);
        $this->SetTextColor(8, 164, 280);
        $this->SetFont('Arial', '', 12);
        $this->SetY(63);
        $this->SetX(-70);
        $this->Cell(50,7,"Booking ID:".$book_id);
        $this->SetY(70);
        $this->SetX(-70);
        $this->Cell(50,7,"Booking Date:".$book_date);
        $this->SetY(95);
      $this->SetX(10);
      $this->SetTextColor(45, 164, 20);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"Category of charges",1,0,"C");
      $this->Cell(40,9,"No of Day",1,0,"C");
      $this->Cell(30,9,"Per Day",1,0,"C");
      $this->Cell(40,9,"Total",1,1,"C");
      $this->SetTextColor(98, 84, 20);
      $this->Cell(80,9,"Rent Price","LR",0,"C");
      $this->Cell(40,9,$noofday,"R",0,"C");
      $this->Cell(30,9,$perday,"R",0,"C");
      $this->Cell(40,9,$totamt,"R",1,"C");
      $this->Cell(80,9,"Driver Charge","LR",0,"C");
      $this->Cell(40,9,"-","R",0,"C");
      $this->Cell(30,9,"-","R",0,"C");
     $this->Cell(40,9,$drivercharge,"R",1,"C");
      $this->Cell(80,9,"Damage Cost","LR",0,"C");
      $this->Cell(40,9,"-","R",0,"C");
      $this->Cell(30,9,'-',"R",0,"C");
      $this->Cell(40,9,$charges,"R",1,"C");
      for($i=0;$i<9;$i++)
      {
      $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      $this->SetTextColor(45, 164, 20);
     $this->SetFont('Arial','B',12);
      $this->Cell(150,9,"TOTAL",1,0,"C");
      $this->Cell(40,9,$total,1,1,"C");
$this->SetY(225);
$this->SetX(10);
$this->SetTextColor(65, 14, 230);
$this->SetFont('Arial','B',12);
$this->Cell(0,9,"Amount_in words",0,1);
$this->SetFont('Arial','B',12);
$this->SetTextColor(80, 14, 200);
$this->Cell(0,9,"$get_amount",0,1);

}
function Footer(){
    $this->SetY(-50);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(15, 116, 210);
    $this->Cell(0,10,"Fleet management",0,1,"R");
    $this->Ln(15);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(21, 21, 20);
    $this->Cell(0,10,"Admin",0,1,"R");
    $this->Cell(0,10,"Authorized signature",0,1,"R");
    $this->SetFont('Arial','',10);
    $this->SetTextColor(5, 16, 100);
    $this->Cell(0,9,"This is generated invoice",0,1,"C");

    
}
}
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->Body($name,$address,$book_id,$book_date,$noofday,$perday,$totamt,$drivercharge,$charges,$total,$get_amount); // Call the Body function to output the user details
$pdf->Output();
?>
