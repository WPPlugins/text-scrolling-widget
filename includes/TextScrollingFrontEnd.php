<?php

class TextScrollingFrontEnd extends WP_Widget
{
    function __construct(){
        $params = array(
            'description'=>'Use this widget to show vertical and Horizontal scrolling text',
            'name'=>'Text Scrolling'

        );
        parent::__construct('TextScrolling','',$params);

    }

    public function form($instance){
        extract($instance);
        include_once('templates/text-scrolling-front-end.php');
    }

    public function widget($args,$instance){

        if(get_option( 'tsw_direction') !='' )
            {
            $direction = get_option( 'tsw_direction');
        }else{
            $direction = 'up';
        }

        if(get_option('tsw_speed') == ""){
            $speed = 2;
        }else{
            $speed = get_option('tsw_speed');
        }

        extract($args);
        extract($instance);

        echo $before_widget;
        echo $before_title . $title . $after_title;
        echo '<marquee behavior="scroll" scrollAmount="'.$speed.'" direction="'.$direction.'">'.$description.'</marquee>';
        echo $after_widget;

    }

}

?>