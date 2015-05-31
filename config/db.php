<?php
include 'db';
$GLOBALS['db'] = new ezSQL_mysqli( 'root', 'root', 'khg', 'localhost' );

function DB() {
	return $GLOBALS['db'];
}
