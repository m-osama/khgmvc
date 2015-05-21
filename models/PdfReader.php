<?php

function get_names_from_pdf( $pdf_path ) {

	// Include 'Composer' autoloader.
	include 'vendor/autoload.php';

	// Parse pdf file and build necessary objects.
	$parser = new \Smalot\PdfParser\Parser();
	$pdf    = $parser->parseFile( $pdf_path );

	$text = $pdf->getText();


	$i = preg_match_all( '#([a-z ]{3,}) (\d+)\s([\d ]+)#i', $text, $matches );

	$data = $matches[0];

	$output = array();

	foreach( $data as $line ) {
		$tmp = preg_replace( '#\n#', ' ', $line );
		preg_match( '#[a-z ]{3,}#i', $tmp, $name );
		preg_match_all( '#\d+#', $tmp, $numbers );
		$name = trim( $name[0] );
		$numbers = $numbers[0];
		$output[ $name ] = $numbers;
	}

	return $output;

}
