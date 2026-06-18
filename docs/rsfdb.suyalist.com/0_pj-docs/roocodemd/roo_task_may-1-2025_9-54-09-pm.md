# ハードオフ店舗レビューサイト 要件・仕様まとめ

## 機能要件
- 非ログイン時：ハードオフグループ店舗の一覧・詳細のみ閲覧可能
- ログイン時：上記に加え、一部ブックオフグループ店舗の閲覧とレビュー（メモ）閲覧が可能
- 許可されたメンバーのみレビュー投稿可能
- ゲスト閲覧機能：特定URLパラメータで一時的にレビュー含め閲覧可能（パラメーターを管理画面でリセットする機能付き）
- 管理者以外はソーシャルメディアアカウントでログイン
- 店舗情報はハードオフ公式サイトから定期的に自動取得（ブックオフFC店舗は除外）
- ブックオフグループ店舗は店番号またはURL指定で追加
- 店舗の新規開店・閉店・改装時は情報を修正し、Discord等で通知

## 画面要件
- 非ログイン/ログイン時でUIを切り替える閲覧画面
- マイページ
- 管理画面（ユーザー管理、レビュー管理、店舗管理）

## その他
- 必要に応じて店舗URL等のサンプル情報を提供可能

---
## 現在のプロジェクト状況

### 概要

ハードオフ店舗レビューサイトの開発タスクにおいて、以下の作業を実施しました。

1. **ディレクトリ構造の整理**  
   - MVCパターンに基づいたディレクトリ構造を再構築  
   - `public`ディレクトリを公開ディレクトリとして設定  
   - `storage`ディレクトリを保護

2. **ルーティング設定**  
   - `index.php`をエントリポイントとして設定  
   - `.htaccess`によるURLリライト設定

3. **環境設定**  
   - 開発環境と本番環境の切り替えをサポート  
   - エラー表示設定、ログ設定

4. **データベース**  
   - MySQLデータベースを使用  
   - テーブル構造を定義

---

### ファイル構成

```
hdf.suyalist.com/
├── Controller/          # コントローラー
├── Model/               # モデル
├── view/                # ビューテンプレート
│   ├── layout/          # 共通レイアウト
│   ├── admin/           # 管理画面
│   └── errors/          # エラーページ
├── public/              # 公開ディレクトリ
│   ├── css/
│   ├── js/
│   ├── images/
│   ├── .htaccess        # public用設定
│   └── index.php        # エントリーポイント
├── storage/             # 保護されたストレージ
│   ├── logs/            # ログファイル
│   ├── cache/           # キャッシュ
│   └── uploads/         # アップロードファイル
│   └── .htaccess        # アクセス制限
├── scripts/             # 管理スクリプト
├── .htaccess            # メインの設定
└── test.php             # 環境テスト
```

---

### データベース

- データベース名: `suyalist_hdf`
- ユーザー名: `php_cron`
- パスワード: `password`

#### テーブル構造

##### users

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    status ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    last_login_at TIMESTAMP NULL DEFAULT NULL,
    remember_token VARCHAR(100) NULL DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB
```

##### site_settings

```sql
CREATE TABLE site_settings (
    setting_key VARCHAR(255) NOT NULL,
    setting_value TEXT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (setting_key)
) ENGINE=InnoDB
```

##### stores

```sql
CREATE TABLE stores (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    type ENUM('hardoff', 'bookoff') NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(20) NULL,
    business_hours TEXT NULL,
    website_url VARCHAR(255) NULL,
    description TEXT NULL,
    image_url VARCHAR(255) NULL,
    latitude DECIMAL(10, 8) NULL,
    longitude DECIMAL(11, 8) NULL,
    status ENUM('active', 'closed', 'draft') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB
```

##### reviews

```sql
CREATE TABLE reviews (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    store_id BIGINT UNSIGNED NOT NULL,
    rating TINYINT(1) NOT NULL,
    title VARCHAR(255) NULL,
    content TEXT NOT NULL,
    visited_at DATE NULL,
    status ENUM('published', 'pending', 'rejected') NOT NULL DEFAULT 'published',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES stores(id) ON DELETE CASCADE
) ENGINE=InnoDB
```

##### favorites

```sql
CREATE TABLE favorites (
    user_id BIGINT UNSIGNED NOT NULL,
    store_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, store_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES stores(id) ON DELETE CASCADE
) ENGINE=InnoDB
```

---

### 開発環境でのアクセス

- テストページ: `http://localhost/hdf.suyalist.com/public/test`
- セットアップページ: `http://localhost/hdf.suyalist.com/public/admin/setup`

### 本番環境でのアクセス

- テストページ: `http://hdf.suyalist.com/test`
- セットアップページ: `http://hdf.suyalist.com/admin/setup`

---

### 今後の作業

1. **セットアップスクリプトの実行**
    - データベースの初期化
    - 初期データの投入

2. **セットアップ画面の実装**
    - 管理者アカウントの作成
    - サイト基本設定の登録

3. **基本機能の実装**
    - 店舗一覧表示
    - レビュー投稿機能
    - ユーザー認証機能

4. **管理画面の実装**
    - ユーザー管理
    - 店舗管理
    - レビュー管理

5. **本番環境へのデプロイ**
    - HTTPS設定
    - セキュリティ設定の強化
