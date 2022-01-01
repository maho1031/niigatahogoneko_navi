<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  Global database settings
 * -----------------------------------------------------------------------------
 *
 *  Set database configurations here to override environment specific
 *  configurations
 *
 */

return array(
    'active' => 'mysqli',

    'pdo' => array(
        'type'           => 'pdo',
        'connection'     => array(
            'dsn'        => 'mysql:host=localhost;dbname=niigata_hogoneko_navi',
            'username'       => 'root',
            'password'       => 'root',
            'persistent'     => false,
            'compress'       => false,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => false,
        'profiling'    => true,
    ),
    'mysqli' => array(
        'type'           => 'mysqli',
        'connection'     => array(
            'hostname' => 'localhost',
            'database' => 'niigata_hogoneko_navi',
            'username'       => 'root',
            'password'       => 'root',
            'persistent'     => false,
            'compress'       => false,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'enable_cache' => true,
        'profiling'    => true,

    ),
);
