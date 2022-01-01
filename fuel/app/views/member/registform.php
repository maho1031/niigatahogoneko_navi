<div class="c-container" style="padding-top:80px;">
    <nav class="p-nav-mypage">
        <ul class="p-nav__menu">
            <li class="p-nav__menu-item"><a class="p-nav__menu-link" href="">新規管理者登録</a></li>
            <li class="p-nav__menu-item"><a class="p-nav__menu-link" href="">登録中保護猫一覧</a></li>
            <li class="p-nav__menu-item"><a class="p-nav__menu-link" href="">マイページTOP</a></li>
            <li class="p-nav__menu-item"><a class="p-nav__menu-link" href="">ログアウト</a></li>
        </ul>
    </nav>
</div>

<div class="c-container">
    <section class="p-form u-mt16 u-mb80" style="max-width: 300px;">
        <div class="p-form__container">
            <h2 class="c-title-main u-mb30 u-mt16">新規保護猫情報登録</h2>

            <form action="" method="post" class="form" enctype="multipart/form-data">



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

                <form>  

                <input type="day" name="birthday">
                <input type="text" name="name">
                <input type="radio" name="gender_id" value="1">オス
                <input type="radio" name="gender_id" value="1">メス
                <input type="text" name="name">


                <div class="c-btn u-mt30">
                    <div class="c-btn__login">
                        <input type="submit" class="c-btn__btn" value="新規登録">
                    </div>
                </div>

                </form>

    </section>

</div>


