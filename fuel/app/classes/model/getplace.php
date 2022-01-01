<?php
class Model_getplace extends \Model_Crud
{

    //テーブルの名前を登録する
    protected static $_table_name = 'place';

    //テーブルの主キーを登録する
    protected static $_primary_key = 'id';




    public static function get_place(){

        try
        {
            DB::start_transaction();

            // 何らかのクエリ...
            $data = DB::select('*')
            ->from('place')
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