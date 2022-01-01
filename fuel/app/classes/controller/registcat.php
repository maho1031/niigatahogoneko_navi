<?php
use \Model\registCat;

class Controller_Registcat extends Controller{


    public function action_index(){
    
    // セッションにユーザーIDを格納
    $u_id = Session::get('user_id');

    // ラジオボタン設定
    $radio_list = array(
        1 => 'オス',
        2 => 'メス'
    );

    // セレクトボックス設定
    $select_list = array(
        // '0' => '指定なし',
        '1' => '上越',
        '2' => '中越',
        '3' => '下越',
        '4' => '佐渡',
    );
    

    // ===============================================================================
    // //編集機能追加したい部分

    // GETデータを格納
        // $c_id = (!empty(Input::get('c_id'))) ? Input::get('c_id') : '';

    //  //DBにデータがあるかどうか
    // $dbFormData = (!empty($c_id)) ? Model_registcat::get_cats($u_id, $c_id) : '';

    //  //編集画面か新規登録画面か
    //  $edit_flg = (!empty($dbFromData)) ? true : false;

    // DBから地域と性別を取得
    // 地域
    //  $dbPlaceData = Model_getplace::get_place();

    // 性別
    //  $dbGenderData = Model_getgender::get_gender();
    // ===============================================================================

    
    //フォームからPOST送信されたら
        if(Input::method()==='POST'){

         // 初期設定
            $config = array(
            'path' => DOCROOT.DS.'assets/uploads',
            'randomize' => true,
            'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );

        //$_FILES内のアップロードされたファイルを処理する
        Upload::process($config);

        //ディレクトリを分けて軽くするための処理
        // Upload::register('before', function(&$file)
        // {
        //     $file['filename'] = substr($file['filename'], 0, 32);
        //     $file['path'] .=  $file['filename'][0]. '/'. $file['filename'][1]. '/';
        // });

        //有効なファイルがある場合
        if(Upload::is_valid()){

            //設定に従って保存する
            Upload::save();


        foreach(Upload::get_files() as $file){

            // あとでDBから取ってこれるように相対パスを入れる
            $result = 'public/assets/uploads/'.$file['saved_as'];
            
        }
    
        }else{

            // 画像がない場合はサンプル画像を挿入する
            $result = 'public/assets/img/sample-img.png';

        //エラーを処理する
        foreach(Upload::get_errors()as $file){
            
            //  $imgerror = $file['message'];
            // $error = $file['errors'];

            foreach($file['errors'] as $fileError){
                $img_error = $fileError['message'];
                echo $img_error;
                
            }
        }

    }


        $val = Validation::forge();
        $val->add_field('name', '名前','required|min_length[2]|max_length[255]');
        $val->add_field('birthday', '生年月日','required');
        $val->add_field('gender_id', '性別','required');
        $val->add_field('place_id', '地域','required');

        

        if($val->run()){

            //バリデーションが成功した場合DBに登録するモデルを呼び出す
            $results = Model_registcat::get_results($result,$u_id);

            // 自分が登録した保護猫のページへ
            Response::redirect('Registeringcats'); 

        }else{

        //バリデーションが失敗した場合エラーを格納
        $error = $val->error();
        
        }
    }



     //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('content',View::forge('member/registCat'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('radio_list', $radio_list);
        $view->set_global('select_list', $select_list);
        // $view->set_global('dbPlaceData', $dbPlaceData);
        // $view->set_global('dbAgeData', $dbGenderData);


    // エラーがあった時だけ呼び出す
        if(!empty($error)){
        $view->set_global('error', $error);
        }
        if(!empty($img_error)){
        $view->set_global('img_error', $img_error);
        }

        
        return $view;
    }
}
