<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database="hotel";
// Create connection
$connection = mysqli_connect($servername,$username,$password,$database);

// $email=$_SESSION['user'];

if(isset($_POST['pdf'])){
$tid=$_POST['tid'];
}
$td=date('y-m-d');


$s="select * from tbl_transaction where tid='$tid'";
$sr=  mysqli_query($connection, $s);
$row1=  mysqli_fetch_array($sr);
$uid=$row1['cid'];

		$cid=$row1['rcid'];
		$amount=$row1['amount'];
//		$local=$row1['locality'];





	$queryp="select * from users where idUsers='$uid'";
	$queryp_ex=mysqli_query($connection,$queryp);
	$rowp=mysqli_fetch_array($queryp_ex);
	$fname=$rowp['fname'];
	$lname=$rowp['lname'];
	$add=$rowp['address'];
	$pincode=$rowp['pincode'];
	$cno=$rowp['contactno'];
	$email=$rowp['emailUsers'];
//	$sub_end=$r3['sub_end'];
//
	$query1="select * from tbl_roomcategory where cid='$cid'";
 		$query1_ex=mysqli_query($connection,$query1);
 		$c=mysqli_fetch_array($query1_ex);
                $rtype=$c['name'];
                // $mem_end=$c['mem_end_date'];


		// $query2="select * from tbl_package where pid='$pid'";
		// $query2_ex=mysqli_query($connection,$query2);
		// $row2=mysqli_fetch_array($query2_ex);

		// $pname=$row2['PackageName'];
//		$pamount=$row2['p_amount'];



// 		$query3="select * from tbl_subscription where sid='$sid'";
// 		$query3_ex=mysqli_query($connection,$query3);
// 		$r3=mysqli_fetch_array($query3_ex);

// 		$sub_start=$r3['sub_start'];
// 		$sub_end=$r3['sub_end'];

 require("pdf/fpdf.php");


$pdf=new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->Image('logo.png',140,30,50);


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'HARBORLIGHTS',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);


$pdf->Cell(59 ,5,'',0,1);//end of line


$pdf->Cell(25 ,5,'Date: ',0,0);
$pdf->Cell(34 ,5,date('d-m-y'),0,1);//end of line

$pdf->Cell(130 ,5,'Phone: 9825289955',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'Email: harborlightsofficial@gmail.com',0,0);



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to :',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$fname." ".$lname,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$add,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$pincode.".",0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$cno,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$email,0,1);




//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,"Membership : ",0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,10,"From : ".$mem_start,0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(100 ,10,"To : ".$mem_end,0,1);

$pdf->Cell(130 ,5,'Room Type',1,0);
$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,$rtype,1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,"Rs.".$amount,1,1,'R');//end of line


//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,"Rs.".$amount,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line


$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,"Rs.".$amount,1,1,'R');//end of line


$pdf->SetFont('Arial','B',7);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,90,'This is computer generated recipt.It does not need any signature and stamps.',0,0);
$pdf->output();     
?>