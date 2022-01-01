<?php

class Controller_Signup extends Controller{


    const PASS_LENGTH_MIN = 6;
    const PASS_LENGTH_MAX = 20;


    public function action_index(){

        $error = "";
        $formData = '';

        //Fieldestクラスは、formの生成やバリデーションをしてくれる
        //実際の生成やバリデーション処理はFormクラスとValidationクラスが行なっている

        $form = Fieldset::forge('signupform');
        // $form = Validation::forge();
        // $form->add_callable('Validate_MyValidation'); 

        //addメソッドでformを生成、第一引数：name属性の値、第二引数：ラベルの文言、第三引数：いろいろな属性を配列形式で
        //add_ruleメソッドでバリデーションを設定（使えるルールはValidationクラスと全く同じ。Validationクラスを使っているので）
        $form->add('username', 'ユーザー名', array('type'=>'text', 'placeholder'=>'ユーザー名'))
           ->add_rule('required')
            // ->add_rule('min_length', 1)
            ->add_rule('max_length', 255);

        $form->add('email','メールアドレス',array('type'=>'email' ,'placeholder'=>'Email'))
           ->add_rule('required')
            ->add_rule('valid_email')
            ->add_rule('min_length', 1)
            ->add_rule('max_length', 255);
            // ->add_rule('email_check'); 


        $form->add('password','パスワード', array('type'=>'password', 'placeholder'=>'パスワード'))
           ->add_rule('required')
            ->add_rule('min_length', self::PASS_LENGTH_MIN)
            ->add_rule('max_length', self::PASS_LENGTH_MAX);

        $form->add('password_re', 'パスワード（再入力）', array('type'=>'password', 'placeholder'=>'パスワード(再入力)'))
            ->add_rule('match_field', 'password')
            ->add_rule('required')
            ->add_rule('min_length', self::PASS_LENGTH_MIN)
            ->add_rule('max_length', self::PASS_LENGTH_MAX);

        $form->add('submit', '', array('type'=>'submit', 'value'=>'登録', 'class' => 'c-btn__signup'));


        //input::method()でHTTPメソッドで帰ってくるので、POSTかどうか確認
        if(Input::method() === 'POST'){
            //バリデーションインスタンスを取得
            $val = $form->validation();

            if($val->run()){
                $formData = $val->validated();
                $auth = Auth::instance();  //Authインスタンス生成

                if($auth->create_user($formData['username'], $formData['password'], $formData['email'])){

                    //リダイレクト
                    Response::redirect('member/mypage');
                }


            }else{
                //エラー格納
                $error = $val->error();
            }

            //フォームにPOSTされた値をセット
            $form->repopulate();
        }






        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('content',View::forge('auth/signup'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('signupform', $form->build(''), false);
        $view->set_global('error', $error);


        return $view;
    }

}
?>