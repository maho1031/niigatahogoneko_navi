<?php

class Controller_schedule extends Controller{

    public function action_index(){
        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('content',View::forge('template/link_schedule'));
        $view->set('footer',View::forge('template/footer'));


        return $view;
    }

}
?>