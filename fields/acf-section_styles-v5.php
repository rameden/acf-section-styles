<?php

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if ( !class_exists('acf_field_section_styles') ) :

	class acf_field_section_styles extends acf_field {

		/*
		*  __construct
		*
		*  This function will setup the field type data
		*
		*  @type	function
		*  @date	5/03/2014
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/

		function __construct( $settings ) {

			$this->name = 'section_styles';
			$this->label = __( 'Section Styles', 'acf-section_styles' );
			$this->category = apply_filters( 'acf_section_styles_category', 'Appearance' );

			$this->l10n = array(
				'file_select_title'	=> __( 'Select background image', 'acf-section_styles' ),
				'file_select_text'	=> __( 'Select image', 'acf-section_styles' ),
			);

			$this->defaults = array(
				'padding_top'				=> '0',
				'padding_right'			=> '0',
				'padding_bottom'		=> '0',
				'padding_left'			=> '0',
				'background_style'	=> __( 'default' ),
				'section_width'	=> __( 'default' ),
			);
			//margin top options
			$this->margin_top_options = apply_filters( 'acf_section_styles_margin_options', array(
				''						   						=> __( 'Default', 'acf-section_styles' ),
				'uk-margin-remove-top'			=> __( 'Remove', 'acf-section_styles' ),
				'uk-margin-small-top'		   	=> __( 'Small', 'acf-section_styles' ),
				'uk-margin-medium-top'			=> __( 'Medium', 'acf-section_styles' ),
				'uk-margin-large-top'			  => __( 'Large', 'acf-section_styles' ),
			) );

			//margin right options
			$this->margin_right_options = apply_filters( 'acf_section_styles_margin_options', array(
				''						   						  => __( 'Default', 'acf-section_styles' ),
				'uk-margin-remove-right'			=> __( 'Remove', 'acf-section_styles' ),
				'uk-margin-small-right'		   	=> __( 'Small', 'acf-section_styles' ),
				'uk-margin-medium-right'			=> __( 'Medium', 'acf-section_styles' ),
				'uk-margin-large-right'			  => __( 'Large', 'acf-section_styles' ),
			) );

			//margin bottom options
			$this->margin_bottom_options = apply_filters( 'acf_section_styles_margin_options', array(
				''						   					    	=> __( 'Default', 'acf-section_styles' ),
				'uk-margin-remove-bottom'		  	=> __( 'Remove', 'acf-section_styles' ),
				'uk-margin-small-bottom'		   	=> __( 'Small', 'acf-section_styles' ),
				'uk-margin-medium-bottom'		  	=> __( 'Medium', 'acf-section_styles' ),
				'uk-margin-large-bottom'			  => __( 'Large', 'acf-section_styles' ),
			) );

			//margin left options
			$this->margin_left_options = apply_filters( 'acf_section_styles_margin_options', array(
				''						   					  	=> __( 'Default', 'acf-section_styles' ),
				'uk-margin-remove-left'			  => __( 'Remove', 'acf-section_styles' ),
				'uk-margin-small-left'		   	=> __( 'Small', 'acf-section_styles' ),
				'uk-margin-medium-left'			  => __( 'Medium', 'acf-section_styles' ),
				'uk-margin-large-left'			  => __( 'Large', 'acf-section_styles' ),
			) );

			//background colors
			$this->background_color_options = apply_filters( 'acf_section_styles_background_color_options', array(
				''							=> __( 'None', 'acf-section_styles' ),
				'#color1'  			=> __( 'Background 1', 'acf-section_styles' ),
				'#color2'  			=> __( 'Background 2', 'acf-section_styles' ),
				'#color3'  			=> __( 'Background 3', 'acf-section_styles' ),
				'#color4'  			=> __( 'Background 4', 'acf-section_styles' ),
			) );

			$this->background_style_options = apply_filters( 'acf_section_styles_background_style_options', array(
				'default'		=> __( 'Theme Default', 'acf-section_styles' ),
				'cover'			=> __( 'Cover', 'acf-section_styles' ),
				'contain'		=> __( 'Contain', 'acf-section_styles' ),
				'no-repeat'	=> __( 'No Repeat', 'acf-section_styles' ),
				'repeat'		=> __( 'Repeat', 'acf-section_styles' )
			) );

			$this->background_position_options_1 = apply_filters( 'acf_section_styles_background_position_options_1', array(
				'top'			=> __( 'Top', 'acf-section_styles' ),
				'center'	=> __( 'Center', 'acf-section_styles' ),
				'bottom'	=> __( 'Bottom', 'acf-section_styles' )
			) );

			$this->background_position_options_2 = apply_filters( 'acf_section_styles_background_position_options_2', array(
				'left'		=> __( 'Left', 'acf-section_styles' ),
				'center'	=> __( 'Center', 'acf-section_styles' ),
				'right'		=> __( 'Right', 'acf-section_styles' )
			) );

			$this->section_width_options = apply_filters( 'acf_section_styles_section_width_options', array(
				'default'  			=> __( 'Default', 'acf-section_styles' ),
				'narrow'  			=> __( 'Narrow', 'acf-section_styles' ),
				'full_width'  			=> __( 'Full Width', 'acf-section_styles' ),
			) );

			//Grid Options

			//Grid Gutter Options
			$this->grid_gutter_options = apply_filters( 'acf_section_styles_grid_gutter_options', array(
				''						   					  	=> __( 'Default', 'acf-section_styles' ),
				'uk-grid-collapse'						=> __( 'Collapse Gutter', 'acf-section_styles' ),
				'uk-grid-small'						   	=> __( 'Small Gutter', 'acf-section_styles' ),
				'uk-grid-medium'						  => __( 'Medium Gutter', 'acf-section_styles' ),
				'uk-grid-large'						   	=> __( 'Large Gutter', 'acf-section_styles' ),

			) );

			$this->grid_divider_options = apply_filters( 'acf_section_styles_grid_divider_options', array(
				''						   					 	=> __( 'No', 'acf-section_styles' ),
				'uk-grid-divider'						=> __( 'Yes', 'acf-section_styles' ),
			) );

			$this->grid_match_height_options = apply_filters( 'acf_section_styles_match_height_options', array(
				''						   					 	=> __( 'No', 'acf-section_styles' ),
				'data-uk-grid-match'				=> __( 'Yes', 'acf-section_styles' ),
			) );

			$this->settings = $settings;

			// do not delete!
			parent::__construct();

		}

		/*
		*  render_field_settings()
		*
		*  Create extra settings for your field. These are visible when editing a field
		*
		*  @type	action
		*  @since	3.6
		*  @date	23/01/13
		*
		*  @param	$field (array) the $field being edited
		*  @return	n/a
		*/

function render_field_settings( $field ) {

// Default margins
acf_render_field_wrap(array(
	'type'					=> 'select',
	'name'					=> 'margin_top',
	'choices'				=> $this->margin_top_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['margin_top'],
	'prepend'				=> __( 'top', 'acf-section_styles' ),
	'wrapper'				=> array(
		'data-name' 	=> 'margin-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'select',
	'name'					=> 'margin_right',
	'choices'				=> $this->margin_right_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['margin_right'],
	'prepend'				=> __( 'right', 'acf-section_styles' ),
	'wrapper'				=> array(
		'data-name' 	=> 'margin-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'select',
	'name'					=> 'margin_bottom',
	'choices'				=> $this->margin_bottom_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['margin_bottom'],
	'prepend'				=> __( 'bottom', 'acf-section_styles' ),
	'wrapper'				=> array(
		'data-name' 	=> 'margin-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'select',
	'name'					=> 'margin_left',
	'choices'				=> $this->margin_left_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['margin_left'],
	'prepend'				=> __( 'left', 'acf-section_styles' ),
	'wrapper'				=> array(
		'data-name' 	=> 'margin-wrapper'
	)
), 'tr');

//Grid Gutter
acf_render_field_wrap(array(
	'label'					=> __( 'Default Grid Gutter', 'acf-section_styles' ),
	'type'					=> 'select',
	'name'					=> 'grid_gutter',
	'choices'				=> $this->grid_gutter_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['grid_gutter'],
	'wrapper'				=> array(
		'data-name' 	=> 'grid-gutter-wrapper'
	)
), 'tr');

//Grid Divider
acf_render_field_wrap(array(
	'label'					=> __( 'Default Grid Gutter', 'acf-section_styles' ),
	'type'					=> 'select',
	'name'					=> 'grid_divider',
	'choices'				=> $this->grid_divider_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['grid_divider'],
	'wrapper'				=> array(
		'data-name' 	=> 'grid-divider-wrapper'
	)
), 'tr');

//Grid Match Height
acf_render_field_wrap(array(
	'label'					=> __( 'Default Grid Match Height', 'acf-section_styles' ),
	'type'					=> 'select',
	'name'					=> 'grid_match_height',
	'choices'				=> $this->grid_match_height_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['grid_match_height'],
	'wrapper'				=> array(
		'data-name' 	=> 'grid-match-height-wrapper'
	)
), 'tr');

// Default padding
acf_render_field_wrap(array(
	'label'					=> __( 'Default Padding', 'acf-section_styles' ),
	'type'					=> 'text',
	'name'					=> 'padding_top',
	'prefix'				=> $field['prefix'],
	'value'					=> $field['padding_top'],
	'prepend'				=> __( 'top', 'acf-section_styles' ),
	'wrapper'				=> array(
		'data-name' 	=> 'padding-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'text',
	'name'					=> 'padding_right',
	'prefix'				=> $field['prefix'],
	'value'					=> $field['padding_right'],
	'prepend'				=> __( 'right', 'acf'),
	'wrapper'				=> array(
		'data-append' => 'padding-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'text',
	'name'					=> 'padding_bottom',
	'prefix'				=> $field['prefix'],
	'value'					=> $field['padding_bottom'],
	'prepend'				=> __( 'bottom', 'acf' ),
	'wrapper'				=> array(
		'data-append' => 'padding-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'text',
	'name'					=> 'padding_left',
	'prefix'				=> $field['prefix'],
	'value'					=> $field['padding_left'],
	'prepend'				=> __( 'left', 'acf' ),
	'wrapper'				=> array(
		'data-append' => 'padding-wrapper'
	)
), 'tr');

// Default background styles
acf_render_field_wrap(array(
	'label'					=> __( 'Default Background Color', 'acf-section_styles' ),
	'type'					=> 'select',
	'name'					=> 'background_color',
	'choices'				=> $this->background_color_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['background_color'],
	'wrapper'				=> array(
		'data-name' 	=> 'background-color-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'label'					=> __( 'Default Background Style', 'acf-section_styles' ),
	'type'					=> 'select',
	'name'					=> 'background_style',
	'choices'				=> $this->background_style_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['background_style'],
	'wrapper'				=> array(
		'data-name' 	=> 'background-settings-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'label'					=> __( 'Default Background Position', 'acf-section_styles' ),
	'type'					=> 'select',
	'name'					=> 'background_position_1',
	'choices'				=> $this->background_position_options_1,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['background_position_1'],
	'wrapper'				=> array(
		'data-name' 	=> 'background-position-wrapper'
	)
), 'tr');

acf_render_field_wrap(array(
	'type'					=> 'select',
	'name'					=> 'background_position_2',
	'choices'				=> $this->background_position_options_2,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['background_position_2'],
	'wrapper'				=> array(
		'data-append' => 'background-position-wrapper'
	)
), 'tr');

// Default Section Width
acf_render_field_wrap(array(
	'type'					=> 'select',
	'name'					=> 'section_width',
	'choices'				=> $this->section_width_options,
	'prefix'				=> $field['prefix'],
	'value'					=> $field['section_width'],
	'wrapper'				=> array(
		'data-name' 	=> 'section-width-wrapper'
	)
), 'tr');
}

/*
*  render_field()
*
*  Create the HTML interface for your field
*
*  @param	$field (array) the $field being rendered
*
*  @type	action
*  @since	3.6
*  @date	23/01/13
*
*  @param	$field (array) the $field being edited
*  @return	n/a
*/

function render_field( $field ) {

/*$main_builder = "main_builder";
$main_builder_object = get_field_object($main_builder);

foreach($main_builder_object['layouts'] as $layout){
	echo $layout['name'].' '.$layout['key'].'<br>';
}
echo '<pre>';
	print_r($field);
echo '</pre>';*/

$field_id	= $field['ID'];
echo 'Field ID: '.$field_id;
$layout = '';

switch ($field_id) {
	case "31":
		$layout = "html";
	break;
	case "88":
		$layout = "grid";
	break;
	case "30":
		$layout = "hero";
	break;
	case "31":
		$layout = "tiles";
	break;
	case "32":
		$layout = "carousel";
	break;
	case "33":
		$layout = "cta";
	break;
}

// if values are empty fetch defaults
if ( empty( $field['value'] ) ) {
	$field['value']['padding_top'] = $field['padding_top'];
	$field['value']['padding_right'] = $field['padding_right'];
	$field['value']['padding_bottom'] = $field['padding_bottom'];
	$field['value']['padding_left'] = $field['padding_left'];
	$field['value']['background_color'] = $field['background_color'];
	$field['value']['background_style'] = $field['background_style'];
	$field['value']['section_width'] = $field['section_width'];
}
?>

<div class="acf-section-styles-container" tabindex="-1">

<!-- Box Model -->
<div class="acf-section-styles-box-model">
	<div class="acf-section-width-options">
		<div class="acf-label">
			<label for="<?php echo $field['id']; ?>_section_width"><?php _e( 'Section Width', 'acf-section_styles' ); ?></label>
		</div>

		<select class="section_width" id="<?php echo $field['id']; ?>_section_width" name="<?php echo esc_attr($field['name']) ?>[section_width]">
			<?php foreach ( $this->section_width_options as $v => $label ): ?>
				<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['section_width'] ) && $field['value']['section_width'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="acf-section-styles-margin acf-section-style-param">
		<!-- Margin -->
		<div class="acf-label">
			<label for="<?php echo $field['id']; ?>_margin"><?php _e( 'Margin', 'acf-section_styles' ); ?></label>
		</div>

		<!-- Top Margin -->
		<select class="top select-gui" id="<?php echo $field['id']; ?>_margin_top" name="<?php echo esc_attr($field['name']) ?>[margin_top]">
			<?php foreach ( $this->margin_top_options as $v => $label ): ?>
				<option value="<?php echo $v; ?>"<?php if ( $field['value']['margin_top'] == ($v) ) echo ' selected'; ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
		</select>

		<!-- Right Margin -->
		<select class="right select-gui" id="<?php echo $field['id']; ?>_margin_right" name="<?php echo esc_attr($field['name']) ?>[margin_right]">
			<?php foreach ( $this->margin_right_options as $v => $label ): ?>
				<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['margin_right'] ) && $field['value']['margin_right'] == ($v) ) echo ' selected'; ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
		</select>

		<!-- Bottom Margin -->
		<select class="bottom select-gui" id="<?php echo $field['id']; ?>_margin_bottom" name="<?php echo esc_attr($field['name']) ?>[margin_bottom]">
			<?php foreach ( $this->margin_bottom_options as $v => $label ): ?>
				<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['margin_bottom'] ) && $field['value']['margin_bottom'] == ($v) ) echo ' selected'; ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
		</select>

		<!-- Left Margin -->
		<select class="left select-gui" id="<?php echo $field['id']; ?>_margin_left" name="<?php echo esc_attr($field['name']) ?>[margin_left]">
			<?php foreach ( $this->margin_left_options as $v => $label ): ?>
				<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['margin_left'] ) && $field['value']['margin_left'] == ($v) ) echo ' selected'; ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
		</select>
		<!-- End Margin -->

		<div id="<?php echo $field['id']; ?>_padding_container" class="acf-section-styles-padding acf-section-style-param"<?php if ( !empty( $field['value']['background_color'] ) ) echo ' style="background-color: ' . $field['value']['background_color'] . '"'; ?>>
		<!-- Padding -->
		<div class="acf-label">
			<label for="<?php echo $field['id']; ?>_padding"><?php _e( 'Padding', 'acf-section_styles' ); ?></label>
		</div>

		<!-- Padding Top -->
		<input  id="<?php echo $field['id']; ?>_padding" class="top" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_top]" value="<?php if ( !empty( $field['value']['padding_top'] ) ) echo $field['value']['padding_top']; ?>" />

		<!-- Padding Right -->
		<input class="right" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_right]" value="<?php if ( !empty( $field['value']['padding_right'] ) ) echo $field['value']['padding_right']; ?>" />

		<!-- Padding Bottom -->
		<input class="bottom" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_bottom]" value="<?php if ( !empty( $field['value']['padding_bottom'] ) ) echo $field['value']['padding_bottom']; ?>" />

		<!-- Padding Left -->
		<input class="left" placeholder="&ndash;" min="0" name="<?php echo esc_attr($field['name']) ?>[padding_left]" value="<?php if ( !empty( $field['value']['padding_left'] ) ) echo $field['value']['padding_left']; ?>" />

		</div> <!-- End .acf-section-styles-padding -->
	</div> <!-- End .acf-section-styles-margin -->
</div>
<!-- End Box Model -->

<!-- Style Options -->
<!-- Background Color -->
<div class="acf-section-styles-options">
	<div class="acf-section-styles-options-inner-container">
		<div class="acf-section-styles-options-inner">
	<div class="acf-label">
		<label for="<?php echo $field['id']; ?>_bakground_color"><?php _e( 'Section Background Color', 'acf-section_styles' ); ?></label>
	</div>

<select class="background-color" id="<?php echo $field['id']; ?>_background_color" name="<?php echo esc_attr($field['name']) ?>[background_color]">
	<?php foreach ( $this->background_color_options as $v => $label ): ?>
		<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_color'] ) && $field['value']['background_color'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
	<?php endforeach; ?>
</select>
<?php

switch ($layout) {
	case "html":
		echo 'HTML Styles Here';
	break;
	case "grid":
?>
<div class="acf-label pb-margin-top">
	<label for="<?php echo $field['id'].'_grid_gutter';?>"><?php _e( 'Grid Gutter', 'acf-section_styles' ); ?></label>
</div>
<select class="grid_gutter" id="<?php echo $field['id']; ?>_grid_gutter" name="<?php echo esc_attr($field['name']) ?>[grid_gutter]">
	<?php foreach ( $this->grid_gutter_options as $v => $label ): ?>
		<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['grid_gutter'] ) && $field['value']['grid_gutter'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
	<?php endforeach; ?>
</select>

<div class="acf-label pb-margin-top">
	<label for="<?php echo $field['id'].'_grid_divider';?>"><?php _e( 'Grid Divider', 'acf-section_styles' ); ?></label>
</div>
<select class="grid_gutter" id="<?php echo $field['id']; ?>_grid_gutter" name="<?php echo esc_attr($field['name']) ?>[grid_divider]">
	<?php foreach ( $this->grid_divider_options as $v => $label ): ?>
		<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['grid_divider'] ) && $field['value']['grid_divider'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
	<?php endforeach; ?>
</select>

<div class="acf-label pb-margin-top">
	<label for="<?php echo $field['id'].'_grid_divider';?>"><?php _e( 'Grid Height Match', 'acf-section_styles' ); ?></label>
</div>
<select class="grid_match_height" id="<?php echo $field['id']; ?>_grid_match_height" name="<?php echo esc_attr($field['name']) ?>[grid_match_height]">
	<?php foreach ( $this->grid_match_height_options as $v => $label ): ?>
		<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['grid_match_height'] ) && $field['value']['grid_match_height'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
	<?php endforeach; ?>
</select>
<?php
	break;
	case "hero":
		echo 'Hero Styles Here';
	break;
	case "tiles":
		echo 'Tile Styles Here';
	break;
	case "carousel":
		echo 'Carousel Styles Here';
	break;
	case "cta":
		echo 'CTA Styles Here';
	break;
}
?>
</div>
<div class="acf-section-styles-options-inner">
	<!-- Background Image -->
	<?php
	$div = array(
		'class'	=> 'acf-section-styles-background-image-container',
	);

	$url = '';

	if ( $field['value']['background_image'] ) {

		// update vars
		$url = wp_get_attachment_image_src($field['value']['background_image'], 'medium');

		// url exists
		if ( $url ) {
			$url = $url[0];
			$div['class'] .= ' has-value';
		}
	}
	?>
	<div <?php acf_esc_attr_e( $div ); ?>>
		<div class="acf-label">
			<label for="<?php echo $field['id']; ?>_background_image"><?php _e( 'Section Background Image', 'acf-section_styles' ); ?></label>
		</div>

		<input type="hidden" id="<?php echo $field['id']; ?>_background_image" name="<?php echo esc_attr($field['name']) ?>[background_image]" value="<?php if ( !empty( $field['value']['background_image'] ) ) echo $field['value']['background_image']; ?>" class="acf-section-styles-background-image-input" />

		<div class="view show-if-value">
			<div class="acf-section-styles-background-image-preview-container"<?php if ( !empty( $field['value']['background_color'] ) ) echo ' style="background-color: ' . $field['value']['background_color'] . '"'; ?>>
				<img id="<?php echo $field['id']; ?>_background_image_preview" src="<?php echo $url; ?>" alt="" class="acf-section-styles-background-image-preview" />
			</div>

			<p style="margin: 5px 0 0;"><a href="#" class="acf-section-styles-background-image-remove" data-target="<?php echo $field['id']; ?>"><?php _e( 'Remove selected image', 'acf-section_styles' ); ?></a></p>

			<div class="acf-section-styles-background-style-container">
				<div class="acf-label">
					<label for="<?php echo $field['id']; ?>_background_style"><?php _e( 'Background Style', 'acf-section_styles' ); ?></label>
				</div>

				<select id="<?php echo $field['id']; ?>_background_style" name="<?php echo esc_attr($field['name']) ?>[background_style]">
					<?php foreach ( $this->background_style_options as $v => $label ): ?>
					<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_style'] ) && $field['value']['background_style'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="acf-section-styles-background-position-container">
				<div class="acf-label">
					<label for="<?php echo $field['id']; ?>_background_position_1"><?php _e( 'Background Position', 'acf-section_styles' ); ?></label>
				</div>

				<div class="acf-section-styles-input-row">
					<div class="acf-section-styles-input-col-half">
						<select id="<?php echo $field['id']; ?>_background_position_1" name="<?php echo esc_attr($field['name']) ?>[background_position_1]" >
							<?php foreach ( $this->background_position_options_1 as $v => $label ): ?>
							<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_position_1'] ) && $field['value']['background_position_1'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="acf-section-styles-input-col-half">
						<select id="<?php echo $field['id']; ?>_background_position_2" name="<?php echo esc_attr($field['name']) ?>[background_position_2]" class="acf-section-styles-background-position-1">
							<?php foreach ( $this->background_position_options_2 as $v => $label ): ?>
							<option value="<?php echo $v; ?>"<?php if ( !empty( $field['value']['background_position_2'] ) && $field['value']['background_position_2'] == $v ) echo ' selected'; ?>><?php echo $label; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>

		</div>

		<div class="view hide-if-value">
			<p style="margin: 0;"><?php _e( 'No image selected','acf-section_styles' ); ?> <a data-target="<?php echo $field['id']; ?>" class="acf-button button acf-section-styles-background-image-select" href="#"><?php _e( 'Add Image','acf-section_styles' ); ?></a></p>
		</div>

	</div>
	<!-- End Background Image -->

</div>
</div>
</div>
<!-- End Style Options -->

</div> <!-- End .acf-section-styles-container -->

<?php
}


/*
*  input_admin_enqueue_scripts()
*
*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
*  Use this action to add CSS + JavaScript to assist your render_field() action.
*
*  @type	action (admin_enqueue_scripts)
*  @since	3.6
*  @date	23/01/13
*
*  @param	n/a
*  @return	n/a
*/

function input_admin_enqueue_scripts() {

	// vars
	$url = $this->settings['url'];
	$version = $this->settings['version'];

	// register & include JS
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_register_script( 'acf-input-section_styles', "{$url}assets/js/input.js", array('acf-input'), $version );
	wp_enqueue_script('acf-input-section_styles');

	// register & include CSS
	wp_register_style( 'acf-input-section_styles', "{$url}assets/css/input.css", array('acf-input'), $version );
	wp_enqueue_style('acf-input-section_styles');

}

/*
*  format_value()
*
*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
*
*  @type	filter
*  @since	3.6
*  @date	23/01/13
*
*  @param	$value (mixed) the value which was loaded from the database
*  @param	$post_id (mixed) the $post_id from which the value was loaded
*  @param	$field (array) the field array holding all the field options
*
*  @return	$value (mixed) the modified value
*/

function format_value( $value, $post_id, $field ) {

	// bail early if no value
	if ( empty( $value ) ) return $value;

	if ( !empty( $value['background_image'] ) ) {
		$value['background_image'] = acf_get_attachment( $value['background_image'] );
	}

	// background position value
	$value['background_position'] = $value['background_position_1'] . ' ' . $value['background_position_2'];

	// format padding value
	$value['padding'] = !empty( $value['padding_top'] ) ? $value['padding_top'] : '0';
	$value['padding'] .= ' ';	// space
	$value['padding'] .= !empty( $value['padding_right'] ) ? $value['padding_right'] : '0';
	$value['padding'] .= ' ';	// space
	$value['padding'] .= !empty( $value['padding_bottom'] ) ? $value['padding_bottom'] : '0';
	$value['padding'] .= ' ';	// space
	$value['padding'] .= !empty( $value['padding_left'] ) ? $value['padding_left'] : '0';

	return $value;
}

/*
*  update_value()
*
*  This filter is applied to the $field before it is saved to the database
*
*  @type	filter
*  @date	23/01/2013
*  @since	3.6.0
*
*  @param	$field (array) the field array holding all the field options
*  @return	$field
*/

function update_value( $value, $post_id, $field  ) {

	$default_unit = apply_filters( 'acf_section_styles_default_unit', 'px' );

	// if fields do not have a unit attached apply default unit
	$auto_append_unit_items = apply_filters( 'acf_section_styles_append_units', array(
		'padding_top',
		'padding_right',
		'padding_bottom',
		'padding_left'
	) );

	foreach ( $auto_append_unit_items as $i ) {
		if ( ctype_digit( $value[$i] ) ) {
			$value[$i] .= $default_unit;
		}else{

		}
	}

	return $value;

}

}

// initialize
new acf_field_section_styles( $this->settings );

// class_exists check
endif;
