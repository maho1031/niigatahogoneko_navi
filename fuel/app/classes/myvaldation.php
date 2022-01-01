<?php

class Validate_MyValidation{

//////////////////////////////////////////////
// 半角英数字チェック
//////////////////////////////////////////////
public static function _validation_email_check($str){

    $data = DB::select()
    ->from('users')
    ->where('email',$str)
    ->execute()
    ->as_array();
  if($data > 0){
    return false;
  }else {
    return true;
   }
  }
}