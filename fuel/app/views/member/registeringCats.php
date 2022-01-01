<?php

//絞り込みに使用
$place = (!empty(Input::get('p_id'))) ? Input::get('p_id') : '';
$u_id = Session::get('user_id');

?>

<div class="c-container" style="padding-top:80px;">
    <nav class="p-nav-mypage">
        <ul class="p-nav__menu">
            <li class="p-nav__menu-item"><?php echo Html::anchor('signup', '新規管理者登録',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('registcat', '新規保護猫登録',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('member/mypage', 'マイページTOP',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('member/mypage/logout', 'ログアウト',array('class'=> 'p-nav__menu-link')); ?></li>
        </ul>
    </nav>
</div>

<main class="l-main__login u-mb120">
    <div class="p-main">
        <h2 class="c-title-main u-mb30 u-mt30">登録済保護猫情報一覧</h2>
        <div class="p-sort u-mb16">
            <form action="" method="get">
                <div class="p-sort__inner">
                    <label class="p-sort__label">地域別</label>
                    <select name="p_id" class="p-sort__category">

                    <option value="0" <?php {echo 'selected'; } ?>>指定なし</option>
                        <?php
                        foreach($placeData as $key => $val){
                        ?>
                        <option value="<?php echo $val['id'] ?>" <?php if(($place) == $val['id']){echo 'selected'; }?>>
                                    <?php echo $val['name']; ?>

                        <?php
                        }
                        ?>
                    </select>
                    <div class="c-btn__search">
                    <?php echo Form::submit('submit', '検索', array('class'=>'c-btn__search-top')); ?>
                    </div>
            </div>

        </div>
        </form>

       
        <div class="p-panel">
        <?php
            foreach($data as $key => $val):
        ?>
            <div class="p-panel__item">
           
                <a href="" class="panel__link">
                    <div class="p-panel__header">
                        <img src="<?php echo ($val['pic1']); ?>" alt="" class="p-panel__img u-mt16">
                    </div>
                </a>
                <div class="p-panel__body">
                    <p class="p-panel__title">生年月日：<?php if(($val['birthday']) == '0001-01-01'){ echo '不明';}else{ echo (($val['birthday']));}; ?></p>
                    <p class="p-panel__name">名前：<?php echo ($val['name']); ?></p>
                    <p class="p-panel__gender">性別：<?php if( ($val['gender_id']) == 1){ echo 'オス';}else{echo 'メス';} ?></p>
                    <p class="p-panel__place">地域：<?php if($val['place_id'] ==1) {echo '上越';}
                    elseif($val['place_id'] ==2){echo '中越';}elseif($val['place_id'] ==3){echo '下越';}else{echo '佐渡';}; ?></p>
                    <a href="">詳しい情報はこちら（動物愛護センターのページに飛びます。）</a>
                </div>
            </div>
            


            

        
<?php
endforeach;
?>
</div>
</main>
<?php echo Pagination::instance('mypagination') ?>