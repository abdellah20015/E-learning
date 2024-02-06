<?php
require_once('tcpdf/tcpdf.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$module = $_POST['module'];
$note = $_POST['note'];
$date = date('d/m/Y');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Votre Nom');
$pdf->SetTitle('Certificat de compétence');
$pdf->SetSubject('Certificat de compétence');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();



// Afficher l'email, l'adresse et le téléphone
$email = 'abdellah.agnaou@um5r.ac.ma';
$adresse = 'Faculté des sciences Rabat';
$telephone = '+212 6 37 45 10 36';
$html = "<p style='font-size: 10pt;'>Email : $email<br>Adresse : $adresse<br>Téléphone : $telephone</p>";
$pdf->writeHTMLCell(180, 10, '', '', $html, 0, 1, 0, true, 'C', true);

// Changer la police
$pdf->SetFont('helvetica', '', 14);

$html = <<<EOD
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="pdf.png" type="image/png">
</head>
<body>
<style>
  h4 {
    text-align: center;
  }
</style>
<h4 style="color: red; border-bottom: 1px solid #007BFF;">E-learning</h4><br>
<h1 style="color: #007BFF; border-bottom: 1px solid #007BFF;">Résultat</h1>
<p style="font-size: 14pt;">Félicitations ! <strong>$nom $prenom</strong> a réussi l'examen de programmation avec une note de <strong>$note%</strong>.</p>
<p style="font-size: 14pt;">Module : <strong>$module</strong></p>
<p style="font-size: 14pt;">Date : <strong>$date</strong></p>
</body>
</html>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('certificat.pdf', 'I');
?>