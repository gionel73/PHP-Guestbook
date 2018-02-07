<?php
function sanitize_vars(&$vars, $signatures) {
	$error = false;
	$tmp = array();
	foreach ( $signatures as $name => $sig ) {
		if ( isset( $sig['required'] ) && $sig['required'] ) {
			if( !isset( $vars[$name] ) || (isset( $vars[$name] ) && strlen(trim($vars[$name]) ) == 0 )) {
				$error =  "Parameter $name is empty";				
			}
		}

		$tmp[$name] = $vars[$name];
		if ( isset( $sig['type'] ) ) {
			settype( $tmp[$name], $sig['type'] );
        }

		if ( isset( $sig['function'] ) ) {
			$tmp[$name] = $sig['function']( $tmp[$name] );
		}
	}
	$vars = $tmp;
	return $error;
}

/*$sigs = array(
	'prod_id'	=> array('required' => true, 'type' => 'int'),
	'desc'		=> array('required' => true, 'type' => 'string', 'function'	=> 'addslashes')
);
sanitize_vars($_GET, $sigs, "error.php?cause=vars");*/