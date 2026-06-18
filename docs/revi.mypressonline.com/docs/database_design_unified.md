# データベース設計・管理統合ドキュメント

## 📌 概要
リサイクルショップレビューサイトとチェーンストア拡張システムの統合データベース設計書です。このドキュメントは、構造仕様、ER図、セットアップ状況を包括的に記載しています。

## 📊 データベース情報
- **データベース名**: 4646140_revi
- **文字コード**: utf8mb4 (絵文字対応)
- **照合順序**: utf8mb4_general_ci

## 🔄 セットアップ状況
**更新日時:** 2025/06/17 10:10  
**ステータス:** 🔄 **セットアップ中 - テーブル作成・データ投入段階**

### 開発環境接続情報
- **ホスト:** `localhost`
- **ユーザー名:** `4646140_revi`
- **パスワード:** `WV7#SU/-HQKm`

### 本番環境接続情報
- **ホスト:** `fdb1027.runhosting.com`
- **ユーザー名:** `4646140_revi`
- **パスワード:** *[本番環境使用時に設定]*

## 🗃️ テーブル一覧

### 1. 管理者・ユーザー系テーブル

#### admin_users (管理者テーブル)
| カラム名 | データ型 | 制約 | 説明 |
|---------|---------|------|------|
| id | int(11) | PRIMARY KEY, AUTO_INCREMENT | 管理者ID |
| username | varchar(50) | NOT NULL, UNIQUE | ユーザー名 |
| password | varchar(255) | NOT NULL | パスワードハッシュ |
| email | varchar(255) | NOT NULL, UNIQUE | メールアドレス |
| role | enum('admin','editor','viewer') | NOT NULL DEFAULT 'editor' | 権限レベル |
| last_login | datetime | NULL | 最終ログイン日時 |
| status | tinyint(1) | NOT NULL DEFAULT 1 | アカウント状態 |
| created_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP | 作成日時 |
| updated_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | 更新日時 |

#### access_logs (アクセスログテーブル)
| カラム名 | データ型 | 制約 | 説明 |
|---------|---------|------|------|
| id | bigint(20) | PRIMARY KEY, AUTO_INCREMENT | ログID |
| user_id | int(11) | NULL | ユーザーID |
| page | varchar(255) | NOT NULL | ページURL |
| ip_address | varchar(45) | NOT NULL | IPアドレス |
| user_agent | varchar(255) | DEFAULT NULL | ユーザーエージェント |
| created_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP | アクセス日時 |

### 2. レビュー系テーブル

#### reviews (レビューテーブル)
| カラム名 | データ型 | 制約 | 説明 |
|---------|---------|------|------|
| id | int(11) | PRIMARY KEY, AUTO_INCREMENT | レビューID |
| store_id | int(11) | NOT NULL | 店舗ID |
| admin_id | int(11) | NOT NULL | 投稿管理者ID |
| author_name | varchar(50) | NOT NULL DEFAULT 'サイト管理者' | 表示用投稿者名（固定） |
| title | varchar(255) | NOT NULL | レビュータイトル |
| content | text | NOT NULL | レビュー内容 |
| pros | text | DEFAULT NULL | 良い点 |
| cons | text | DEFAULT NULL | 悪い点 |
| visit_date | date | DEFAULT NULL | 訪問日 |
| rating_assortment | tinyint(1) | NOT NULL | 品揃えの傾向（5段階） |
| rating_display_clarity | tinyint(1) | NOT NULL | 陳列の見やすさ（5段階） |
| rating_cleanliness | tinyint(1) | NOT NULL | 店内の清潔感（5段階） |
| rating_pricing | tinyint(1) | NOT NULL | 値付け（5段階） |
| rating_customer_base | tinyint(1) | NOT NULL | 客層（5段階） |
| rating_accessibility | tinyint(1) | NOT NULL | 立地・行きやすさ（5段階） |
| overall_rating | decimal(3,2) | NOT NULL | 総合評価（自動計算） |
| status | enum('draft','published','archived') | NOT NULL DEFAULT 'draft' | 公開状態 |
| admin_comment | text | DEFAULT NULL | 管理者コメント |
| created_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP | 作成日時 |
| updated_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | 更新日時 |

### 3. 店舗拡張テーブル

#### stores_extension (店舗拡張テーブル)
| カラム名 | データ型 | 制約 | 説明 |
|---------|---------|------|------|
| id | int(11) | PRIMARY KEY, AUTO_INCREMENT | 拡張ID |
| store_id | int(11) | NOT NULL | 店舗ID |
| custom_url | varchar(255) | DEFAULT NULL | カスタムURL |
| meta_title | varchar(255) | DEFAULT NULL | メタタイトル |
| meta_description | text | DEFAULT NULL | メタ説明 |
| featured | tinyint(1) | NOT NULL DEFAULT 0 | 注目店舗フラグ |
| featured_order | int(11) | DEFAULT NULL | 注目表示順 |
| featured_text | text | DEFAULT NULL | 注目店舗説明文 |
| custom_content | text | DEFAULT NULL | カスタムコンテンツ |
| status | enum('active','inactive','pending') | NOT NULL DEFAULT 'active' | 状態 |
| created_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP | 作成日時 |
| updated_at | timestamp | NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP | 更新日時 |

## 📄 主要なSQLファイル一覧

| ファイル名 | 目的 | 状況 |
|----------|------|------|
| create_tables_v2.sql | 基本テーブル作成（更新版） | ✅ 完了 |
| alter_reviews_for_admin.sql | レビュー管理機能強化 | ✅ 完了 |
| store_extension.sql | 店舗拡張テーブル | ✅ 完了 |

## 🔄 データベースマイグレーション履歴

### 2025年6月17日 10:10
- レビューテーブルの管理者専用化
  - user_ipとnicknameカラムを削除
  - admin_idカラムを追加（管理者との紐付け）
  - author_nameを「サイト管理者」固定に変更
  - statusの値を draft/published/archived に変更

### 2025年6月17日 09:03
- レビュー評価項目の更新
  - 評価項目名を新しい店舗評価軸（6項目）に変更
  - カラム名を標準化（rating_プレフィックス）
  - 総合評価の自動計算ロジックを6項目平均に更新

### 2025年6月14日
- チェーン店拡張システムテーブル追加
- レビューシステムの基本実装

## 📝 ベストプラクティス

1. すべてのテーブルには `created_at` と `updated_at` を含める
2. カスケードは使用せず、アプリケーションレベルで制御
3. indexは適切に設定（検索頻度の高いカラム、外部キー）
4. トランザクションを適切に使用
5. インデックスは頭文字を `idx_` とする
6. 文字列カラムには適切な長さ制限を設ける
7. 評価値は1-5の整数値のみを許可する
8. 評価項目名は `rating_` プレフィックスを使用する
9. レビューの投稿者は管理者のみとし、表示名は「サイト管理者」で固定
