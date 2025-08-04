'use strict';

document.addEventListener( 'DOMContentLoaded', runSplideConfig, {
	once: true,
} );

function runSplideConfig() {
	const splideLists = document.querySelectorAll( '.splide__list' );

	if ( splideLists.length > 0 ) {
		// Add .splide__side class for slider items
		splideLists.forEach( ( list ) => {
			const splideListItems = list.querySelectorAll( 'li' );
			splideListItems.forEach( ( item ) => {
				item.classList.add( 'splide__slide' );
			} );
		} );

		// Configure Splide slider settings
		Splide.defaults = {
			type: 'loop',
			perPage: 1,
			arrows: false,
			autoplay: true,
			interval: 5000,
			speed: 1000,
		};

		// Create Splide slider
		new Splide( '.splide' ).mount();
	}
}
