
<?php
  include( 'chartlogix.inc.php' );
   
  $chart = new BarChart();

  $chart->setTitle( 'This is a bar chart' );
 
  $chart->addColumns( array('Jan','Feb','Mar','Apr','May') );
   
  $chart->doBarSeries( 'MP3 Player Sales', 'FFCC00' );
  $chart->addData( 'Jan', 191 );
  $chart->addData( 'Feb', 217 );
  $chart->addData( 'Mar', 178 );
  $chart->addData( 'Apr', 263 );
  $chart->addData( 'May', 321 );
 
  $chart->doBarSeries( 'Computer Sales', '00CCFF' );
  $chart->addData( 'Jan', 201 );
  $chart->addData( 'Feb', 292 );
  $chart->addData( 'Mar', 249 );
  $chart->addData( 'Apr', 320 );
  $chart->addData( 'May', 416 );
   
  $chart->drawPNG( 500, 400 );
?>