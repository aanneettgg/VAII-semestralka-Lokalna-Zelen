<?php

namespace App\Config;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const DB_HOST = 'db:3306';
    public const DB_NAME = 'databaza';
    public const DB_USER = 'db_user';
    public const DB_PASS = 'db_user_pass';

    public const LOGIN_URL = '?c=auth&a=loginForm';

    public const ROOT_LAYOUT = 'root.layout.view.php';

    public const DEBUG_QUERY = true;

    public const UPLOAD_DIR = "public/files/";

    public const IMAGES_PATH = "public/files/images/";
}