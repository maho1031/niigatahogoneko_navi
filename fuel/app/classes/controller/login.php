<?php

class Controller_Login extends Controller{

    public function action_index(){
        $error = '';



        //既にログイン済みであればマイページトップにリダイレクト
        Auth::check() and Response::redirect('member/mypage');


            //emailとpasswordがPOSTされている場合は認証を試みる
        if(Input::method() == 'POST'){
//            if (Input::post('email') and Input::post('password')) {
//                $email = Input::post('email');
//                $password = Input::post('password');

                //バリデーション処理
                $val = Validation::forge();
                $val->add('email','メールアドレス')
                    ->add_rule('required')
                    ->add_rule('valid_email');

                $val->add('password', 'パスワード')
                    ->add_rule('required');

                if($val->run()){
                  $data= $val->validated();



                  $auth = Auth::instance();


                //認証に成功したらマイページトップにリダイレクト
                if ($auth->login($data['email'], $data['password'])) {

                    // セッションに認証チェックに必要な情報を突っ込む
                    $u_id = DB::select('id')
                    ->from('users')
                    ->where('email',$data['email'])
                    ->execute()
                    ->as_array();

                    Session::start();
                    Session::set('user_id',$u_id);
                  
                    Response::redirect('member/mypage');

                    
                    

                }else{
                    $data['err_msg'] = true;
                    $view = View::forge('template/index');
                    $view->set_global('err_msg', $data);

                }

            }else{

                    $error = $val->error();

                }


        }



        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('content',View::forge('template/login'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('error', $error);






        return $view;


    }

}
?>