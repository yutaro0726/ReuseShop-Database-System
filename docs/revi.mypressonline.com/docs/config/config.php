<?php
/**
 * 基本設定ファイル
 * 
 * 開発環境用の設定ファイル例です。
 * 本番環境用の設定は system/config/config.php に配置します。
 */

// デバッグモード設定
define('DEBUG_MODE', true);  // 本番環境では false

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

// 文字コード設定
mb_internal_encoding('UTF-8');

// セッション設定
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_secure', 0);  // 本番環境（HTTPS）では 1

// エラー表示設定
ini_set('display_errors', 1);         // 本番環境では 0
ini_set('display_startup_errors', 1); // 本番環境では 0
error_reporting(E_ALL);               // 本番環境では必要最小限に

// ログ設定
define('LOG_DIR', dirname(__FILE__) . '/../logs/');
define('ERROR_LOG', LOG_DIR . 'error.log');
define('ACCESS_LOG', LOG_DIR . 'access.log');
define('DEBUG_LOG', LOG_DIR . 'debug.log');

// URL・パス設定
define('BASE_URL', 'http://localhost/revi.mypressonline.com/revi.mypressonline.com/');
define('SYSTEM_DIR', dirname(__FILE__) . '/../../system/');
define('LIB_DIR', SYSTEM_DIR . 'lib/');
define('TEMPLATE_DIR', SYSTEM_DIR . 'templates/');

// アップロード設定
define('UPLOAD_DIR', dirname(__FILE__) . '/../../revi.mypressonline.com/uploads/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024);  // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif']);

// 管理画面設定
define('ADMIN_DIR', dirname(__FILE__) . '/../../revi.mypressonline.com/admin/');
define('ADMIN_URL', BASE_URL . 'admin/');
define('ADMIN_ASSETS', ADMIN_URL . 'assets/');

// アセット設定
define('CSS_DIR', BASE_URL . 'assets/css/');
define('JS_DIR', BASE_URL . 'assets/js/');
define('IMG_DIR', BASE_URL . 'assets/images/');

// キャッシュ設定
define('CACHE_DIR', SYSTEM_DIR . 'cache/');
define('CACHE_TIME', 3600);  // 1時間

// セキュリティ設定
define('CSRF_TIMEOUT', 1800);  // 30分
define('PASSWORD_COST', 12);   // パスワードハッシュのコスト

// ページネーション設定
define('ITEMS_PER_PAGE', 20);
define('PAGINATION_RANGE', 2);

// RSS/Feed設定
define('FEED_ITEMS_LIMIT', 20);
define('FEED_CACHE_TIME', 900);  // 15分

// 拡張機能の設定
$config = [
    'review' => [
        'min_length' => 100,    // レビュー本文の最小文字数
        'max_length' => 5000,   // レビュー本文の最大文字数
        'max_images' => 5,      // 1レビューあたりの最大画像数
    ],
    'search' => [
        'min_keyword' => 2,     // 検索キーワードの最小文字数
        'max_results' => 100,   // 検索結果の最大表示件数
    ],
    'statistics' => [
        'update_interval' => 3600,  // 統計情報の更新間隔（秒）
    ],
];

// CDN設定
$cdn = [
    'bootstrap_css' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
    'bootstrap_js'  => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    'jquery'        => 'https://code.jquery.com/jquery-3.7.0.min.js',
    'font_awesome'  => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
];

// Google Fonts設定
$google_fonts = [
    'noto_sans' => 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap',
];

/**
 * 以下、共通関数定義
 */

// ベースURLを取得
function get_base_url() {
    return rtrim(BASE_URL, '/') . '/';
}

// アセットURLを生成
function asset_url($path) {
    return get_base_url() . 'assets/' . ltrim($path, '/');
}

// 管理画面URLを生成
function admin_url($path = '') {
    return ADMIN_URL . ltrim($path, '/');
}

// ログファイルに書き込み
function write_log($message, $logfile = null) {
    $logfile = $logfile ?: ERROR_LOG;
    $date = date('Y-m-d H:i:s');
    $log = "[{$date}] {$message}" . PHP_EOL;
    error_log($log, 3, $logfile);
}

// デバッグログ
function debug_log($message) {
    if (DEBUG_MODE) {
        write_log($message, DEBUG_LOG);
    }
}