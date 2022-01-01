<?php

//絞り込みに使用
$place = (!empty(Input::get('p_id'))) ? Input::get('p_id') : '';

$today = date("Y/m/d");



?>
<div id="c-container">
    <section class="p-hero">
        <div class="p-hero__img">
            <div class="p-hero__title">新潟で、<br class="p-hero__title-br">あたらしい家族と出会おう。</div>
            <img src="public/assets/img/top2.jpg" alt="TOP画像">
        </div>
    </section>
</div>
<div class="c-container">
    <nav class="p-nav">
        <ul class="p-nav__menu">
            <li class="p-nav__menu-item"><?php echo Html::anchor('about', '新潟保護猫情報なびとは',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('schedule', '県内譲渡会日程',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('center', '県内動物愛護センター',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('dantai', '県内動物愛護団体',array('class'=> 'p-nav__menu-link')); ?></li>
            <a href="http://ndn2001.com/images/owner_wanted/owner_wanted.pdf" target="_blink" class="c-bannerimg"><img src="http://ndn2001.com/images/banner_owner_wanted_a.png" alt="飼い主募集チラシ" /></a>
        </ul>
    </nav>
    <section class="p-news">
        <div class="p-news__container">
            <div class="p-news__header">
                <h2 class="c-title-main u-mb30 u-mt30">お知らせ</h2>
            </div>

            <div class="p-news__inner">

                <ul class="p-news__main">
                    <!-- <li class="p-news__item">
                        <a href="" class="p-news__link"></a>
                        <span class="p-news__date">2020.12.25</span>
                        <span class="p-news__title">保護猫情報を更新しました。</span>
                    </li>
                    <li class="p-news__item">
                        <a href="#" class="p-news__link"></a>
                        <span class="p-news__date">2020.11.22</span>
                        <span class="p-news__title">クリスマスキャンペーンのご案内</span>
                    </li>
                    <li class="p-news__item">
                        <a href="#" class="p-news__link"></a>
                        <span class="p-news__date">2020.11.22</span>
                        <span class="p-news__title">クリスマスキャンペーンのご案内</span>
                    </li>
                    <li class="p-news__item">
                        <a href="#" class="p-news__link"></a>
                        <span class="p-news__date">2020.11.22</span>
                        <span class="p-news__title">クリスマスキャンペーンのご案内</span>
                    </li> -->
                    <li class="p-news__item">
                        <a href="#" class="p-news__link"></a>
                        <span class="p-news__date">2021.1.8</span>
                        <span class="p-news__title">保護猫情報を更新しました。（全地域）</span>
                    </li>
                    <li class="p-news__item">
                        <a href="#" class="p-news__link"></a>
                        <span class="p-news__date">2021.1.7</span>
                        <span class="p-news__title">譲渡会情報を更新しました。</span>
                    </li>
                    <li class="p-news__item">
                        <a href="#" class="p-news__link"></a>
                        <span class="p-news__date">2020.12.25</span>
                        <span class="p-news__title">サイトを開設しました。</span>
                    </li>
                </ul>
            </div>
        </div>
</div>
</section>
<main class="l-main u-mb120">
    <div class="p-main">
        <h2 class="c-title-main u-mb30 u-mt30">保護猫情報一覧</h2>
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
            <!-- <div class="c-btn__search"> -->
                   
                <!-- </div> -->
        </div>
        </form>

       
        <div class="p-panel">
        <?php
            foreach($data as $key => $val):
        ?>
        
            <div class="p-panel__item u-mb16">
                
                <a href="" class="panel__link">
                    <div class="p-panel__label">
                    <span class="p-form__label-require" style="<?php if(strtotime($today) > strtotime($val['create_date'])){
					echo 'background:#fff; padding: 10px 13px;';
				} ;?>">

				<?php
				if(strtotime($today) < strtotime($val['create_date'])){
					echo "新着";
				} ;?></span>
                    </div>
                    <div class="p-panel__header">
                        <img src="<?php echo ($val['pic1']); ?>" alt="" class="p-panel__img">
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

<!-- <php echo Pagination::instance('mypagination')->first();?> -->

<?php echo Pagination::instance('mypagination') ?>

<!-- <php echo \Pagination::create_links(); ?> -->
<!-- <php $page_number = Pagination::instance()->current_page;?> -->
