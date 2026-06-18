# 開発環境セットアップ手順

## 1. 必要要件
- XAMPP 8.2.12
  - PHP 8.2.12
  - Apache 2.4.58
  - MariaDB 10.4.32
- 推奨エディタ：VSCode

## 2. データベースセットアップ
```sql
CREATE DATABASE IF NOT EXISTS hdf_suyalist
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

## 3. アプリケーション設定
1. Apacheの設定（httpd-vhosts.conf）
```apache
<VirtualHost *:80>
    ServerName hdf.suyalist.local
    DocumentRoot "D:/xampp/htdocs/hdf.suyalist.com/suyalist.com/public_html/hdf.suyalist.com/public"
    <Directory "D:/xampp/htdocs/hdf.suyalist.com/suyalist.com/public_html/hdf.suyalist.com/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog "logs/hdf.suyalist.local-error.log"
    CustomLog "logs/hdf.suyalist.local-access.log" combined
</VirtualHost>
```

2. hostsファイル（C:\Windows\System32\drivers\etc\hosts）
```
127.0.0.1 hdf.suyalist.local
```

## 4. 動作確認手順
1. Apache/MySQLサービスの再起動
2. http://hdf.suyalist.local/ にアクセス
3. http://hdf.suyalist.local/system-check.php で環境チェック
4. エラーログの確認
   - D:/xampp/php/logs/php_error.log
   - D:/xampp/apache/logs/error.log

## 5. トラブルシューティング
1. 白画面が表示される場合
   - エラーログを確認
   - display_errors設定を確認
   - ファイルパーミッションを確認

2. データベース接続エラー
   - MySQLサービスの起動確認
   - 接続情報の確認
   - データベースの存在確認

3. 404エラー
   - DocumentRootの設定確認
   - .htaccessの設定確認
   - モジュールの有効化確認（mod_rewrite等）