/**
 * Unregister block variations.
 */

import domReady from '@wordpress/dom-ready';
import {
	getBlockVariations,
	unregisterBlockVariation,
} from '@wordpress/blocks';

const allowedEmbedBlocks = [ 'youtube' ];

domReady( () => {
	const embedVariations = getBlockVariations( 'core/embed' );

	// Unregister selected Embed block variations.
	embedVariations.forEach( ( { name } ) => {
		if ( ! allowedEmbedBlocks.includes( name ) ) {
			unregisterBlockVariation( 'core/embed', name );
		}
	} );
} );
