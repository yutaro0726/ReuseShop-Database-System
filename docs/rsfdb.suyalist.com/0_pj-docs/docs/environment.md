# 開発環境セットアップ手順

## 基本設定
- DocumentRoot: D:/xampp/htdocs/hdf.suyalist.com/suyalist.com/public_html/hdf.suyalist.com/public
- ローカルURL: http://hdf.suyalist.local/
- PHP Version: 8.2.12
- Apache Version: 2.4.58

## 設定ファイル場所
- Virtual Host: xampp/apache/conf/extra/httpd-vhosts.conf
- Hosts file: C:\Windows\System32\drivers\etc\hosts
- PHP Error Log: D:/xampp/php/logs/php_error.log

## 確認手順
1. http://hdf.suyalist.local/ にアクセス
2. test-environment.php の実行
3. エラーログの確認

## 環境確認項目
- PHP設定の確認
  - エラー表示設定
  - ログ設定
  - 文字コード設定（utf8mb4必須）
  - タイムゾーン設定（Asia/Tokyo）

- Apache設定の確認
  - VirtualHost設定
  - mod_rewrite有効化
  - .htaccess設定

## トラブルシューティング
- エラーログの場所: D:/xampp/php/logs/php_error.log
- Apache error log: D:/xampp/apache/logs/error.log
- アクセスログ: D:/xampp/apache/logs/access.log

## 参考資料
- [プロジェクトルール](../docs/README.md)
- [デプロイメント手順](../docs/deployment.md)
- [セキュリティガイドライン](../docs/security.md)