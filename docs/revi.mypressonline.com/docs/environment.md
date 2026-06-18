# 開発環境情報

## 目的
このドキュメントは、revi.mypressonline.com プロジェクトの開発環境に関する情報を記録し、開発者間で共有するためのものです。

## 開発環境の基本情報

### サーバー環境
- **OS**: Windows 10/11
- **Webサーバー**: Apache 2.4.54 (XAMPP)
- **PHP**: 8.2.0
  - 必須拡張モジュール:
    - mbstring
    - mysqli
    - PDO
    - pdo_mysql
    - gd
    - curl
    - json
    - openssl
    - zip
- **データベース**: MySQL 8.0.30 (MariaDB)
  - 文字コード: utf8mb4
  - 照合順序: utf8mb4_general_ci

### 開発ツール
- **統合開発環境**: Visual Studio Code
  - 推奨拡張機能:
    - PHP Intelephense
    - PHP Debug
    - PHP DocBlocker
    - Git Graph
    - Markdown All in One
- **バージョン管理**: Git 2.35.0以上
- **ローカルサーバー**: XAMPP 8.2.0
- **データベース管理**: phpMyAdmin 5.2.0
- **ブラウザ**: Google Chrome最新版

## 開発環境のセットアップ手順

### 1. XAMPPのインストール
1. [XAMPP公式サイト](https://www.apachefriends.org/)からXAMPP 8.2.0をダウンロード
2. デフォルト設定でインストール
3. Apache, MySQLのサービスを起動

### 2. プロジェクトのセットアップ
1. XAMPPのhtdocsディレクトリに移動
   ```
   cd C:\xampp\htdocs
   ```

2. プロジェクトをクローン
   ```
   git clone https://github.com/username/revi.mypressonline.com.git
   ```

3. 必要なディレクトリを作成
   ```
   cd revi.mypressonline.com
   mkdir docs mysql system
   ```

### 3. データベースのセットアップ
1. phpMyAdminにアクセス (http://localhost/phpmyadmin/)
2. 新規データベース「4646140_revi」を作成 (utf8mb4_general_ci)
3. docs/mysql/内のSQLファイルをインポート

### 4. 設定ファイルの準備
1. docs/config/配下の各種設定ファイルを、system/config/にコピー
2. 環境に応じて設定値を調整

## 動作確認方法

### 1. ローカル環境へのアクセス
- **開発環境URL**: http://localhost/revi.mypressonline.com/revi.mypressonline.com/
- **管理画面URL**: http://localhost/revi.mypressonline.com/revi.mypressonline.com/admin/

### 2. 各機能の確認
- ログイン機能
- データベース接続
- ファイルアップロード
- 各種CRUD操作

## 注意事項・制約

### 1. 環境依存の注意点
- パスの指定は相対パスを使用
- 文字コードはUTF-8で統一
- 改行コードはCRLF（Windows）

### 2. 制約事項
- Composer等の外部ツールは使用不可
- `.htaccess`によるURL書き換えは最小限に
- 本番環境のSSL対応を考慮した実装

## トラブルシューティング

### 1. よくある問題と解決方法
- Apache/MySQLが起動しない
  → XAMPPのログを確認、ポート重複の確認
- データベース接続エラー
  → 接続情報、権限設定の確認
- ファイルアップロードエルー
  → PHPの設定値（upload_max_filesize等）を確認

### 2. ログの確認方法
- Apacheログ: `C:\xampp\apache\logs`
- PHPエラーログ: `C:\xampp\php\logs`
- MySQLログ: `C:\xampp\mysql\data\*.err`

## 参考情報

### 1. 関連ドキュメント
- [PHP公式マニュアル](https://www.php.net/manual/ja/)
- [MySQL 8.0リファレンス](https://dev.mysql.com/doc/refman/8.0/ja/)
- [Apache 2.4ドキュメント](https://httpd.apache.org/docs/2.4/)

### 2. 開発ガイドライン
- コーディング規約は`.roo/rules/common_rules_base.md`を参照
- データベース設計は`docs/mysql/README.md`を参照
- API仕様は`docs/api/README.md`を参照

## 更新履歴
- 2025-06-17: 初版作成（環境構築手順、必要な設定等を記載）