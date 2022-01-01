<?php

class Model_upload extends \Model_Crud
{

    //テーブルの名前を登録する
    protected static $_table_name = 'cats';

    //テーブルの主キーを登録する
    protected static $_primary_key = 'id';

    public static function get_files($file){

        $query = DB::insert('cats');
        $query->set(array(
            'pic1' => $file['saved_to'],

            ))->execute();
        
        // $query->execute()->as_array();

        // 典型的なトランザクションコードの流れ
        try
        {
            DB::start_transaction();

            // 何らかのクエリ...

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
    }


