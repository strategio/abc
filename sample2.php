<?php

class ProductStrings {

	public function register( $product ) {
		$hash = md5( $product->type . '-' . $product->ID );

		if ( isset( $product->title ) ) {
			$this->registerStringInDb( $hash . '-title', $product->title );
		}

		if ( isset( $product->content ) ) {
			$this->registerStringInDb( $hash . '-content', $product->content );
		}

		if ( isset( $product->excerpt ) ) {
			$this->registerStringInDb( $hash . '-excerpt', $product->excerpt );
		}
	}

	public function translate( $product ) {
		$hash = md5( $product->type . '-' . $product->ID );

		if ( isset( $product->title ) ) {
			$product->title = $this->getStringTranslationFromDb( $hash . '-title' );
		}

		if ( isset( $product->content ) ) {
			$product->content = $this->getStringTranslationFromDb( $hash . '-content' );
		}

		if ( isset( $product->excerpt ) ) {
			$product->content = $this->getStringTranslationFromDb( $hash . '-excerpt' );
		}

		return $product;
	}

	private function registerStringInDb( $stringId, $value ) {
		/** @var \wpdb $wpdb */
		global $wpdb;

		$wpdb->query( "UPDATE {$wpdb->prefix}abc_strings SET value = '{$value}' WHERE ID = {$stringId}" );
	}

	private function getStringTranslationFromDb( $stringId ) {
		/** @var \wpdb $wpdb */
		global $wpdb;

		$wpdb->get_var( "SELECT translation FROM {$wpdb->prefix}abc_strings WHERE ID = {$stringId}" );
	}
}
