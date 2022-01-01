<?php

class Controller_Registeringcats extends Controller{

    

    public function action_index(){
         // 地域（絞り込み）
         $place = (!empty(Input::get('p_id'))) ? Input::get('p_id') : '';

        // 地域(DBから取ってくる)
        $placeData = DB::select('*')
        ->from('place')
        ->execute()
        ->as_array();


         //ユーザーIDをGETデータとして格納
        //  $u_id="";
        $u_id = Session::get('user_id');
        print_r($u_id);

        //絞り込みがあった場合のページネーション
        if(!empty($place)){

            $cnt = Model_registeringCats::get_myCatsPlaceData($place,$u_id);


            $config = array(
                // 'pagination_url' => 'niigatahogoneko_navi/home',
                'total_items' => $cnt,
                'per_page' => 12, //１ページあたりの表示数
                'uri_segment' => 'page',
                'num_links' => 5, //リンクの数
                'name' => 'myPagination',
                'show_first' => 'true',
                'show_last' => 'true',
                'default_page' => 'first'
                );

            // Pagination インスタンス生成
            $pagination = Pagination::forge('mypagination', $config);

            $data = DB::select()
            ->from('cats')
            ->where_open()
            ->where('delete_flg','0')
            ->and_where('place_id', $place)
            ->and_where('user_id', $u_id)
            ->where_close()
            ->order_by('create_date','desc')
            ->limit($pagination->per_page)
            ->offset($pagination->offset)
            ->execute()
            ->as_array();


        }else{

            //ページネーション
            $cnt = Model_registeringCats::get_myCatsData($u_id);

             // ページネーション設定
            $config = array(
                // 'pagination_url' => 'niigatahogoneko_navi/home',
                'total_items' => $cnt,
                'per_page' => 12, //１ページあたりの表示数
                'uri_segment' => 'page',
                'num_links' => 5, //リンクの数
                'name' => 'myPagination',
                'show_first' => 'true',
                'show_last' => 'true',
                'default_page' => 'first'
                );
    
        
           // Pagination インスタンス生成
            $pagination = Pagination::forge('mypagination', $config);


            $data = DB::select()
                ->from('cats')
                ->where_open()
                ->where('delete_flg','0')
                ->and_where('user_id', $u_id)
                ->where_close()
                ->order_by('create_date','desc')
                ->limit($pagination->per_page)
                ->offset($pagination->offset)
                ->execute()
                ->as_array();

        }



        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('content',View::forge('member/registeringCats'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('placeData',$placeData);
        $view->set_global('data',$data);
        $view->set_safe('mypagination', $pagination);
        $view->set_global('u_id',$u_id);

        return $view;
    }

}
?>