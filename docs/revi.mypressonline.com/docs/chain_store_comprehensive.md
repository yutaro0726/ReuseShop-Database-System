# チェーンストア拡張システム 設計・実装計画書

## 📌 概要
本ドキュメントは、既存のリサイクルショップレビューシステムを拡張し、様々なチェーン店のレビューシステムに対応するための設計と実装計画について記述します。

**作成日**: 2025年6月14日  
**バージョン**: 1.0.0  
**対象システム**: revi.mypressonline.com

---

## 📊 現在の実装状況（2025/06/14時点）

### ✅ 完了済み項目
1. **データベース設計**: 6テーブル + 1ビュー + 1トリガー ✅
2. **クラス設計**: ChainStore、CorporateInfoService ✅
3. **設定管理**: chain_store_config.php ✅
4. **設計ドキュメント**: 包括的な設計書 ✅

### 📝 実装品質評価
- **データベース設計**: A評価（完全実装済み）
- **クラス設計**: A評価（主要機能実装済み）
- **セキュリティ設計**: B評価（基本対策済み、運用面要強化）
- **テスト**: 未実装（要対応）

## 🎯 システム目的

### 主要目標
- 既存のリサイクルショップシステムを基盤として、多様なチェーン店業種に対応
- FC運営元の法人情報管理機能の提供
- 外部データベースとの連携基盤の構築
- 統一されたレビューシステムの実現

### 📋 主要機能
1. **業種分類管理**: 様々な業種のチェーン店を分類管理
2. **チェーンブランド管理**: ブランド情報の一元管理
3. **店舗情報管理**: 個別店舗の詳細情報管理
4. **レビューシステム**: 統一されたレビュー投稿・管理機能
5. **法人情報管理**: FC運営元の法人情報と外部API連携
6. **外部DB連携**: 既存システムとのデータマッピング

### 🎯 対象業種
- リサイクルショップ（既存）
- 中古書店
- 中古車販売
- 中古家電
- ファストフード
- ファミリーレストラン
- コンビニエンスストア
- ドラッグストア

## 🏗️ アーキテクチャ設計

### システム構成図

```
┌───────────────────────┐      ┌────────────────────┐
│   フロントエンド       │      │     管理画面       │
│  (revi.mypressonline) │◄────►│  (admin.*.php)    │
└───────────┬───────────┘      └─────────┬──────────┘
            │                            │
            ▼                            ▼
┌───────────────────────────────────────────────────┐
│               アプリケーション層                    │
│                                                   │
│  ┌─────────────┐  ┌──────────────┐  ┌──────────┐  │
│  │ チェーン管理 │  │ レビュー管理  │  │ 法人情報 │  │
│  │  モジュール  │  │  モジュール   │  │ モジュール│  │
│  └─────┬───────┘  └───────┬──────┘  └────┬─────┘  │
│        │                  │               │       │
└────────┼──────────────────┼───────────────┼───────┘
         │                  │               │
         ▼                  ▼               ▼
┌────────────────────────────────────────────────────┐
│                  データアクセス層                    │
│                                                    │
│   ┌─────────────────┐       ┌────────────────┐     │
│   │ リサイクルショップ│       │  チェーン店DB   │     │
│   │       DB        │◄─────►│    拡張機能     │     │
│   └─────────────────┘       └────────────────┘     │
└────────────────────────────────────────────────────┘
```

### コンポーネント構成

1. **フロントエンドレイヤー**
   - ユーザー向けWebサイト（PHP+HTML+CSS+JavaScript）
   - レスポンシブデザイン（モバイル対応）

2. **アプリケーションレイヤー**
   - チェーン店管理モジュール
   - 法人情報管理モジュール
   - レビュー統合管理モジュール

3. **データアクセスレイヤー**
   - データベース接続管理
   - リポジトリパターン実装
   - キャッシュ機構

4. **外部連携レイヤー**
   - REST API
   - データ同期モジュール
   - 外部システム統合インターフェース

## 🗄️ データベース設計

### 主要テーブル
1. **revi_chains** (チェーンブランドテーブル)
   - 各チェーンブランドの基本情報を管理
   - 法人情報とのリレーション

2. **revi_corporates** (法人情報テーブル)
   - 企業・法人の基本情報を管理
   - 複数のチェーンを保有する親会社情報

3. **revi_stores** (店舗テーブル)
   - チェーンに属する個別店舗情報
   - 位置情報・運営情報・特徴

4. **revi_industry_types** (業種マスターテーブル)
   - 対応する業種の定義
   - 業種固有の機能設定

5. **revi_store_features** (店舗特徴テーブル)
   - 業種ごとの特徴フラグ（買取対応など）
   - 検索機能との連携

6. **revi_chain_reviews_aggregate** (レビュー集計ビュー)
   - チェーン全体のレビュー集計情報
   - パフォーマンス向上のための集計ビュー

## 📊 クラス設計

### 主要クラス
1. **ChainStore**
   - チェーン店情報のCRUD操作
   - チェーン全体のレビュー統計処理

```php
class ChainStore {
    private $id;
    private $chainCode;
    private $name;
    private $industryType;
    private $corporateId;
    
    public function getStores($params = []);
    public function getReviewStatistics();
    public function getRankingInIndustry();
    public function updateChainInformation(array $data);
    public function isActive();
}
```

2. **CorporateInfoService**
   - 法人情報の取得・管理
   - 外部APIとの連携

```php
class CorporateInfoService {
    private $apiEndpoint;
    private $apiKey;
    
    public function getCorporateByCode($code);
    public function searchCorporateByName($name);
    public function updateFromAPI($corporateCode);
    public function linkChainToCorporate($chainId, $corporateId);
}
```

3. **StoreManager**
   - 個別店舗の管理
   - 地域・エリア管理

```php
class StoreManager {
    public function getStoresByChain($chainId, $params = []);
    public function searchStores($criteria);
    public function importStoresFromCSV($filePath, $chainId);
    public function validateStoreData(array $data);
    public function geocodeStore(Store $store);
}
```

## 🎯 優先度別実装計画

### 🔥 **フェーズ1: 緊急対応項目**（1-2週間）

#### 1.1 データベース接続基盤の統合
**課題**: 既存のリサイクルショップDBとの接続統合が必要

**対応内容**:
```php
// system/lib/DatabaseManager.php の作成
class DatabaseManager {
    private static $instances = [];
    
    public static function getInstance($type = 'main') {
        // 複数DB接続の管理
        // 設定ファイルベースの接続管理
    }
}
```

**ファイル作成予定**:
- `system/lib/DatabaseManager.php`
- `system/config/database_config.php`（統合版）

#### 1.2 チェーン店基本管理画面
**課題**: 管理画面からチェーン店情報を登録・編集できる機能が必要

**対応内容**:
- チェーン管理CRUD画面の作成
- 業種ごとの表示切替機能
- 基本的な検索・フィルタ機能

**ファイル作成予定**:
- `admin/chain_management.php`
- `admin/includes/chain_form.php`
- `assets/js/admin/chain_manager.js`

### 🚀 **フェーズ2: 基本機能実装**（2-3週間）

#### 2.1 外部API連携基盤
**課題**: 法人情報を外部サービスから取得する仕組みが必要

**対応内容**:
- APIクライアント実装
- データマッピング処理
- エラーハンドリング

**ファイル作成予定**:
- `system/lib/ApiClient.php`
- `system/lib/CorporateDataMapper.php`

#### 2.2 店舗インポート機能
**課題**: CSVからの一括店舗登録機能が必要

**対応内容**:
- CSVアップロード機能
- バリデーション処理
- 一括登録処理

**ファイル作成予定**:
- `admin/import_stores.php`
- `system/lib/CsvImporter.php`

### 🌟 **フェーズ3: UI/UX強化**（3-4週間）

#### 3.1 検索機能強化
**課題**: より高度な検索・フィルタリング機能が必要

**対応内容**:
- 業種別検索条件の動的切り替え
- 地図検索機能
- 検索結果のキャッシュ機構

#### 3.2 レビュー統合
**課題**: 異なる業種間でレビュー体験を統一する必要がある

**対応内容**:
- 共通レビューフォーム
- 業種別の追加質問
- レビュー表示の最適化

## 🔐 セキュリティ設計

### データ保護対策
1. **入力バリデーション**
   - すべてのユーザー入力に対する厳格なバリデーション
   - SQLインジェクション対策

2. **アクセス制御**
   - RBACによる細かいアクセス制御
   - 管理画面の二要素認証

3. **データ暗号化**
   - 機密データのDB内暗号化
   - TLS 1.3による通信保護

4. **監査ログ**
   - 重要操作の監査ログ記録
   - 異常検知メカニズム

## 📊 運用設計

### バックアップ戦略
- 日次完全バックアップ
- 4時間ごとの差分バックアップ
- 1か月のバックアップ履歴保持

### モニタリング計画
- リソース使用状況（CPU、メモリ、ディスク）
- 応答時間とパフォーマンスメトリクス
- エラー率と例外発生頻度

### パフォーマンス最適化
- クエリ最適化
- キャッシュ戦略
- 画像最適化

## 📄 実装ファイル一覧

### 新規作成ファイル
1. **データベース関連**
   - `mysql/chain_store_extension.sql` - チェーン店拡張テーブル作成
   - `mysql/store_extension.sql` - 店舗テーブル拡張

2. **アプリケーションクラス**
   - `system/classes/ChainStore.php`
   - `system/classes/CorporateInfoService.php`
   - `system/classes/StoreManager.php`
   - `system/classes/IndustryTypeManager.php`

3. **管理画面**
   - `admin/chain_management.php`
   - `admin/corporate_management.php`
   - `admin/store_management.php`
   - `admin/import_stores.php`

4. **フロントエンド**
   - `chains/index.php` - チェーン一覧
   - `chains/detail.php` - チェーン詳細
   - `assets/css/chain.css` - チェーン専用スタイル

### 修正予定ファイル
1. **既存機能拡張**
   - `reviews.php` - レビュー機能拡張
   - `index.php` - トップページ修正
   - `includes/header.php` - ナビゲーション追加

2. **システム設定**
   - `system/config/config.php` - 設定追加
   - `system/init.php` - 初期化処理修正

## 🧪 テスト計画

### ユニットテスト
- PHPUnitによるクラスのユニットテスト
- モックを使用したAPI連携テスト

### 機能テスト
- チェーン店CRUD操作テスト
- レビュー投稿フローテスト
- 検索機能テスト

### 負荷テスト
- 大量データ登録時のパフォーマンステスト
- ピーク時のレスポンス時間測定

## 📚 ドキュメント計画

1. **管理者マニュアル**
   - チェーン店管理の基本操作
   - インポート機能の使い方
   - データ修正ガイドライン

2. **開発者向けドキュメント**
   - API仕様書
   - クラス図とER図
   - 拡張方法ガイド

3. **ユーザーガイド**
   - 新機能の紹介
   - レビュー投稿方法
   - 検索機能の使い方

## ⏱️ タイムライン

### 2025年7月
- フェーズ1完了：データベース統合、基本管理画面

### 2025年8月
- フェーズ2完了：外部API連携、CSVインポート

### 2025年9月
- フェーズ3完了：UI/UX強化、レビュー統合

### 2025年10月
- 最終テストとリリース準備

### 2025年11月
- 本番環境リリース
