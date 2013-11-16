<?php

use Sunra\PhpSimple\HtmlDomParser;

class Controller_Parser extends Controller_Rest //①
{
    public function get_api() //②
    {
        $_url = Input::get('url') == null ? null:Security::htmlentities(Input::get('url'));

        $_dom = HtmlDomParser::file_get_html( $_url );
        //$_array = $_dom->find('meta',1);

        $_result = array();
        $_cnt = 0;

        foreach( $_dom->find( 'ul' ) as $ul )
        {
            foreach( $ul->find( 'li' ) as $li )
            {
                foreach( $ul->find( 'a' ) as $a ){

                    $_result += array($a);
                    //$_cnt++;

                }

            }

        }


        $_text = '';
        foreach ($_result as $_string ){
            $_text = $_text.$_string;
        }

        $_dom->clear();

        return $this->response($_text,200); //

    }

}