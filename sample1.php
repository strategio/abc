<?php

class Foo {
	/**
	 * @param int $id
	 *
	 * @return array|null
	 */
	private function getItems( $id ) {
		if ( $id ) {
			$items = get_post_meta( $id, 'the_key' );

			return is_array( $items ) ? $items : [];
		}

		return null;
	}

	public function convert($id) {
		$items = $this->getItems( $id );

		if ( $items ) {
			foreach ( $items as $item ) {
				convertItem( $item );
			}
		}

		return $items;
	}

	function upgrade( $id ) {
		$items = $this->getItems( $id );

		foreach ( $items as $item ) {
			upgradeItem( $item );
		}
	}
}
