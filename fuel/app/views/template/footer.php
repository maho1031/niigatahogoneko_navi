<footer class="l-footer">
    <div class="p-footer">
        <div class="p-footer__totop">
            <i class="fas fa-angle-up js-totop"></i>
        </div>

        <div class="p-footer__inner">
            <div class="p-footer__body">
                <p class="p-footer__comment u-mb16">
                    新潟県保護猫情報なびは、新潟県内の保護猫情報をまとめたサイトです。
                </p>
            </div>
            <nav class="p-footer__nav">
                <ul class="p-footer__ul">
                    <li class="p-footer__li"><a href="">お問い合わせ</a></li>
                    <span class="p-footer__border"></span>
                    <li class="p-footer__li"><?php echo Html::anchor('login', '管理者ログイン'); ?></li>
                </ul>
            </nav>

            <div class="p-footer__logo">
                <span class="p-footer__title">新潟県保護猫情報なび<i class="fas fa-paw fa-fw icn"></i></span>
            </div>
            <div class="p-footer__copyright">
                &copy;新潟保護猫情報なび<i class="fas fa-paw fa-fw icn"></i>. All rights reserved.
            </div>
        </div>
    </div>
</footer>

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<?=Asset::js('libs/footer.js')?>
<?=Asset::js('libs/totop.js')?>
<?=Asset::js('libs/scroll.js')?>
<?=Asset::js('libs/liveprev.js')?>
<?=Asset::js('main.js')?>
