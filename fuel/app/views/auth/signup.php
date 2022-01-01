
<div class="c-container" style="padding-top:80px;">
    <nav class="p-nav-mypage">
        <ul class="p-nav__menu">
            <li class="p-nav__menu-item"><?php echo Html::anchor('registcat', '新規保護猫登録',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('registeringcats', '登録中保護猫一覧',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('member/mypage', 'マイページTOP',array('class'=> 'p-nav__menu-link')); ?></li>
            <li class="p-nav__menu-item"><?php echo Html::anchor('member/mypage/logout', 'ログアウト',array('class'=> 'p-nav__menu-link')); ?></li>
        </ul>
    </nav>
</div>
<div class="c-container" style="">
    <section class="p-form u-mt60" style="height: 700px;">
        <div class="p-form__container">
<!--            <form action="" method="post" class="form">-->
                <h2 class="c-title-main u-mb30">新規管理者登録</h2>

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
            <?=$signupform?>
<!---->
<!--                <label>-->
<!--                    <input type="text" name="email" placeholder="メールアドレス" value="">-->
<!--                </label>-->
<!--                <div class="p-form__msg">メールアドレスかパスワードが違います。</div>-->
<!---->
<!---->
<!--                <label>-->
<!--                    <input type="password" name="pass" placeholder="パスワード" value="">-->
<!--                </label>-->
<!--                <div class="p-form__msg">メールアドレスかパスワードが違います。</div>-->
<!---->
<!--                <label>-->
<!--                    <input type="password" name="pass_re" placeholder="パスワード再入力" value="">-->
<!--                </label>-->
<!--                <div class="p-form__msg">メールアドレスかパスワードが違います。</div>-->

<!--          </form>-->
<!---->
<!--            <div class="c-btn">-->
<!--                <div class="c-btn__login">-->
<!--                    <input type="submit" class="c-btn__btn" value="ログイン">-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>
</div>