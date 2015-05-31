<?php

class Employee {

	var $table = 'employee';

	function __construct() {

	}

	function insert( $name ) {
		$result = DB()->query( "INSERT INTO employee ( name ) VALUES ( '" . $name . "' )" );
		return $result;
	}

	function getAll() {
		$results = DB()->get_results( "SELECT * FROM employee" );
		return $result;
	}

	function getOne( $id ) {
		$result = DB()->get_row( 'SELECT * FROM employee WHERE id = ' . $id );
		return $result;
	}

}
