<?php
//  namespace Model;

class Model_home extends \Model_Crud
{

    //テーブルの名前を登録する
    protected static $_table_name = 'cats';

    //テーブルの主キーを登録する
    protected static $_primary_key = 'id';


    public static function get_results(){
        $result = DB::select('id')->from('cats')->where('delete_flg','0')->order_by('create_date')->execute()->as_array();
        //   return $result;

        // //何レコード取得できたか
        //  $rst['total'] = count($result);
         
         
         //総ページ数
        // $rst['total_page'] = ceil($rst['total']/$span);
       
       
    // }
    // public static function get_pageResults(){

    //    // ページネーション設定
    // $config = array(
    //     'pagination_url' => 'http://localhost:8888/niigatahogoneko_navi/home',
    //     'total_items' => $rst['total'],
    //     'per_page' => 12, //１ページあたりの表示数
    //     'uri_segment' => 3,
    //     'num_link' => 3, //リンクの数
    //     );

        // Pagination インスタンス生成
        // $pagination = Pagination::forge('mypagination', $config);

        // $page_result = DB::select('*')
        // ->from('cats')
        // ->where('delete_flg','0')
        // ->order_by('create_date','desc')
        // // ->limit($pagination->per_page)
        // // ->offset($pagination->offset)
        // ->execute()->as_array();
        //  $rst['data'] = $page_result;
        //  return $rst;

    


    }

 }