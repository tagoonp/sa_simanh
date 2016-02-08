<?php
session_start();
include ("../fpfd/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","",20);
$pdf->Write(10,"Hello World");
$html = "<html>
<body>
  <img src=\"../images/logo1.gif\";
</body>
</html>";
$pdf->Write(html,10);
$pdf->Output($_GET['id'].".pdf", "D");

?>
