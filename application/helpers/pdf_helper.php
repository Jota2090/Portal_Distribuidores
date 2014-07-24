<?php
    function header_pdf($orientation = 'portrait')
    {
    	$CI = & get_instance();
    	
    	$CI->cezpdf->selectFont('./recursos/fonts/Helvetica.afm');	
    	
    	$all = $CI->cezpdf->openObject();
    	$CI->cezpdf->saveState();
    	$CI->cezpdf->setStrokeColor(0,0,0,1);
        
    	$CI->cezpdf->ezSetMargins(50,70,50,50); // margenes del documento
        $CI->cezpdf->ezImage("./recursos/images/cabecera_correo.png", 0, 500, 5, 'left');
        //ob_end_clean();
        
        /*$CI->cezpdf->addText(228,798,10,"Colegio  Particular  Evang".utf8_decode("é")."lico");
        $CI->cezpdf->addText(235,770,14,"<b>&quot;La  Luz  de  Dios&quot;</b>");*/
	    
        
    	$CI->cezpdf->restoreState();
    	$CI->cezpdf->closeObject();
    	$CI->cezpdf->addObject($all,'all');
    }
	
    function footer_pdf($orientation = 'portrait')
    {   
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
    	$CI = & get_instance();
    	
    	$CI->cezpdf->selectFont('./recursos/fonts/Helvetica.afm');	
    	
    	$all = $CI->cezpdf->openObject();
    	$CI->cezpdf->saveState();
    	$CI->cezpdf->setStrokeColor(0,0,0,1);
        
    	if($orientation == 'portrait') {
    		$CI->cezpdf->ezSetMargins(50,70,50,50);
    		$CI->cezpdf->ezStartPageNumbers(540,28,8,'','{PAGENUM}',1);
			/*$CI->cezpdf->line(220,50,380,50);
            $CI->cezpdf->addText(278,40,8,'Secretaria');*/
    		$CI->cezpdf->addText(50,32,8,$meses[date('n')-1]."  " .date('d').",   ".date('y'));
    		$CI->cezpdf->addText(50,22,8,"    ".date('h:i:s a'));
			//$CI->cezpdf->ezImage("./recursos/images/footer_correo.png", 0, 500, 5, 'left');
    	}
    	else {
    		$CI->cezpdf->ezStartPageNumbers(750,28,8,'','{PAGENUM}',1);
    		$CI->cezpdf->line(20,40,800,40);
    		$CI->cezpdf->addText(50,32,8,'Printed on ' . date('m/d/Y h:i:s a'));
    		$CI->cezpdf->addText(50,22,8,'CI PDF Tutorial - http://www.christophermonnat.com');
    	}
        
    	$CI->cezpdf->restoreState();
    	$CI->cezpdf->closeObject();
    	$CI->cezpdf->addObject($all,'all');
    }

?>