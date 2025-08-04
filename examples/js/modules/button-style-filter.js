/**
 * Button Size Filter
 */
const { __ } = wp.i18n;
const { InspectorControls } = wp.blockEditor;
const {
	PanelBody,
	ColorPalette,
	__experimentalToggleGroupControl: ToggleGroupControl,
	__experimentalToggleGroupControlOption: ToggleGroupControlOption,
} = wp.components;
const { createHigherOrderComponent } = wp.compose;
const { Fragment, useState } = wp.element;
const { addFilter } = wp.hooks;

// --------------------------------------
// Add attributes to the Button block
// --------------------------------------
function addAttributes( settings, name ) {
	if ( name === 'core/button' ) {
		return {
			...settings,
			attributes: {
				...settings.attributes,
				buttonSize: {
					type: 'string',
					default: '',
				},
				buttonColor: {
					type: 'string',
					default: '',
				},
			},
		};
	}
	return settings;
}

addFilter( 'blocks.registerBlockType', 'banyan/add-attributes', addAttributes );

// -----------------------------------------------------
// Add new attributes editor control to the Button block
// -----------------------------------------------------
const withInspectorControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		const {
			attributes: { buttonSize, className },
			setAttributes,
			name,
		} = props;

		if ( name !== 'core/button' ) {
			return <BlockEdit { ...props } />;
		}

		const sizeClassRegex = /is-size-([\w-]+)/;
		const colorClassRegex = /is-color-([\w-]+)/;
		const hasCurrentColor = className.match( colorClassRegex );
		const currentColorName = hasCurrentColor ? hasCurrentColor[ 1 ] : '';
		const [ colorState, setColor ] = useState(
			currentColorName ? `var(--wp--preset--color--${ currentColorName })` : 'var(--wp--preset--color--primary)'
		);
		const colorOptions = [
			{
				name: __( 'Primary', 'banyan' ),
				color: 'var(--wp--preset--color--primary)',
			},
			{
				name: __( 'Secondary', 'banyan' ),
				color: 'var(--wp--preset--color--secondary)',
			},
			{
				name: __( 'Tertiary', 'banyan' ),
				color: 'var(--wp--preset--color--tertiary)',
			},
			{
				name: __( 'White', 'banyan' ),
				color: 'var(--wp--preset--color--white)',
			},
		];

		return (
			<Fragment>
				<BlockEdit { ...props } />
				<InspectorControls group="styles">
					<PanelBody title={ __( 'Color', 'banyan' ) } initialOpen={ true }>
						<ColorPalette
							clearable={ false }
							disableCustomColors
							colors={ colorOptions }
							value={ colorState }
							onChange={ ( color ) => {
								const colorName = color
									? colorOptions
											.find( ( colorOption ) => colorOption.color === color )
											.name.toLowerCase()
									: '';
								const colorClass = colorName ? `is-color-${ colorName }` : '';
								const hasPreviousColorClass = colorClassRegex.test( className );
								const classList = hasPreviousColorClass
									? className.replace( colorClassRegex, colorClass ).trim()
									: `${ className } ${ colorClass }`.trim();

								setColor( color );

								setAttributes( {
									buttonColor: colorName,
									className: classList,
								} );
							} }
						/>
					</PanelBody>

					<PanelBody title={ __( 'Size', 'banyan' ) } initialOpen={ true }>
						<ToggleGroupControl
							value={ buttonSize || 'medium' }
							label={ __( 'Button Size', 'banyan' ) }
							hideLabelFromVision
							isDeselectable
							isBlock
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							onChange={ ( value ) => {
								const sizeClass = value ? `is-size-${ value }` : '';
								const hasPreviousSizeClass = sizeClassRegex.test( className );
								const classList = hasPreviousSizeClass
									? className.replace( sizeClassRegex, sizeClass ).trim()
									: `${ className } ${ sizeClass }`.trim();

								setAttributes( {
									buttonSize: value,
									className: classList,
								} );
							} }
						>
							<ToggleGroupControlOption value="x-small" label={ __( 'XS' ) } />
							<ToggleGroupControlOption value="small" label={ __( 'S' ) } />
							<ToggleGroupControlOption value="medium" label={ __( 'M' ) } />
							<ToggleGroupControlOption value="large" label={ __( 'L' ) } />
							<ToggleGroupControlOption value="x-large" label={ __( 'XL' ) } />
						</ToggleGroupControl>
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withInspectorControl' );

addFilter( 'editor.BlockEdit', 'banyan/button-block/add-inspector-controls', withInspectorControl );
