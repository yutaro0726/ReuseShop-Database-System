<?php
/**
 * データベース設定ファイル
 * システム共通の設定とAPI連携用の設定を管理
 */

// データベース設定
$db_config = [
    // 開発環境設定
    'development' => [
        'host' => 'localhost',
        'database' => '4646140_revi',
        'username' => '4646140_revi',
        'password' => 'WV7#SU/-HQKm',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'environment' => 'development'
    ],
    // 本番環境設定
    'production' => [
        'host' => 'fdb1027.runhosting.com',
        'database' => '4646140_revi',
        'username' => '4646140_revi',
        'password' => 'WV7#SU/-HQKm',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'environment' => 'production'
    ]
];

// API連携設定
$api_config = [
    // API認証設定（system/config/auth_config.phpと整合）
    'api_key' => 'reviTotalAdmin:Rv#T2025@Admin!',  // reviTotalAdminユーザーの認証情報を利用
    'api_endpoint' => '/api/sync_api.php',
    
    // 同期対象テーブル
    'sync_tables' => ['scraped_stores', 'store_sns'],

    // リクエストヘッダー
    'headers' => [
        'Content-Type: application/json',
        'X-Api-Key: {api_key}'  // 実行時に動的に置換
    ],

    // 同期間隔（秒）
    'sync_interval' => 3600  // 1時間ごと
];

// データベース接続関数
function getDbConnection($environment = 'development') {
    global $db_config;
    
    try {
        $config = $db_config[$environment];
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        throw $e;
    }
}

// DB同期用APIクライアント関数
function syncDatabase($data, $environment = 'production') {
    global $api_config;
    
    try {
        // APIキーをヘッダーに設定（Basic認証形式で送信）
        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($api_config['api_key'])
        ];
        
        // APIリクエストオプション設定
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => implode("\r\n", $headers),
                'content' => json_encode($data)
            ]
        ];
        
        $context = stream_context_create($options);
        $base_url = ($environment === 'production') 
            ? 'https://revi.mypressonline.com'
            : 'http://localhost/revi.mypressonline.com/revi.mypressonline.com';
        
        $response = file_get_contents(
            $base_url . $api_config['api_endpoint'],
            false,
            $context
        );
        
        return json_decode($response, true);
    } catch (Exception $e) {
        error_log("API sync error: " . $e->getMessage());
        throw $e;
    }
}