<?php

/**
 * Here, we tried to mimic the WordPress actions & filters behaviour.
 *
 * to learn how it works behind the scene.
 */

function greeting(){
    echo "Hello Dolly.";
}
function greeting2(){
    echo "Hello Dolly2.";
}

$actions = [
    'loaded' => [
        10 => 'greeting',
        11 => 'greeting2',
    ],
    // 'the_content' => [
    //     'change'
    // ]
];

function do_action( $action ){
    global $actions;
    if( isset( $actions[ $action ] ) ) {
        foreach( $actions[ $action ] as $callback ) {
            call_user_func( $callback );
        }
    }
}

// call_user_func( 'greeting', 'Dolly' );

do_action('loaded');