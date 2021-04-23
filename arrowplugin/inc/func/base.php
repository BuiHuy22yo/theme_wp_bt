<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 3/29/2021
 * Time: 9:12 AM
 */

/**
 * Get config from library
 */
if ( ! function_exists( 'arrow_get_option' ) ) {
	function arrow_get_option( $option_name = '', $default = '', $name = '_arrow_options' ) {
		$options = get_option( $name );

		if ( ! empty( $option_name ) && ! empty( $options[ $option_name ] ) ) {
			return $options[ $option_name ];
		} else {
			return ( ! empty( $default ) ) ? $default : null;
		}

	}
}

/**
 * Get array value.
 */
if ( ! function_exists( 'Arrow_get_value_in_array' ) ) {
	function arrow_get_value_in_array( $array, $key, $default = null ) {
		return isset( $array[ $key ] ) ? $array[ $key ] : $default;
	}
}
