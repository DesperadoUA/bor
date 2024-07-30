<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options():void {
    Container::make( 'theme_options', __( 'Options' ) )
        ->add_fields(array(
            Field::make('image', OPTIONS_KEYS['LOGO'], 'Logo'),
            Field::make('text', OPTIONS_KEYS['FOOTER_TEXT'], 'Footer text'),
            Field::make('text', OPTIONS_KEYS['FB'], 'FB link'),
            Field::make('text', OPTIONS_KEYS['TW'], 'TW link')
        ));
}