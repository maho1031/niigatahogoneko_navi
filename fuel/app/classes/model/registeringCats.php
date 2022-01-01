<?php

class Model_registeringCats extends \Model_Crud
{

    //テーブルの名前を登録する
    protected static $_table_name = 'cats';

    //テーブルの主キーを登録する
    protected static $_primary_key = 'id';


    public static function get_myCatsData($u_id){
    // 典型的なトランザクションコードの流れ
        try
        {
            DB::start_transaction();

            $data = DB::select()
            ->from('cats')
            ->where_open()
            ->where('delete_flg','0')
            ->and_where('user_id',$u_id)
            ->where_close()
            ->order_by('create_date','desc')
            ->execute()
            ->count();

            // 何らかのクエリ...

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

            public static function get_myCatsPlaceData($place,$u_id){
                // 典型的なトランザクションコードの流れ
                    try
                    {
                        DB::start_transaction();

                        $data = DB::select()
                        ->from('cats')
                        ->where_open()
                        ->where('delete_flg','0')
                        ->and_where('user_id',$u_id)
                        ->and_where('place_id',$place)
                        ->where_close()
                        ->order_by('create_date','desc')
                        ->execute()
                        ->count();

                        // 何らかのクエリ...

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