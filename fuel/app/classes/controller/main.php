<?php

class Controller_Main extends Controller //①
{

    public function action_index(){

        return Response::forge(View::forge('main/index'));

    }

}
