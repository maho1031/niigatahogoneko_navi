<?php

class Model_registCat extends \Model_Crud
{

    //テーブルの名前を登録する
    protected static $_table_name = 'cats';

    //テーブルの主キーを登録する
    protected static $_primary_key = 'id';




    public static function get_results($result,$u_id){
         $u_id = Session::get('user_id');

        // $query = DB::insert('cats');
        // $query->set(array(
        //     'name'=> Input::post('name'),
        //     'birthday'=>Input::post('birthday'), 
        //     'gender_id' => Input::post('gender_id'),
        //     'place_id' => Input::post('place_id'),
        //     'pic1' => $result,
        //     'user_id'=>$u_id

        //     ))->execute();

        // 典型的なトランザクションコードの流れ
        try
        {
            DB::start_transaction();

            // 何らかのクエリ...
            $query = DB::insert('cats');
            $query->set(array(
            'name'=> Input::post('name'),
            'birthday'=>Input::post('birthday'), 
            'gender_id' => Input::post('gender_id'),
            'place_id' => Input::post('place_id'),
            'pic1' => $result,
            'user_id'=>$u_id

            ))->execute();

            DB::commit_transaction();

            // クエリの結果を返す
        }
        catch (Exception $e)
        {
            // 未決のトランザクションクエリをロールバックする
            DB::rollback_transaction();

            throw $e;
        }
    }

    //自分が登録した保護猫を表示する関数
    public static function get_cats($u_id, $c_id){
        $u_id = Session::get('user_id');

        

        try
        {
            DB::start_transaction();

            // 何らかのクエリ...
            $data = DB::select()
                ->from('cats')
                ->where_open()
                ->where('delete_flg','0')
                ->and_where('user_id',$u_id)
                ->and_where('id',$c_id)
                ->where_close()
                ->execute()
                ->as_array();

                DB::commit_transaction();

            // クエリの結果を返す
            return $data;
        }
        catch (Exception $e)
        {
            // 未決のトランザクションクエリをロールバックする
            DB::rollback_transaction();

            throw $e;
        }
        
    }

   
}

