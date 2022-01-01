<div class="c-container" style="padding-top: 80px;">
    <section class="p-form" style="height: 600px;">
        <div class="p-form__container">
            <form action="" method="post" class="form">
                <h2 class="c-title-main u-mt80 u-mb60">管理者ログイン</h2>
<!--                --><?//=var_dump($error); ?>

                <?php if(isset($err_msg)) : ?>
                <ul class="p-form__msg"><li class="p-form__msg-err">メールアドレスまたはパスワードが違います。</li></ul>
                <?php endif;?>

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


                <?php echo Form::open(); ?>
                <fieldset>
                <div class="p-form__clearfix">
                    <?php echo Form::label('', 'email'); ?>
                    <?php echo Form::input('email','' ,array('placeholder'=>'メールアドレス')); ?>
                </div>



                <div class="p-form__clearfix">
                    <?php echo Form::label('', 'password'); ?>
                    <?php echo Form::password('password','' ,array('placeholder'=>'パスワード')); ?>
                </div>

            

            <div class="c-btn">
                <div class="c-btn__login">
                    <?php echo Form::submit('submit', 'ログイン', array('class'=>'c-btn__btn')); ?>
                </div>
            </div>
            </form>
            </fieldset>
            <?php echo Form::close(); ?>

        </div>
    </section>
</div>