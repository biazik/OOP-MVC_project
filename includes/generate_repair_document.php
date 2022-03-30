<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dokument</title>
  </head>
  <body>
    <?php
    // Generation of font definition file for tutorial 7
    if (isset($_GET['id']) AND isset($_GET['number']) AND isset($_GET['device']) AND isset($_GET['repair_description']) AND isset($_GET['price']) AND isset($_GET['password'])) {
      ob_start();
      require '../plugins/FPDF_Assets/tfpdf.php';
      class myPDF extends tFPDF{
        function WordWrap(&$text, $maxwidth){
          $text = trim($text);
          if ($text==='')
          // return 0;
          $space = $this->GetStringWidth(' ');
          $lines = explode("\n", $text);
          $text = '';
          $count = 0;

          foreach ($lines as $line)
          {
            $words = preg_split('/ +/', $line);
            $width = 0;

            foreach ($words as $word)
            {
              $wordwidth = $this->GetStringWidth($word);
              if ($wordwidth > $maxwidth)
              {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                  $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                  if($width + $wordwidth <= $maxwidth)
                  {
                    $width += $wordwidth;
                    $text .= substr($word, $i, 1);
                  }
                  else
                  {
                    $width = $wordwidth;
                    $text = rtrim($text)."\n".substr($word, $i, 1);
                    $count++;
                  }
                }
              }
              elseif($width + $wordwidth <= $maxwidth)
              {
                $space = $this->GetStringWidth(' ');
                $width += $wordwidth + $space;
                $text .= $word.' ';
              }
              else
              {
                $space = $this->GetStringWidth(' ');
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
              }
            }
            $text = rtrim($text)."\n";
            $count++;
          }
          $text = rtrim($text);
          return $count;
        }
        function header(){
          $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
          $this->SetFont('DejaVu','', 18);
          $this->Cell(0,5,"Dokument przyjęcia do serwisu",0,0,'C');
          $this->SetFont('DejaVu','', 10);
          $this->Cell(0,5,"Kontakt: 888 995 775",0,0,'R');
          $this->SetFont('DejaVu','', 10);
          $this->Ln();
          $this->Cell(0,5,"Godziny otwarcia",0,0,'R');
          $this->Ln();
          $this->Cell(0,10,"GSM Mosina, Krotowskiego 1, Mosina",0,0,'C');
          $this->SetFont('DejaVu','', 9);
          $this->Cell(0,5,"Pon-Pt: 10:30-17:30",0,0,'R');
          $this->Ln();
          $this->Cell(0,5,"Sob: 9:00-13:00",0,0,'R');
        }
        function footer(){
          $this->SetY(-15);
          $this->SetFont('DejaVu','', 14);
          $this->Cell(0,5,"GSM Mosina SERWIS",0,0,'C');
        }
      }
      $repair_id=$_GET['id'];
      $number=$_GET['number'];
      $device=$_GET['device'];
      $repair_description=$_GET['repair_description'];
      $price=$_GET['price'];
      $password=$_GET['password'];
      $date=$_GET['date'];
      $pdf = new myPDF();
      $pdf->AddPage('P', 'A4');
      $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
      $pdf->SetFont('DejaVu','', 12);
      $pdf->ln(20);
      $pdf->Write(10,"ID Naprawy: $repair_id");
      $pdf->Cell(0,10,"Data zdania do naprawy: $date",0,0,'R');
      $pdf->ln();
      $pdf->WordWrap($device,70);
      $pdf->Write(10,"Nazwa urządzenia: $device");
      $pdf->ln();
      $pdf->Write(5,"Opis naprawy:");
      $pdf->ln();
      $pdf->Write(5,$repair_description);
      $pdf->ln(10);
      $pdf->Write(5,"Pieczątka serwisu");
      $pdf->ln();
      $pdf->Cell(70,30,'',1,1,'C');
      $pdf->Line(0,165,360,165);
      $pdf->ln();
      $pdf->SetY(175);
      $pdf->SetFont('DejaVu','', 10);
      $pdf->Write(10,"ID: $repair_id");
      $pdf->Write(10,"                                        Data zdania do naprawy: $date");
      $pdf->Cell(0,10,"Tel: $number",0,0,'R');
      $pdf->ln(15);
      $pdf->WordWrap($device,70);
      $pdf->Write(10,"Nazwa urządzenia: $device");
      $pdf->ln();
      $pdf->Write(5,"Opis naprawy:");
      $pdf->ln();
      $pdf->Write(5,$repair_description);
      $pdf->ln(7);
      $pdf->SetFont('DejaVu','', 16);
      $pdf->Write(5,"Kwota naprawy: $price");
      $pdf->SetFont('DejaVu','', 10);
      $pdf->Cell(0,5,"Koszt serwisu:",0,0,'R');
      $pdf->ln();
      $pdf->SetFont('DejaVu','', 16);
      $pdf->Cell(140,20,"Hasło: $password",0,0);
      $pdf->SetFont('DejaVu','', 10);
      $pdf->Cell(50,20,'',1,0);
      $pdf->output();
      ob_end_flush();
    }
    ?>
  </body>
</html>
