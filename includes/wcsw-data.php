<?php

/**
 * This file contains functions used to interact with the database records.
 *
 * @since    1.0.0
 */

namespace WCSW;

/**
 * Gets existing user data from the database as JSON.
 *
 * @since    1.0.0
 */
function get_raw_data() {

	return get_user_meta( get_current_user_id(), 'wcsw_data', true );

}

/**
 * Gets existing user data from the database as JSON and converts it to a PHP array before returning it.
 *
 * @since    1.0.0
 */
function get_data_array() {

	return json_decode( get_raw_data(), true );

}
