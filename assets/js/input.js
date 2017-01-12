(function($){

	var file_frame;


	function initialize_field( $el ) {

		// background image select
		$('.acf-section-styles-background-image-select', $el).on('click', function( event ) {

			event.preventDefault();

			var el = $(this);

			var backgroundImageContainerEl = el.parents('.acf-section-styles-background-image-container'),
					backgroundImageInput = $('.acf-section-styles-background-image-input', backgroundImageContainerEl),
					backgroundImagePreview = $('.acf-section-styles-background-image-preview', backgroundImageContainerEl);

			file_frame = wp.media.frames.file_frame = wp.media({
				title: acf._e( 'section_styles', 'file_select_title' ),
				button: {
					text: acf._e( 'section_styles', 'file_select_text' )
				},
				library: { type : 'image' },
				multiple: false
			});

			file_frame.on( 'select', function() {
				attachment = file_frame.state().get('selection').first().toJSON();
				backgroundImageInput.val(attachment.id);
				backgroundImageContainerEl.addClass('has-value');
				backgroundImagePreview.attr('src', attachment.sizes.medium.url);
			});

			// Finally, open the modal
			file_frame.open();

		});

		// remove background image
		$('.acf-section-styles-background-image-remove', $el).on('click', function( event ) {

			event.preventDefault();

			var backgroundImageContainerEl = $(this).parents('.acf-section-styles-background-image-container'),
					backgroundImageInput = $('.acf-section-styles-background-image-input', backgroundImageContainerEl);

			backgroundImageInput.val('');
			backgroundImageContainerEl.removeClass('has-value');

		});

	}


	if ( typeof acf.add_action !== 'undefined' ) {

		acf.add_action('ready append', function( $el ){

			// search $el for fields of type 'section_styles'
			acf.get_fields({ type : 'section_styles'}, $el).each(function() {
				initialize_field( $(this) );
			});

		});


	} else {

		$(document).on('acf/setup_fields', function(e, postbox){

			$(postbox).find('.field[data-field_type="section_styles"]').each(function(){
				initialize_field( $(this) );
			});

		});

	}

})(jQuery);
jQuery(document).ready(function($){
	$('.layout').addClass('-collapsed');
  $('.layout .layout').addClass('-collapsed');

	$( ".layout .layout .acf-fc-layout-handle" ).live( "click", function() {
		$(this).parent().before( "<div class='acf-layout-modal-clickmask'></div>" );
		$(this).parent().addClass('openModal');
		$('.CodeMirror').each(function(i, el){
							el.CodeMirror.refresh();
					});
	});

	$( ".acf-layout-modal-clickmask" ).live( "click", function() {
		$(".openModal .acf-fc-layout-handle").click();

		//There should only be one background in existance
		$(".acf-layout-modal-clickmask").remove();
		$( ".openModal" ).removeClass('openModal');

	});

	var layouts = $('.acf-flexible-content .layout');
  layouts.each(function( key, value ) {

          var section_attribute = $(this).attr('data-layout');

          $(this).addClass(section_attribute);
  });

	var parent_layouts = $('.acf-field-flexible-content');
  parent_layouts.each(function( key, value ) {

          var section_attribute = $(this).attr('data-name');

          $(this).addClass(section_attribute);
  });
});
