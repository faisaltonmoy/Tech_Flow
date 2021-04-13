<?php
require('fpdf17/fpdf.php');

require('connect.php');
$row = mysqli_query($con, "select id from order_user_info order by id desc limit 1");
$res = mysqli_fetch_assoc($row);
$id = $res['id'];

$query = mysqli_query($con, "SELECT DISTINCT(order_user_info.id),order_user_info.name,order_user_info.address,order_user_info.city,
order_user_info.state,order_user_info.zip, 
order_details.time FROM order_user_info 
INNER JOIN order_details ON order_details.order_id=order_user_info.id 
where order_user_info.id = '$id' ");

$invoice = mysqli_fetch_array($query);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial', 'B', 14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130, 5, 'TECH FLOW', 0, 0);
$pdf->Cell(59, 5, 'INVOICE', 0, 1); //end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, '[Street Address]', 0, 0);
$pdf->Cell(59, 5, '', 0, 1); //end of line

$pdf->Cell(130, 5, '[City, ZIP]', 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, $invoice['time'], 0, 1); //end of line

$inv_no = 1000 + $invoice['id'];

$pdf->Cell(130, 5, ' ', 0, 0);
$pdf->Cell(30, 5, 'Invoice No #', 0, 0);
$pdf->Cell(34, 5, $inv_no, 0, 1); //end of line

$pdf->Cell(130, 5, ' ', 0, 0);
$pdf->Cell(35, 5, 'Customer ID', 0, 0);
$pdf->Cell(34, 5, $invoice['id'], 0, 1); //end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1); //end of line

//billing address
$pdf->Cell(100, 5, 'Bill to', 0, 1); //end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $invoice['name'], 0, 1);


$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(15, 5, $invoice['address'], 0, 1);



$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(15, 5, $invoice['city'], 0, 1);



$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(15, 5, $invoice['state'], 0, 0);
$pdf->Cell(15, 5, $invoice['zip'], 0, 0);




//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1); //end of line

//invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(120, 5, 'Description', 1, 0);
$pdf->Cell(35, 5, 'Quantity', 1, 0);
$pdf->Cell(34, 5, 'Amount', 1, 1); //end of line

$pdf->SetFont('Arial', '', 12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con, "select DISTINCT(order_details.product_id),product.name,order_details.qty,order_details.price FROM order_details
inner join product on order_details.product_id=product.id where order_details.order_id = '$id'");
//$tax=0;
$amount = 0;
while ($item = mysqli_fetch_array($query)) {
	$pdf->Cell(130, 5, $item['name'], 1, 0);
	$pdf->Cell(25, 5, number_format($item['qty']), 1, 0);
	$pdf->Cell(34, 5, number_format($item['price']), 1, 1, 'R'); //end of line
	$s_amount = $item['qty'] * $item['price'];
	$amount += $s_amount;
}
$delivery = 100;

if (isset($_SESSION['name'])) {
	$pdf->Cell(120, 5, '', 0, 0);
	$pdf->Cell(35, 5, 'Discount Price', 0, 0);
	$pdf->Cell(4, 5, '$', 1, 0);
	$pdf->Cell(30, 5, number_format($amount=$amount-($amount*.02)), 1, 1, 'R'); //end of line
}

$pdf->Cell(120, 5, '', 0, 0);
$pdf->Cell(35, 5, 'Delivery Charge', 0, 0);
$pdf->Cell(4, 5, '$', 1, 0);
$pdf->Cell(30, 5, number_format($delivery), 1, 1, 'R'); //end of line

//summary
$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Subtotal', 0, 0);
$pdf->Cell(4, 5, '$', 1, 0);
$pdf->Cell(30, 5, number_format($amount + $delivery), 1, 1, 'R'); //end of line

$pdf->Output();
