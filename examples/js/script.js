'use strict';

document.addEventListener( 'DOMContentLoaded', runThemeScript, { once: true } );

function runThemeScript() {
	modifyHeaderMenu();
	replaceNotButtonATagWithPTag();
	setArticleBoxHeight();
	printYears();
}

//-------------------------------------------
// MODIFY HEADER MENU
//-------------------------------------------
function modifyHeaderMenu() {
	const siteWrapper = document.querySelector( '#site-wrapper' );
	const siteCanvas = document.querySelector( '#site-canvas' );
	const siteHeader = document.querySelector( '.site-header' );
	const headerContainer = document.querySelector( '.header-container' );
	const headerTopbar = document.querySelector( '.header-topbar' );
	const headerContainerInner = document.querySelector(
		'.header-container__inner'
	);
	const headerLogoContainer = document.querySelector(
		'.header-logo-container'
	);
	const headerMenuContainer = document.querySelector(
		'.header-menu-container'
	);
	const headerContainerInnerResizeObserver = new ResizeObserver(
		onHeaderContainerInnerResize
	);
	const mobileMenuButtons = document.querySelectorAll( '.header-menu-btn' );
	let userFontSizeRatio = getUserBrowserFontSizeSetting();
	let desktopHeightsTimeoutID;
	let fullHeightTimeoutID;

	headerContainerInnerResizeObserver.observe( headerContainerInner );
	updateFullHeightSize();

	function onHeaderContainerInnerResize() {
		userFontSizeRatio = getUserBrowserFontSizeSetting();

		if ( Math.floor( window.innerWidth / userFontSizeRatio ) < 1140 ) {
			// Mobile resize
			if ( ! siteHeader.classList.contains( 'isMobile' ) ) {
				activateMobileHeader();
			}
		} else {
			// Desktop resize
			if ( ! siteHeader.classList.contains( 'isDesktop' ) ) {
				activateDesktopHeader();
			}

			clearTimeout( desktopHeightsTimeoutID );
			desktopHeightsTimeoutID = setTimeout( () => {
				getStickyHeaderHeight();
				getTopbarHeight();
			}, 100 );
		}

		// Resize full-height sections
		clearTimeout( fullHeightTimeoutID );
		fullHeightTimeoutID = setTimeout( updateFullHeightSize, 100 );
	}

	function activateDesktopHeader() {
		if ( siteHeader.classList.contains( 'isMobile' ) ) {
			moveElementsForDesktop();
			closeMobileMenu();
			removeMobileEventListeners();
			siteHeader.classList.remove( 'isMobile' );
		}
		siteHeader.classList.add( 'isDesktop' );
	}

	function activateMobileHeader() {
		moveElementsForMobile();
		addMobileEventListeners();
		siteHeader.classList.add( 'isMobile' );
		siteHeader.classList.remove( 'isDesktop' );

		// Set sticky header height to 0 on mobile
		const stickyCSS = document.querySelector( '.sticky-css' );
		if ( stickyCSS ) {
			stickyCSS.innerHTML = `html { --sticky-header--height: 0px; }`;
		}
	}

	function moveElementsForMobile() {
		// Move .header-logo-container before .header-topbar
		headerContainer.insertBefore( headerLogoContainer, headerTopbar );
	}
	function moveElementsForDesktop() {
		// Move .header-logo-container back inside .header-container__inner
		headerContainerInner.insertBefore(
			headerLogoContainer,
			headerMenuContainer
		);
	}

	function toggleMobileMenu() {
		siteWrapper.classList.toggle( 'show-nav' );
		siteCanvas.classList.toggle( 'active' );
		mobileMenuButtons.forEach( ( button ) =>
			button.classList.toggle( 'active' )
		);
	}

	function closeMobileMenuOnEsc( e ) {
		if ( e.key === 'Escape' ) {
			closeMobileMenu();
		}
	}

	function closeMobileMenu() {
		siteWrapper.classList.remove( 'show-nav' );
		siteCanvas.classList.remove( 'active' );
		mobileMenuButtons.forEach( ( button ) =>
			button.classList.remove( 'active' )
		);
	}

	function addMobileEventListeners() {
		document.addEventListener( 'keydown', closeMobileMenuOnEsc );

		mobileMenuButtons.forEach( ( button ) => {
			button.addEventListener( 'click', toggleMobileMenu );
		} );
	}

	function removeMobileEventListeners() {
		document.removeEventListener( 'keydown', closeMobileMenuOnEsc );

		mobileMenuButtons.forEach( ( button ) => {
			button.removeEventListener( 'click', toggleMobileMenu );
		} );
	}
}

//-------------------------------------------
// GET BROWSER FONT-SIZE USER SETTING
//-------------------------------------------
function getUserBrowserFontSizeSetting() {
	const testEl = document.createElement( 'div' );
	testEl.style.width = '1rem';
	testEl.style.display = 'none';
	document.body.append( testEl );

	const widthMatch = window
		.getComputedStyle( testEl )
		.getPropertyValue( 'width' )
		.match( /^(\d*\.?\d*)px$/ );

	testEl.remove();

	if ( ! widthMatch || widthMatch.length < 1 ) {
		return null;
	}

	const result = Number( widthMatch[ 1 ] );
	return ! isNaN( result ) ? result / 16 : null;
}

//-------------------------------------------
// ADD CSS VARIABLE FOR STICKY HEADER HEIGHT
//-------------------------------------------
function getStickyHeaderHeight() {
	if ( document.readyState === 'complete' ) {
		setStickyHeaderHeight();
	} else {
		window.addEventListener( 'load', setStickyHeaderHeight, {
			once: true,
		} );
	}

	function setStickyHeaderHeight() {
		const stickyHeader = document.querySelector(
			'.header-container__inner'
		);
		const stickyHeaderHeight = stickyHeader.offsetHeight;
		let stickyCSS = document.querySelector( '.sticky-css' );
		if ( stickyCSS ) {
			stickyCSS.innerHTML = `html { --sticky-header--height: ${ stickyHeaderHeight }px; }`;
		} else {
			stickyCSS = document.createElement( 'style' );
			stickyCSS.classList.add( 'sticky-css' );
			stickyCSS.innerHTML = `html { --sticky-header--height: ${ stickyHeaderHeight }px; }`;
			document.head.appendChild( stickyCSS );
		}
	}
}

//-------------------------------------------
// ADD CSS VARIABLE FOR TOPBAR HEIGHT
//-------------------------------------------
function getTopbarHeight() {
	if ( document.readyState === 'complete' ) {
		setTopbarHeight();
	} else {
		window.addEventListener( 'load', setTopbarHeight, { once: true } );
	}

	function setTopbarHeight() {
		const topbar = document.querySelector( '.header-topbar' );
		const topbarHeight = topbar.offsetHeight;
		let topbarCSS = document.querySelector( '.topbar-css' );
		if ( topbarCSS ) {
			topbarCSS.innerHTML = `html { --topbar--height: ${ topbarHeight }px; }`;
		} else {
			topbarCSS = document.createElement( 'style' );
			topbarCSS.classList.add( 'topbar-css' );
			topbarCSS.innerHTML = `html { --topbar--height: ${ topbarHeight }px; }`;
			document.head.appendChild( topbarCSS );
		}
	}
}

//-----------------------------------------------
// ADD CSS VARIABLES FOR FULL HEIGHT COVER BLOCKS
//-----------------------------------------------
function updateFullHeightSize() {
	const coverBlocks = document.querySelectorAll( '.wp-block-cover' );

	// Check each cover block for full height setting and adjust if needed
	if ( coverBlocks.length > 0 ) {
		const entryContent = document.querySelector( '.entry-content' );
		let entryContentFirstChild;

		if ( entryContent ) {
			entryContentFirstChild = entryContent.firstElementChild;
		}

		coverBlocks.forEach( ( coverBlock ) => {
			const coverBlockMinHeight = coverBlock.style.minHeight;
			let isFullHeightBlock;
			let isCoverBlockFirst;

			// Check if cover block is full height
			if ( coverBlockMinHeight === '100vh' ) {
				isFullHeightBlock = true;
			}

			// Check if cover block is entry's first element
			if ( entryContentFirstChild === coverBlock ) {
				isCoverBlockFirst = true;
			}

			// Add full height class
			if ( isFullHeightBlock && isCoverBlockFirst ) {
				coverBlock.classList.add( 'is-full-height-first' );
			} else if ( isFullHeightBlock ) {
				coverBlock.classList.add( 'is-full-height' );
			}
		} );

		if ( document.readyState === 'complete' ) {
			setFullHeightOffset();
		} else {
			window.addEventListener( 'load', setFullHeightOffset, {
				once: true,
			} );
		}
	}

	function setFullHeightOffset() {
		const siteHeader = document.querySelector( '.site-header' );
		const isDesktopHeader = siteHeader.classList.contains( 'isDesktop' );
		const isMobileHeader = siteHeader.classList.contains( 'isMobile' );
		const headerMobile = document.querySelector( '.mobile-logo-container' );
		let offsetHeight;

		if ( isDesktopHeader ) {
			offsetHeight = siteHeader.offsetHeight;
		}

		if ( isMobileHeader ) {
			offsetHeight = headerMobile.offsetHeight;
		}

		// Add script with full-height offset css variables
		let fullHeightOffsetCSS = document.querySelector(
			'.site-header-offset-css'
		);
		if ( fullHeightOffsetCSS ) {
			fullHeightOffsetCSS.innerHTML = `html { --site-header--height: ${ offsetHeight }px; }`;
		} else {
			fullHeightOffsetCSS = document.createElement( 'style' );
			fullHeightOffsetCSS.classList.add( 'site-header-offset-css' );
			fullHeightOffsetCSS.innerHTML = `html { --site-header--height: ${ offsetHeight }px; }`;
			document.head.appendChild( fullHeightOffsetCSS );
		}
	}
}

//------------------------------------------
// REPLACE <A> TAG WITH <P> TAG FOR .NOT-BTN
//------------------------------------------
// Example: Used on product page buttons
function replaceNotButtonATagWithPTag() {
	const notButtons = document.querySelectorAll( '.not-btn' );
	if ( notButtons.length > 0 ) {
		notButtons.forEach( ( notBtn ) => {
			const aTag = notBtn.querySelector( 'a' );
			const pTag = document.createElement( 'p' );
			pTag.innerHTML = aTag.innerHTML;
			pTag.className = aTag.className;
			pTag.classList.remove( 'wp-block-button__link' );
			pTag.classList.remove( 'wp-element-button' );
			notBtn.classList.remove( 'wp-block-button' );
			notBtn.replaceChild( pTag, aTag );
		} );
	}
}

//-------------------------------------------
// PRINT YEARS
//-------------------------------------------
// Example: Used on /services/energy-procurement/ page
function printYears() {
	const previousYears = document.querySelectorAll( '.previousYear' );
	const currentYears = document.querySelectorAll( '.currentYear' );
	const year = new Date().getFullYear();

	if ( previousYears.length > 0 ) {
		previousYears.forEach( ( previousYear ) => {
			previousYear.innerHTML = year - 1;
		} );
	}

	if ( currentYears.length > 0 ) {
		currentYears.forEach( ( currentYear ) => {
			currentYear.innerHTML = year;
		} );
	}
}

//----------------------------------------------------------------
// SET HEIGHT OF ARTICLE BOX HEADER (FOR HOMEPAGE RECENT ARTICLES)
//----------------------------------------------------------------
function setArticleBoxHeight() {
	const articleBoxHeaders = document.querySelectorAll(
		'.article-box__header'
	);
	const articleBoxWidthObserver = new ResizeObserver(
		updateArticleBoxHeight
	);

	if ( articleBoxHeaders.length > 0 ) {
		articleBoxWidthObserver.observe( articleBoxHeaders[ 0 ] );
	}

	function updateArticleBoxHeight() {
		let tallestHeight = 0;

		setTimeout( () => {
			// Remove any preset heights
			articleBoxHeaders.forEach( ( box ) => {
				if ( box.style.height ) {
					box.style.removeProperty( 'height' );
				}
			} );
			// Get tallest height
			articleBoxHeaders.forEach( ( box ) => {
				if ( box.offsetHeight > tallestHeight ) {
					tallestHeight = box.offsetHeight;
				}
			} );
			// Set all heights to match tallest
			articleBoxHeaders.forEach( ( box ) => {
				box.style.height = `${ tallestHeight }px`;
			} );
		}, 100 );
	}
}
