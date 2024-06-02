<?php


/*
    ChartLogix Free Trial
    www.phpcharting.com

    Registered To: deji@waltergates.com
*/


class BarChart{

  function  __construct                   ( )                                                                           {$this->hh_();}

  function  addColumn                     ( $column )                                                                   {$this->ha_($column);}

  function  addColumns                    ( $columns )                                                                  {$this->iie($columns);}

  function  addData                       ( $column,  $value )                                                          {$this->fge($column,$value);}

  function  addDataToSeries               ( $series,  $column,  $value )                                                {return $this->ja($series,$column,$value);}

  function  clearAxes                     ( )                                                                           {$this->cic();}

  function  doBarSeries                   ( $name,  $col1 =0xFFFFFF,  $col2 =false )                                    {$this->dh_($name,$col1,$col2);}

  function  doLineSeries                  ( $name,  $col =0x000000 )                                                    {$this->fdd($name,$col);}

  function  doStackedBarSeries            ( $name,  $col1 =0xFFFFFF,  $col2 =false )                                    {$this->hag($name,$col1,$col2);}

  function  drawJPEG                      ( $w,  $h,  $quality =75,  $thumb_w =0,  $thumb_h =0 )                        {$this->cfe($w,$h,$quality,$thumb_w,$thumb_h);}

  function  drawPNG                       ( $w,  $h,  $thumb_w =0,  $thumb_h =0 )                                       {$this->cib($w,$h,$thumb_w,$thumb_h);}

  function  saveJPEG                      ( $filename,  $w,  $h,  $quality =75,  $thumb_w =0,  $thumb_h =0 )            {$this->ida($filename,$w,$h,$quality,$thumb_w,$thumb_h);}

  function  savePNG                       ( $filename,  $w,  $h,  $thumb_w =0,  $thumb_h =0 )                           {$this->g_d($filename,$w,$h,$thumb_w,$thumb_h);}

  function  setBackground                 ( $c1 =0xEEEEEE,  $c2 =false )                                                {$this->adh($c1,$c2);}

  function  setBarColour                  ( $col1,  $col2 =false )                                                      {$this->agg($col1,$col2);}

  function  setBottomAxis                 ( $axis )                                                                     {return $this->jha($axis);}

  function  setBottomAxisTitle            ( $text ='' )                                                                 {$this->dge($text);}

  function  setColumnSpacing              ( $spacing =25 )                                                              {$this->fbb($spacing);}

  function  setGraphOrientation           ( $orientation =0 )                                                           {$this->cid($orientation);}

  function  setLeftAxis                   ( $axis )                                                                     {return $this->cge($axis);}

  function  setLeftAxisTitle              ( $text ='' )                                                                 {$this->gei($text);}

  function  setLegendBoxStyle             ( $bg =0xFFFFFF,  $border =0x000000,  $padding =10 )                          {$this->eib($bg,$border,$padding);}

  function  setLegendKeyStyle             ( $size =10,  $padding =10 )                                                  {$this->hcf($size,$padding);}

  function  setLegendPosition             ( $xpos =1,  $ypos =0 )                                                       {$this->d__($xpos,$ypos);}

  function  setLegendTextStyle            ( $font ="arial.ttf",  $size =10,  $col =0x000000,  $between =10 )            {$this->hde($font,$size,$col,$between);}

  function  setLegendWidth                ( $width =40 )                                                                {$this->hec($width);}

  function  setLineColour                 ( $col )                                                                      {$this->iig($col);}

  function  setLineStyle                  ( $thickness =4,  $dot_size =7 )                                              {$this->ff_($thickness,$dot_size);}

  function  setPadding                    ( $padding =20 )                                                              {$this->bgb($padding);}

  function  setRightAxis                  ( $axis )                                                                     {return $this->hbc($axis);}

  function  setRightAxisTitle             ( $text ='' )                                                                 {$this->cia($text);}

  function  setSeriesShownInLegend        ( $shown =true )                                                              {$this->cfh($shown);}

  function  setStackedBarOverlap          ( $overlap =0 )                                                               {$this->bhe($overlap);}

  function  setStackedBarSpacing          ( $spacing =0 )                                                               {$this->bga($spacing);}

  function  setTitle                      ( $title )                                                                    {$this->bei($title);}

  function  setTitlePosition              ( $xpos =0,  $ypos =0 )                                                       {$this->ccc($xpos,$ypos);}

  function  setTitleStyle                 ( $font ="arial.ttf",  $size =15,  $col =0x000000 )                           {$this->hbf($font,$size,$col);}

  function  setTopAxis                    ( $axis )                                                                     {return $this->jee($axis);}

  function  setTopAxisTitle               ( $text ='' )                                                                 {$this->cie($text);}

  function  setValueStyle                 ( $font =false,  $size =8,  $col =0x000000,  $pos =1,  $angle =0 )            {$this->dff($font,$size,$col,$pos,$angle);}

  function  setXAxisTextStyle             ( $font ='arial.ttf',  $size =10,  $col =0x000000,  $angle =0 )               {$this->f_f($font,$size,$col,$angle);}

  function  setXAxisTitleStyle            ( $font ='arial.ttf',  $size =12,  $col ='000000' )                           {$this->ehg($font,$size,$col);}

  function  setYAxisMaximum               ( $max =0 )                                                                   {$this->fed($max);}

  function  setYAxisTextStyle             ( $font ='arial.ttf',  $size =10,  $col =0x000000 )                           {$this->da_($font,$size,$col);}

  function  setYAxisTitleStyle            ( $font ='arial.ttf',  $size =12,  $col ='000000' )                           {$this->df($font,$size,$col);}


/* Implementation */

private $faf=0;
private function cia($a__='')
{
$this->ige[2]['t']=$a__;
}
private function cfh($abb_=true)
{
$this->fic[$this->ihg]['in_legend']=$abb_;
}
private $ci=10;
private function iig($ba__)
{
$this->fic[$this->ihg]['col']=$this->aih($ba__);
}
private $ggd=0x000000;
private function fed($aaa_=0)
{
if($aaa_<=0)$aaa_=0;
$this->ddh=$aaa_*1.0;
}
private $gfh=4;private function ja($bab_,$b___,$ab_)
{
foreach($this->fic as $cb_=>$ca__)
if($bab_==$ca__['name'])
{
$this->iie($b___);
$this->fic[$cb_]['data'][$b___]=$ab_*1.0;
return true;
}
return false;
}
private $dhf=0x000000;
private function aih($b_b_)
{
if(is_integer($b_b_))
{
return $b_b_;
}
elseif(is_string($b_b_))
{
if($b_b_[0]=='#')
$b_b_=substr($b_b_,1);
$b_b_=strtoupper($b_b_);
$aa="0123456789ABCDEF";
$ba__=0;
for($caa=0;$caa<strlen($b_b_);$caa++)
{
$ba__<<=4;
$aab_=strpos($aa,$b_b_[$caa]);
if($aab_!==false)
{
$ba__+=$aab_;
}
}
return $ba__;
}
else
{
return 0xFF00FF;
}
}
private function hde($b___="arial.ttf",$abaa=10,$b_ba=0x000000,$a_a_=10)
{
$abaa=intval($abaa);
$a_a_=intval($a_a_);
$this->bae=$b___;
$this->hc=$abaa;
$this->dhf=$this->aih($b_ba);
$this->jhd=$a_a_;
}
private function iie($cb__)
{
if(is_array($cb__))
{
foreach($cb__ as $bab)
{
if(!isset($this->gce[$bab]))
{
$this->bha[]=$bab;
$this->gce[$bab]=1;
}
}
}
else
{
if(!isset($this->gce[$cb__]))
{
$this->bha[]=$cb__;
$this->gce[$cb__]=1;
}
}
}
private function fdd($aab_,$ca_=0x000000)
{
if(!$this->ca_)
{
$this->ca_=true;
}
else
{
$this->ihg++;
}
$this->fic[$this->ihg]=array();
$this->fic[$this->ihg]['type']='line';
$this->fic[$this->ihg]['name']=$aab_;
$this->fic[$this->ihg]['col']=$this->aih($ca_);
$this->fic[$this->ihg]['in_legend']=true;
$this->fic[$this->ihg]['data']=array();
$this->fic[$this->ihg]['line_thickness']=$this->gfh;
$this->fic[$this->ihg]['line_dot_size']=$this->ag;
$this->fic[$this->ihg]['value_font']=$this->cc;
$this->fic[$this->ihg]['value_size']=$this->idg;
$this->fic[$this->ihg]['value_col']=$this->j__;
$this->fic[$this->ihg]['value_pos']=$this->heg;
$this->fic[$this->ihg]['value_angle']=$this->gcf;
}
private function hec($bab_=40)
{
$bab_*=1.0;
if($bab_<0)
$bab_=0;
if($bab_>100)
$bab_=100;
$this->a_c=$bab_;
}
private function dge($aa__='')
{
$this->ige[1]['t']=$aa__;
}
private $gcf=0;
private $be_=0x000000;
private function agg($aaa,$a_a_=false)
{
if($a_a_===false)
$a_a_=$aaa;
$this->fic[$this->ihg]['col1']=$this->aih($aaa);
$this->fic[$this->ihg]['col2']=$this->aih($a_a_);
}
private $jfc=0x000000;
private $cd=0;
private $fbh='arial.ttf';
private $bha=array();
private function aee($bb,$abb_,$baa='',$baaa='')
{
$c_aa=($bb+2)%4;
$ca_a=($bb+1)%4;
$b_a_=($bb+3)%4;
$abb_=$abb_=='x'?'x':($abb_=='y'?'y':'');
$baa=$baa=='left'||$baa=='down'||$baa==-1?-1:1;
if($this->ige[$ca_a]['a']==$abb_)
return false;
if($this->ige[$b_a_]['a']==$abb_)
return false;
if($this->ige[$c_aa]['a']!=$abb_&&$this->ige[$c_aa]['a']!='')
return false;
if($this->ige[$c_aa]['a']==$abb_&&$this->ige[$c_aa]['d']!=$baa)
return false;
$this->ige[$bb]=array('a'=>$abb_,'d'=>$baa,'t'=>$baaa);
return true;
}
private $jge=20;
private $bae="arial.ttf";
private $fic=array();
private function g_d($c_a_,$cbba,$bbb,$aa_=0,$aa__=0)
{
$bb__=$this->gfa($cbba,$bbb);
$bb__=$this->jag($bb__,$aa_,$aa__);
imagepng($bb__,$c_a_);
imagedestroy($bb__);
}
private function cic()
{
$this->ige=array(array('a'=>''),array('a'=>''),array('a'=>''),array('a'=>''));
}
private function bgb($a_a=20)
{
$a_a=intval($a_a);
if($a_a<0)$a_a=0;
$this->jge=$a_a;
}
private function cfe($ca__,$b__a,$a_ba=75,$bab=0,$ab_=0)
{
$aab_=$this->gfa($ca__,$b__a);
$aab_=$this->jag($aab_,$bab,$ab_);
header('Content-type: image/jpeg');
imagejpeg($aab_,NULL,$a_ba);
imagedestroy($aab_);
}
private $i_i=0xFFFFFF;
private function cib($bb__,$aaa_,$a_=0,$cb_=0)
{
if($bb__<1)$bb__=1;
if($aaa_<1)$aaa_=1;
$caa=$this->gfa($bb__,$aaa_);
$caa=$this->jag($caa,$a_,$cb_);
#header('Content-type: image/png');
#imagepng($caa);
#imagedestroy($caa);
}
private function d__($ab=1,$cb__=0)
{
$ab=intval($ab);
$cb__=intval($cb__);
$this->bhh=$ab;
$this->ecb=$cb__;
}
private $idg=8;
private $jhd=10;
private $cch='arial.ttf';
private function fge($c_b,$aaa)
{
$this->iie($c_b);
$this->fic[$this->ihg]['data'][$c_b]=$aaa*1.0;
}
private $e_c=10;
private $gce=array();
private function jee($b_a_)
{
return $this->aee(3,$b_a_);
}
private $heg=1;
private function dff($ab=false,$caa_=8,$ab_=0x000000,$b_a=1,$baaa=0)
{
$caa_=intval($caa_);
if($caa_<0)$caa_=0;
$b_a=intval($b_a);
$baaa=intval($baaa);
if($baaa<-90)$baaa=-90;
if($baaa>90)$baaa=90;
$this->cc=$this->fic[$this->ihg]['value_font']=$ab;
$this->idg=$this->fic[$this->ihg]['value_size']=$caa_;
$this->j__=$this->fic[$this->ihg]['value_col']=$this->aih($ab_);
$this->heg=$this->fic[$this->ihg]['value_pos']=$b_a;
$this->gcf=$this->fic[$this->ihg]['value_angle']=$baaa;
}
private $igh=0xEEEEEE;
private function ff_($bba=4,$aaa_=7)
{
if($aaa_<0)$aaa_=0;
if($bba<0)$bba=0;
if($aaa_<$bba)$aaa_=$bba;
$this->gfh=$bba;
$this->ag=$aaa_;
$this->fic[$this->ihg]['line_dot_size']=$aaa_;
$this->fic[$this->ihg]['line_thickness']=$bba;
}
private $ddh=0;
private $jdb=0x000000;
private function hag($caa_,$b=0xFFFFFF,$cb_a=false)
{
if($cb_a===false)
$cb_a=$b;
if(!$this->ca_)
{
$this->ca_=true;
}
else
{
$this->ihg++;
}
$this->fic[$this->ihg]=array();
$this->fic[$this->ihg]['type']='stackedbar';
$this->fic[$this->ihg]['name']=$caa_;
$this->fic[$this->ihg]['col1']=$this->aih($b);
$this->fic[$this->ihg]['col2']=$this->aih($cb_a);
$this->fic[$this->ihg]['in_legend']=true;
$this->fic[$this->ihg]['data']=array();
$this->fic[$this->ihg]['value_font']=$this->cc;
$this->fic[$this->ihg]['value_size']=$this->idg;
$this->fic[$this->ihg]['value_col']=$this->j__;
$this->fic[$this->ihg]['value_pos']=$this->heg;
$this->fic[$this->ihg]['value_angle']=$this->gcf;
}
private function adh($cba=0xEEEEEE,$c___=false)
{
if($c___===false)
$c___=$cba;
$this->igh=$this->aih($cba);
$this->jbe=$this->aih($c___);
}
private function dh_($aa_,$a_=0xFFFFFF,$a_aa=false)
{
if($a_aa===false)
$a_aa=$a_;
if(!$this->ca_)
{
$this->ca_=true;
}
else
{
$this->ihg++;
}
$this->fic[$this->ihg]=array();
$this->fic[$this->ihg]['type']='bar';
$this->fic[$this->ihg]['name']=$aa_;
$this->fic[$this->ihg]['col1']=$this->aih($a_);
$this->fic[$this->ihg]['col2']=$this->aih($a_aa);
$this->fic[$this->ihg]['in_legend']=true;
$this->fic[$this->ihg]['data']=array();
$this->fic[$this->ihg]['value_font']=$this->cc;
$this->fic[$this->ihg]['value_size']=$this->idg;
$this->fic[$this->ihg]['value_col']=$this->j__;
$this->fic[$this->ihg]['value_pos']=$this->heg;
$this->fic[$this->ihg]['value_angle']=$this->gcf;
}
private $cc=false;
private $fi_=12;
private $haf="arial.ttf";
private $fh='';
private function gei($bb='')
{
$this->ige[0]['t']=$bb;
}
private function cge($cb)
{
return $this->aee(0,$cb);
}
private $ca_=false;
private function ida($bb__,$c__,$a_aa,$aaa_=75,$cbba=0,$c_b=0)
{
$baaa=$this->gfa($c__,$a_aa);
$baaa=$this->jag($baaa,$cbba,$c_b);
imagejpeg($baaa,$bb__,$aaa_);
imagedestroy($baaa);
}
private function jec()
{
$c='';
$c.="<barchart";
$c.=" bg1=\"".sprintf('%06X',$this->igh)."\" bg2=\"".sprintf('%06X',$this->jbe)."\"";
$c.=" padding=\"".$this->jge."\">\n";
$c.="  <title";$c.=" font=\"".addslashes($this->haf)."\"";
$c.=" font_size=\"".$this->ddg."\"";
$c.=" font_col=\"".sprintf('%06X',$this->ggd)."\"";
$c.=" position_x=\"".$this->eie."\"";
$c.=" position_y=\"".$this->ab."\">";
$c.=htmlspecialchars($this->fh);
$c.="</title>\n";
$c.="  <legend width=\"".sprintf('%.2f',$this->a_c)."\"";
$c.=" font=\"".addslashes($this->bae)."\"";
$c.=" font_size=\"".$this->hc."\"";
$c.=" font_col=\"".sprintf('%06X',$this->dhf)."\"";
$c.=" between_padding=\"".$this->jhd."\"";
$c.=" key_size=\"".$this->gdd."\"";
$c.=" key_padding=\"".$this->ci."\"";
$c.=" bg=\"".sprintf('%06X',$this->i_i)."\"";
$c.=" border=\"".sprintf('%06X',$this->fgd)."\"";
$c.=" box_padding=\"".$this->e_c."\"";
$c.=" position_x=\"".$this->bhh."\"";
$c.=" position_y=\"".$this->ecb."\"";
$c.=" />\n";
$c.="  <xaxis";
$c.=" font=\"".addslashes($this->cch)."\"";
$c.=" font_size=\"".$this->eab."\"";
$c.=" font_col=\"".sprintf('%06X',$this->jdb)."\"";
$c.=" font_angle=\"".$this->cd."\"";
$c.=" />\n";
$c.="  <yaxis";
$c.=" font=\"".addslashes($this->fcf)."\"";
$c.=" font_size=\"".$this->gba."\"";
$c.=" font_col=\"".sprintf('%06X',$this->be_)."\"";
$c.=" max=\"".intval($this->ddh)."\"";
$c.=" />\n";
for($c__=0;$c__<4;$c__++)
{
$c.="  <axis index=\"$c__\"";
$aa=$this->ige[$c__]['a'];
$a__b=intval($this->ige[$c__]['d']);
$a__b=$a__b<0?' dir="-1"':'';
$baa_=addslashes($this->ige[$c__]['t']);
$c.=" axis=\"$aa\" $a__b>".htmlspecialchars($baa_)."</axis>\n";
}
$c.="  <columns";
$c.=" spacing=\"".$this->jda."\"";
$c.=" stack_spacing=\"".$this->hge."\"";
$c.=">\n";
if(count($this->bha)>0)
{
foreach($this->bha as $c_a_)
{
$c.="    <column name=\"".htmlspecialchars($c_a_)."\" />\n";
}
}
$c.="  </columns>\n";
if(count($this->bha)>0)
{
foreach($this->fic as $ba__)
{
$baaa=$ba__['type'];
$aaaa=$ba__['name'];
$c.="  <series";
$c.=" type=\"".htmlspecialchars($baaa)."\"";
$c.=" name=\"".htmlspecialchars($aaaa)."\"";
if(!$ba__['in_legend'])
{
$c.=" in_legend=\"false\"";
}
if($baaa=='bar'||$baaa=='stackedbar')
{
$cb_a=sprintf('%06X',$ba__['col1']);
$aa_a=sprintf('%06X',$ba__['col2']);
$c.=" col1=\"".htmlspecialchars($cb_a)."\"";
$c.=" col2=\"".htmlspecialchars($aa_a)."\"";
}
elseif($baaa=='line')
{
$ab_=sprintf('%06X',$ba__['col']);
$c.=" col=\"".htmlspecialchars($ab_)."\"";
$c.=" line_thickness=\"".$ba__['line_thickness']."\"";
$c.=" line_dot_size=\"".$ba__['line_dot_size']."\"";
}
if($ba__['value_font']!==false)
{
$c.=" value_font=\"".addslashes($ba__['value_font'])."\"";
$c.=" value_size=\"".intval($ba__['value_size'])."\"";
$c.=" value_col=\"".sprintf('%06X',$ba__['value_col'])."\"";
$c.=" value_pos=\"".intval($ba__['value_pos'])."\"";
$c.=" value_angle=\"".intval($ba__['value_angle'])."\"";
}
$c.=">\n";
foreach($this->bha as $c_a_)
{
$c.="    <data column=\"".htmlspecialchars($c_a_)."\" value=\"".(isset($ba__['data'][$c_a_])?$ba__['data'][$c_a_]:'')."\" />\n";
}
$c.="  </series>\n";
}
}
$c.="</barchart>";
return $c;
}
private $ca=0x000000;
private $ecb=0;
private $ab=0;
private $bhh=1;
private function ehg($aab='arial.ttf',$a_a=12,$aab_='000000')
{
$this->fbh=$aab;
$this->hbe=intval($a_a);
$this->jfc=$this->aih($aab_);
}
private $hbe=12;
private function cid($cba_=0)
{
if($cba_==0)
{
$this->cic();
$this->cge('y');
$this->jha('x');
}
else
{
$this->cic();
$this->cge('x');
$this->jha('y');
}
}
private $eab=10;
private function ha_($ba_)
{
$this->iie($ba_);
}
private $ihg=0;
private function jha($c)
{
return $this->aee(1,$c);
}
private $hc=10;
private $hge=0;
private function ccc($c_=0,$ab_=0)
{
$c_=intval($c_);
$ab_=intval($ab_);
$this->eie=$c_;
$this->ab=$ab_;
}
private $fcf='arial.ttf';
private function bei($a_)
{
$this->fh=$a_;
}
private function f_f($bbb_='arial.ttf',$b_ba=10,$ca__=0x000000,$c__=0)
{
$b_ba=intval($b_ba);
$c__=intval($c__);
if($c__<-90)$c__=90;
if($c__>90)$c__=90;
$this->cch=$bbb_;
$this->eab=$b_ba;
$this->jdb=$this->aih($ca__);
$this->cd=$c__;
}
private $eie=0;
private $cbg=0;
private $gba=10;
private function hbf($cba="arial.ttf",$a=15,$c_aa=0x000000)
{
$a=intval($a);
if($a<0)
$a=0;
$this->haf=$cba;
$this->ddg=$a;
$this->ggd=$this->aih($c_aa);
}
private $gdd=10;
private $ddg=15;
private function hh_()
{
$this->fic[$this->ihg]=array();
$this->fic[$this->ihg]['type']='bar';
$this->fic[$this->ihg]['name']='';
$this->fic[$this->ihg]['col1']=$this->aih(0xFFFFFF);
$this->fic[$this->ihg]['col2']=$this->aih(0xFFFFFF);
$this->fic[$this->ihg]['in_legend']=true;
$this->fic[$this->ihg]['data']=array();
$this->fic[$this->ihg]['value_font']=$this->cc;
$this->fic[$this->ihg]['value_size']=$this->idg;
$this->fic[$this->ihg]['value_col']=$this->j__;
$this->fic[$this->ihg]['value_pos']=$this->heg;
$this->fic[$this->ihg]['value_angle']=$this->gcf;
$this->ige=array(array('a'=>'y','d'=>1,'t'=>''),array('a'=>'x','d'=>1,'t'=>''),array('a'=>'','d'=>0,'t'=>''),array('a'=>'','d'=>0,'t'=>''));
}
private function jag($cbaa,$b_ba=0,$ca_a=0)
{
if($b_ba<=0&&$ca_a<=0)return $cbaa;
$cba=imagesx($cbaa);
$b__a=imagesy($cbaa);
if($b_ba==0)
{
$b_ba=$cba*$ca_a/$b__a;
}
elseif($ca_a==0)
{
$ca_a=$b__a*$b_ba/$cba;
}
$bbb_=imagecreatetruecolor($b_ba,$ca_a);
imagecopyresampled($bbb_,$cbaa,0,0,0,0,$b_ba,$ca_a,$cba,$b__a);
imagedestroy($cbaa);
return $bbb_;
}
private function bhe($aab_=0)
{
$aab_=intval($aab_);
if($aab_>100)$aab_=100;
$this->hge=-$aab_;
}
private $j__=0x000000;
private $dgd='arial.ttf';
private function cie($caa='')
{
$this->ige[3]['t']=$caa;
}
private function bga($cba_=0)
{
$cba_=intval($cba_);
if($cba_<-100)$cba_=-100;
$this->hge=$cba_;
}
private function hbc($cb_)
{
return $this->aee(2,$cb_);
}
private function fbb($ca_=25)
{
$ca_=intval($ca_);
$this->jda=$ca_;
}
private $fgd=0x000000;
private $a_c=40;
############
private function gfa($cca,$a_b_)
{
$cca=intval($cca);
$a_b_=intval($a_b_);
$dba=$this->jec();
$dba='xml='.urlencode($dba);
$ac="POST /webservice/1.04/chart.php?ref=388-6b6506644c0c&w=$cca&h=$a_b_ HTTP/1.0\r\n";
$ac.="Host: localhost\r\n";
$ac.="User-Agent: ChartLogix/1.04 (Trial 388-6b6506644c0c)\r\n";
$ac.="Content-Type: application/x-www-form-urlencoded\r\n";
$ac.="Content-Length: ".strlen($dba)."\r\n\r\n";
$a__=0;
$c_b=0;
#$ccc=fsockopen('www.phpcharting.com',80,$a__,$c_b,30);
$ccc=fsockopen('localhost',80,$a__,$c_b,30);
if($ccc)
{
fputs($ccc,$ac.$dba);
$dab='';
while(!feof($ccc))$dab.=fgets($ccc,1024);
fclose($ccc);
list($cc,$dab)=explode("\r\n\r\n",$dab,2);
$cc=explode("\r\n",$cc);
$ac=array();
foreach($cc as $bc__)
if(strpos($bc__,':')!==false)
{
list($ccb,$c_b_)=explode(':',$bc__);
$ac[trim($ccb)]=trim($c_b_);
}
if(isset($ac['Transfer-Encoding']))
{
$baa=explode(';',$ac['Transfer-Encoding']);
if(strtolower($baa[0])=='chunked')
{
$b__=$dab;
$dab='';
while(true)
{
list($caa_,$b__)=explode("\r\n",$b__,2);
$caa_=hexdec($caa_);
if($caa_==0)
break;
$dab.=substr($b__,0,$caa_);
$b__=ltrim(substr($b__,$caa_));
}
}
}
return imagecreatefromstring($dab);
}
else
{
}
return false;
}

################

private $ige=array();
private $jbe=0xEEEEEE;
private function eib($cba=0xFFFFFF,$cab=0x000000,$a_aa=10)
{
$a_aa=intval($a_aa);
$this->i_i=$this->aih($cba);
$this->fgd=$this->aih($cab);
$this->e_c=$a_aa;
}
private $jda=25;
private function df($ba__='arial.ttf',$a__=12,$cba='000000')
{
$this->dgd=$ba__;
$this->fi_=intval($a__);
$this->ca=$this->aih($cba);
}
private function hcf($cb=10,$bba_=10)
{
$cb=intval($cb);
$bba_=intval($bba_);
$this->gdd=$cb;
$this->ci=$bba_;
}
private $ag=7;
private function da_($bab='arial.ttf',$c_aa=10,$b_b=0x000000)
{
$c_aa=intval($c_aa);
$this->fcf=$bab;
$this->gba=$c_aa;
$this->be_=$this->aih($b_b);
}

}

class PieChart{

  function  __construct                   ( )                                                                           {$this->fea();}

  function  addData                       ( $name,  $value,  $colour )                                                  {$this->fcc($name,$value,$colour);}

  function  drawJPEG                      ( $w,  $h,  $quality =75,  $thumb_w =0,  $thumb_h =0 )                        {$this->fca($w,$h,$quality,$thumb_w,$thumb_h);}

  function  drawPNG                       ( $w,  $h,  $thumb_w =0,  $thumb_h =0 )                                       {$this->c_f($w,$h,$thumb_w,$thumb_h);}

  function  saveJPEG                      ( $filename,  $w,  $h,  $quality =75,  $thumb_w =0,  $thumb_h =0 )            {$this->ba_($filename,$w,$h,$quality,$thumb_w,$thumb_h);}

  function  savePNG                       ( $filename,  $w,  $h,  $thumb_w =0,  $thumb_h =0 )                           {$this->cf_($filename,$w,$h,$thumb_w,$thumb_h);}

  function  set3DEdgeStyle                ( $size,  $hardness,  $reverse =false )                                       {$this->ed($size,$hardness,$reverse);}

  function  setBackground                 ( $c1 =0xEEEEEE,  $c2 =false )                                                {$this->cf($c1,$c2);}

  function  setHoleSize                   ( $size )                                                                     {$this->fd_($size);}

  function  setLegendBoxStyle             ( $bg =0xFFFFFF,  $border =0x000000,  $padding =10 )                          {$this->gef($bg,$border,$padding);}

  function  setLegendKeyStyle             ( $size =10,  $padding =10 )                                                  {$this->gb__($size,$padding);}

  function  setLegendPosition             ( $xpos =1,  $ypos =0 )                                                       {$this->ae_($xpos,$ypos);}

  function  setLegendTextStyle            ( $font ="arial.ttf",  $size =10,  $col =0x000000,  $between =10 )            {$this->edb($font,$size,$col,$between);}

  function  setLegendWidth                ( $width =40 )                                                                {$this->cb_($width);}

  function  setPadding                    ( $padding =20 )                                                              {$this->eef($padding);}

  function  setTitle                      ( $title )                                                                    {$this->cc_($title);}

  function  setTitlePosition              ( $xpos =0,  $ypos =0 )                                                       {$this->adf($xpos,$ypos);}

  function  setTitleStyle                 ( $font ="arial.ttf",  $size =15,  $col =0x000000 )                           {$this->f_($font,$size,$col);}


/* Implementation */

private function fd_($baa_){$baa_=intval($baa_);if($baa_<0)$baa_=0;if($baa_>100)$baa_=100;$this->ffe=$baa_;}private $e__="arial.ttf";private $ffe=0;private $cdb=0;private $a_f=0;private $gfd=0x000000;private $dad=20;private $d___=1;private $fde=10;private $ged=0;private $b_=0x000000;private function f_($ba="arial.ttf",$b__=15,$b__a=0x000000){$b__=intval($b__);if($b__<0)$b__=0;$this->ffd=$ba;$this->d_c=$b__;$this->caf=$this->c_e($b__a);}private $edc=10;private $afa=0;private $ee=0xFFFFFF;private function cc_($aab){$this->ddb=$aab;}private function gef($baa_=0xFFFFFF,$c___=0x000000,$c__=10){$this->ee=$this->c_e($baa_);$this->b_=$this->c_e($c___);$this->f_a=$c__;}private $cee=0;private function cea($a_b_,$dba){$a_b_=intval($a_b_);$dba=intval($dba);$c_a=$this->d_();$c_a='xml='.urlencode($c_a);$bca_="POST /webservice/1.04/chart.php?ref=388-6b6506644c0c&w=$a_b_&h=$dba HTTP/1.0\r\n";$bca_.="Host: www.phpcharting.com\r\n";$bca_.="User-Agent: ChartLogix/1.04 (Trial 388-6b6506644c0c)\r\n";$bca_.="Content-Type: application/x-www-form-urlencoded\r\n";$bca_.="Content-Length: ".strlen($c_a)."\r\n\r\n";$cba=0;$aac=0;$aca=fsockopen('www.phpcharting.com',80,$cba,$aac,30);if($aca){fputs($aca,$bca_.$c_a);$c_b_='';while(!feof($aca))$c_b_.=fgets($aca,1024);fclose($aca);list($bac,$c_b_)=explode("\r\n\r\n",$c_b_,2);$bac=explode("\r\n",$bac);$bca_=array();foreach($bac as $d)if(strpos($d,':')!==false){list($bcb,$dc)=explode(':',$d);$bca_[trim($bcb)]=trim($dc);}if(isset($bca_['Transfer-Encoding'])){$aa__=explode(';',$bca_['Transfer-Encoding']);if(strtolower($aa__[0])=='chunked'){$d_a_=$c_b_;$c_b_='';while(true){list($ab_,$d_a_)=explode("\r\n",$d_a_,2);$ab_=hexdec($ab_);if($ab_==0)break;$c_b_.=substr($d_a_,0,$ab_);$d_a_=ltrim(substr($d_a_,$ab_));}}}return imagecreatefromstring($c_b_);}else{}return false;}private $ffd="arial.ttf";private $ab=array();private $caf=0x000000;private function eef($b_=20){$b_=intval($b_);if($b_<0)$b_=0;$this->dad=$b_;}private $c_b=40;private $afb=0xEEEEEE;private function adf($aa=0,$ab__=0){$this->ac_=$aa;$this->afa=$ab__;}private function eba($cb,$c_b=0,$aa_=0){if($c_b<=0&&$aa_<=0)return $cb;$b_aa=imagesx($cb);$caa=imagesy($cb);if($c_b==0){$c_b=$b_aa*$aa_/$caa;}elseif($aa_==0){$aa_=$caa*$c_b/$b_aa;}$aa_a=imagecreatetruecolor($c_b,$aa_);imagecopyresampled($aa_a,$cb,0,0,0,0,$c_b,$aa_,$b_aa,$caa);imagedestroy($cb);return $aa_a;}private function fea(){}private function c_e($ca__){if(is_integer($ca__)){return $ca__;}elseif(is_string($ca__)){if($ca__[0]=='#')$ca__=substr($ca__,1);$ca__=strtoupper($ca__);$bab="0123456789ABCDEF";$c_a=0;for($aa_a=0;$aa_a<strlen($ca__);$aa_a++){$c_a<<=4;$bba=strpos($bab,$ca__[$aa_a]);if($bba!==false){$c_a+=$bba;}}return $c_a;}else{return 0xFF00FF;}}private $ddb='';private function cf($c_b=0xEEEEEE,$a_=false){if($a_===false)$a_=$c_b;$this->fa__=$this->c_e($c_b);$this->afb=$this->c_e($a_);}private function gb__($baa=10,$c_a=10){$c_a=intval($c_a);if($c_a<0)$c_a=0;$this->fde=$baa;$this->da_=$c_a;}private $d_c=15;private function d_(){$bab_='';$bab_.="<piechart";$bab_.=" bg1=\"".sprintf('%06X',$this->fa__)."\" bg2=\"".sprintf('%06X',$this->afb)."\"";$bab_.=" padding=\"".$this->dad."\">\n";$bab_.="  <title";$bab_.=" font=\"".addslashes($this->ffd)."\"";$bab_.=" font_size=\"".$this->d_c."\"";$bab_.=" font_col=\"".sprintf('%06X',$this->caf)."\"";$bab_.=" position_x=\"".$this->ac_."\"";$bab_.=" position_y=\"".$this->afa."\">";$bab_.=htmlspecialchars($this->ddb);$bab_.="</title>\n";$bab_.="  <legend width=\"".sprintf('%.2f',$this->c_b)."\"";$bab_.=" font=\"".addslashes($this->e__)."\"";$bab_.=" font_size=\"".$this->a___."\"";$bab_.=" font_col=\"".sprintf('%06X',$this->gfd)."\"";$bab_.=" between_padding=\"".$this->edc."\"";$bab_.=" key_size=\"".$this->fde."\"";$bab_.=" key_padding=\"".$this->da_."\"";$bab_.=" bg=\"".sprintf('%06X',$this->ee)."\"";$bab_.=" border=\"".sprintf('%06X',$this->b_)."\"";$bab_.=" box_padding=\"".$this->f_a."\"";$bab_.=" position_x=\"".$this->d___."\"";$bab_.=" position_y=\"".$this->ge_."\"";$bab_.=" />\n";$bab_.="  <pie";$bab_.=" hole_size=\"".$this->ffe."\"";$bab_.=" edge_size=\"".$this->ged."\"";$bab_.=" edge_hardness=\"".$this->cee."\"";$bab_.=" edge_reverse=\"".($this->dcf?1:0)."\"";$bab_.=">\n";if(count($this->ab)>0){foreach($this->ab as $bab){$bab_.="    <slice";$bab_.=" name=\"".htmlspecialchars($bab['name'])."\"";$bab_.=" value=\"".$bab['value']."\"";$bab_.=" col=\"".sprintf('%06X',$bab['colour'])."\"";$bab_.=" />\n";}}$bab_.="  </pie>\n";$bab_.="</piechart>";return $bab_;}private $f_a=10;private function ed($a__a,$aa_a,$a_a=false){$a__a=intval($a__a);if($a__a<0)$a__a=0;if($a__a>100)$a__a=100;$aa_a=intval($aa_a);if($aa_a<0)$aa_a=0;if($aa_a>100)$aa_a=100;$this->ged=$a__a;$this->cee=$aa_a;$this->dcf=$a_a?true:false;}private $cdc="";private function cf_($ca_,$bbaa,$b_,$cb_a=0,$cba=0){$a_b=$this->cea($bbaa,$b_);$a_b=$this->eba($a_b,$cb_a,$cba);imagepng($a_b,$ca_);imagedestroy($a_b);}private $de_=0;private function c_f($bbb_,$ba_a,$aaa=0,$cbaa=0){$cba_=$this->cea($bbb_,$ba_a);$cba_=$this->eba($cba_,$aaa,$cbaa);header('Content-type: image/png');imagepng($cba_);imagedestroy($cba_);}private $da_=10;private $ge_=0;private $fa__=0xEEEEEE;private $a___=10;private function fcc($bb__,$b_aa,$ca_a){$b_aa*=1.0;if($b_aa<0)return;$this->ab[]=array('name'=>$bb__,'value'=>$b_aa,'colour'=>$this->c_e($ca_a),);$this->de_+=$b_aa;}private $dcf=false;private $ac_=0;private function fca($a_ba,$ab,$b___=75,$abb_=0,$bab_=0){$cbba=$this->cea($a_ba,$ab);$cbba=$this->eba($cbba,$abb_,$bab_);header('Content-type: image/jpeg');imagejpeg($cbba,NULL,$b___);imagedestroy($cbba);}private function edb($a__a="arial.ttf",$cb=10,$baa=0x000000,$aa__=10){$this->e__=$a__a;$this->a___=$cb;$this->gfd=$this->c_e($baa);$this->edc=$aa__;}private function cb_($b_a=40){$b_a*=1.0;if($b_a<0)$b_a=0;if($b_a>100)$b_a=100;$this->c_b=$b_a;}private function ae_($a_a=1,$aab_=0){$a_a=intval($a_a);if($a_a<0)$a_a=-1;if($a_a>0)$a_a=1;$aab_=intval($aab_);if($aab_<0)$aab_=-1;if($aab_>0)$aab_=1;$this->d___=$a_a;$this->ge_=$aab_;}private function ba_($c_b_,$bb,$a,$cbb_=75,$b__a=0,$b_ba=0){$aaa=$this->cea($bb,$a);$aaa=$this->eba($aaa,$b__a,$b_ba);imagejpeg($aaa,$c_b_,$cbb_);imagedestroy($aaa);}

}





?>