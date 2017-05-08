<?php
require('fpdf/fpdf.php');

class PDF_MC_Table extends FPDF
{
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
    //Set the array of column widths
        $this->widths=$w;
    }
    function Header()
    {

        $this->Image('../../images/Escudos/logo.png',20,8,33);
        $this->SetFont('Arial','B',12);

        $this->Cell(0,10,'LIGA SANTANDEREANA DE FUTBOL',0,0,'C');
        $this->Ln();
        $this->Cell(0,10,'Programacion',0,0,'C');
        $this->Ln();
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $this->Cell(0,10,'Categoria ' . NombreTorneo($id),0,0,'C');

        }

    }
    function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    date_default_timezone_set ( 'America/Bogota' );
    $this->Cell(0,10,'Generado el '.date("d-m-Y g:i a"),0,0,'C');
}
    function SetAligns($a)
    {
    //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
    //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=6*$nb;
    //Issue a page break first if needed
        $this->CheckPageBreak($h);
    //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
        //Draw the border
            $this->Rect($x,$y,$w,$h);
        //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
    //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
    //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
    //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}


?>
