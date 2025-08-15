/**
 * Internal dependencies
 */
import {
	TRANSLATION_FUNCTIONS,
	getTranslateFunctionName,
	getTranslateFunctionArgs,
} from '../utils/index.js';

function isAcceptableLiteralNode( node ) {
	if ( node.type === 'BinaryExpression' ) {
		return (
			node.operator === '+' &&
			isAcceptableLiteralNode( node.left ) &&
			isAcceptableLiteralNode( node.right )
		);
	}

	if ( node.type === 'TemplateLiteral' ) {
		// Backticks are fine, but if there's any interpolation in it,
		// that's a problem.
		return node.expressions.length === 0;
	}

	return node.type === 'Literal';
}

export default {
	meta: {
		type: 'problem',
		schema: [],
		messages: {
			invalidArgument:
				'Translate function arguments must be string literals.',
		},
	},
	create( context ) {
		return {
			CallExpression( node ) {
				const { callee, arguments: args } = node;

				const functionName = getTranslateFunctionName( callee );

				if ( ! TRANSLATION_FUNCTIONS.has( functionName ) ) {
					return;
				}

				const candidates = getTranslateFunctionArgs(
					functionName,
					args
				);

				for ( const arg of candidates ) {
					if ( isAcceptableLiteralNode( arg ) ) {
						continue;
					}

					context.report( {
						node,
						messageId: 'invalidArgument',
					} );
				}
			},
		};
	},
};
