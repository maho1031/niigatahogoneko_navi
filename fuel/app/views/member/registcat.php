

<div class="c-container" style="padding-top:80px;">
    <nav class="p-nav-mypage">
        <ul class="p-nav__menu">
            <li class="p-nav__menu-item"><?php echo Html::anchor('signup', '新規管理者登録',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('registeringcats', '登録中保護猫一覧',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('member/mypage', 'マイページTOP',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('member/mypage/logout', 'ログアウト',array('class'=> 'p-nav__menu-link')); ?></li>
        </ul>
    </nav>
</div>

<div class="c-container">
    <section class="p-form u-mt16 u-mb80" style="max-width: 300px;">
        <div class="p-form__container">
            <h2 class="c-title-main u-mb30 u-mt16">新規保護猫情報登録</h2>




                <?php
                if(!empty($error)):
                    ?>

                    <ul class="p-form__msg">
                        <?php
                        foreach ($error as $key => $val):
                            ?>
                            <li>
                                <?=$val?>
                               
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                <?php
                endif;
                ?>


                <!-- <?php
                if(!empty($img_error)):
                    ?>

                    <ul class="p-form__msg">
                       
                            <li>
                                <?php echo $img_error;?>
                               
                            </li>
                       
                    </ul>
                <?php
                endif;
                ?>

             -->


                <?php echo Form::open(array('action'=>'/registcat/','enctype'=>'multipart/form-data','method'=>'post')); ?>
                <label>
                    <span class="p-form__label-require">必須項目<br></span>
                    <?php echo Form::input('birthday', Input::post('birthday'), array('type'=>'date', 'placeholder'=>'生年月日'));?>
                </label>


                <label>
                    <span class="p-form__label-require">必須項目</span>
                    <?php echo Form::input('name', Input::post('name'), array('type'=>'text', 'placeholder'=>'名前'));?>
                </label>


                <label>
                    
                    
                    <span class="p-form__label-require">必須項目</span>
                    <div class="p-form__gender-radio">
                        <?php foreach($radio_list as $key => $val): ?>
                        <?php echo Form::radio('gender_id', $key,Input::post('gender_id') == $key) ?>
                        <?php echo Form::label($val, 'gender_id') ?>
                        <?php endforeach ?>
                    </div>
                </label>


                <label>
                <div class="p-form__place-select">
                    <span class="p-form__label-require">必須項目</span>
                    <?php echo Form::select('place_id', Input::post('place_id'), $select_list) ?>
                    </div>


                </label>



                <div class="p-form__filecontainer">
                <span class="p-form__label-require">必須項目</span>
                    <div class="p-form__dropcontaier">
                        <label class="p-form__areadrop">
                            <?php echo Form::hidden(array('name'=>'MAX_FILE_SIZE','value'=>'3145728')); ?>
                            <?php echo Form::file('pic1',array('name' => 'pic1', 'class'=>'p-form__inputfile','id' => 'selectImage')); ?>
<!--                            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">-->
<!--                            <input type="file" name="pic1" class="p-form__inputfile" style="object-fit:cover;">-->
                            <img src="" alt="" class="p-form__previmg">
                            <div style="margin: 0 auto;">ここに画像をドラッグ&ドロップ</div>
                        </label>
                    </div>
                </div>



                <div class="c-btn u-mt30">
                    <div class="c-btn__login">
                    <?php echo Form::submit('submit', '登録', array('class'=>'c-btn__btn')); ?>
                    </div>
                </div>

            <?php echo Form::close(); ?>
    </section>

</div>


