/**
 * @file
 *  Helper JS to set dynamically generated styles for CKEditor.
 */


var CKEDITOR = CKEDITOR || false;

if (CKEDITOR) {
  // Add each styleset (defined by the module) to CKEDITOR.
  var undpaul = Drupal.settings.ckeditor_styles;
  console.log(Drupal.settings.ckeditor_styles);
  jQuery.each(undpaul, function(styleset, specs) {
    CKEDITOR.addStylesSet( 'drupal', [  
    	{ name : 'Heading 2' , element : 'h2' }, 
    	{ name : 'Heading 3' , element : 'h3' }, 
    	{ name : 'Heading 4' , element : 'h4' }, 
    	{ name : 'Paragraph' , element : 'p' }, 
		{ name : 'Green Button', element : 'div', attributes : { 'class' : 'ncbc-green-button' } }, 
		{ name : 'Blue Image Button', element : 'div', attributes : { 'class' : 'ncbc-image-button' } }, 
		{ name : 'Inline Quotation' , element : 'q' }, 
		{ name : 'Highlighted Row', element : 'tr', attributes : { 'class' : 'ncbc-highlighted-row' } } 
	]);
  });
}
