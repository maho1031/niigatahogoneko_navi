<?php
use \Model\home;

class Controller_Home extends Controller{

   
    public function action_index(){

         // 地域絞り込みがあった場合取得
        $place = (!empty(Input::get('p_id'))) ? Input::get('p_id') : '';

        $data = array();

        //地域情報をDBから取得
        $placeData = Model_getplace::get_place();

        // 地域絞り込みがあった場合
        if(!empty($place)){

            $cnt  = DB::select()
            ->from('cats')
            ->where_open()
            ->where('place_id', $place)
            ->where('delete_flg','0')
            ->where_close()
            ->execute()->count();

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
                ->where_close()
                ->order_by('create_date','desc')
                ->limit($pagination->per_page)
                ->offset($pagination->offset)
                ->execute()
                // ->get()
                ->as_array();



        }else{

          $cnt = DB::select('id')->from('cats')->execute()->count();
         
        // }

        
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
        ->where('delete_flg','0')
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
        $view->set('content',View::forge('template/top'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('data',$data);
        $view->set_global('placeData',$placeData);
        $view->auto_filter(false);
        $view->set_safe('mypagination', $pagination);

        return $view;
    }

}
?>