<?php

class Controller_Member_Mypage extends Controller{


    public function before(){
        
        parent::before();
        if(!Auth::check() and ! in_array(Request::active()->action, array('login', 'index', 'view'))){
            Response::redirect('login');
        }
    }

    public function action_logout(){
        //ログアウト
        $auth = Auth::instance();
        $auth->logout();

        Session::delete("user_id");

        Response::redirect('login');
    }

    public function action_index(){
        $u_id = Session::get('user_id');
        
        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('content',View::forge('member/mypage'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('u_id',$u_id);
        return $view;
    }

}
?>