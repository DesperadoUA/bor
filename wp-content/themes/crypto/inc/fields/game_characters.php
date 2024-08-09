<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_characters' );
function crb_attach_theme_characters():void {
    Container::make( 'theme_options', __( 'Characters' ) )
        ->add_fields(array(
            Field::make('complex', OPTIONS_KEYS['GAME_CHARACTERS'], 'Game characters')
            ->add_fields( array(
                    Field::make( 'text', 'icon_id', 'Icon Id'),
                    Field::make( 'text', 'title', 'Title'),
                    Field::make( 'text', 'text', 'Text'),
                    Field::make( 'text', 'num', 'Num'),
                ))
        ));
}