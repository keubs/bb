/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#000';

	//the next line add the new font to the combobox in CKEditor
	config.font_names = 'Archer/Archer SSm A", "Archer SSm B"' + config.font_names;
	config.font_names = 'Futura/futura-pt' + config.font_names;
};
