/**
 * Checks whether the passed package name is installed in the project.
 *
 * @param {string} packageName The name of npm package.
 * @return {boolean} Returns true when the package is installed or false otherwise.
 */
export const isPackageInstalled = ( packageName ) => {
	try {
		if ( import.meta.resolve( packageName ) ) {
			return true;
		}
	} catch ( error ) {
		// Package not found
	}

	return false;
};
