<?php

return array(

    // the active pagination template                                                                                                                                                                              
    'active'                      => 'myPagination',

    // default FuelPHP pagination template, compatible with pre-1.4 applications                                                                                                                                   
    'myPagination'                     => array(
        // ページャ全体を囲うdiv
        'wrapper'                 => "<ul class=\"pagination\">\n\t{pagination}\n</ul></div>\n",
        // 先頭ページへのリンク設定
        'first'                   => "<li class=\"page-item\">\n\t{link}\n</span>\n",
        'first-marker'            => "<<",
        'first-link'              => "\t\t<a href=\"{uri}\">{page}</a>\n",

        // 'first-inactive'          => "<li class=\"page-item\">\n\t{link}\n</li>\n",
        // 'first-inactive-link'     => "\t\t<a href=\"#\" rel=\"prev\">{page}</a>\n",

        // 前のページへのリンクの設定
        'previous'                => "<li class=\"page-item\">\n\t{link}\n</li>\n",
        'previous-marker'         => "<",
        'previous-link'           => "\t\t<a href=\"{uri}\" rel=\"prev\">{page}</a>\n",
        // 前のページへのリンクがない場合(:=現在先頭ページの場合)
        // 'previous-inactive'       => "<li class=\"page-item\">\n\t{link}\n</li>\n",
        'previous-inactive'       => "",
        // 'previous-inactive-link'  => "\t\t<a href=\"#\" rel=\"prev\">{page}</a>\n",
        'previous-inactive-link'  => "",

        // 各ページ番号を表示する領域の設定
        'regular'                 => "<li class=\"page-item\">\n\t{link}\n</li>\n",
        'regular-link'            => "\t\t<a href=\"{uri}\">{page}</a>\n",
        // 現在いるページの表記の表記
        'active'                  => "<li class=\"active\">\n\t{link}\n</li>\n",
        'active-link'             => "\t\t<a href=\"#\">{page}</a>\n",
        // 次のページへのリンクの設定
        'next'                    => "<li class=\"page-item\">\n\t{link}\n</li>\n",
        'next-marker'            => ">",
        'next-link'               => "\t\t<a href=\"{uri}\" rel=\"next\">{page}</a>\n",
        // 次のページへのリンクがない場合(:=現在最終ページの場合)
        'next-inactive'           => "<li class=\"page-item\">\n\t{link}\n</span>\n",
        'next-inactive-link'      => "\t\t<a href=\"#\" rel=\"next\">{page}</a>\n",
        // 'next-inactive'           => "",
        // 'next-inactive-link'      => "",

        // 最終ページへのリンク設定
        'last'                    => "<li class=\"page-item\">\n\t{link}\n</span>\n",
        'last-marker'             => ">>",
        'last-link'               => "\t\t<a href=\"{uri}\">{page}</a>\n",

        'last-inactive'           => "",
        'last-inactive-link'      => "",
    ),
);