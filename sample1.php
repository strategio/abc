<?php

/**
 * @param int $id
 *
 * @return array|null
 */
function getItems( $id ) {
	if ( $id ) {
		$items = get_post_meta( $id, 'the_key' );

		return is_array( $items ) ? $items : [];
	}

	return null;
}

function convert($id) {
	$items = getItems( $id );

	if ( $items ) {
		foreach ( $items as $item ) {
			convertItem( $item );
		}
	}

	return $items;
}

function upgrade( $id ) {
	$items = getItems( $id );

	foreach ( $items as $item ) {
		upgradeItem( $item );
	}
}
