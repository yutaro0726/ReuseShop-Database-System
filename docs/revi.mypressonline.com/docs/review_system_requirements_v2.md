# レビューシステム要件仕様書 v2.1

## 📋 システム概要

REVIのレビューシステムは、店舗評価に特化した、管理者のみがレビューを投稿可能な、匿名性重視のレビュープラットフォームです。一般ユーザーには完全に匿名化されたレビューのみが表示され、AI支援により文体の特徴も除去されます。

## 🎯 基本方針

### 匿名性の確保
- 一般ユーザーからは投稿者が特定できない
- 文体の特徴をAIで除去し、匿名性を向上
- レビュー投稿は管理画面のみで可能

### SEO対応
- Schema.org構造化データによるGoogle対応
- リッチスニペット表示最適化
- 検索エンジンフレンドリーな設計

### 店舗評価軸（6項目）
1. 品揃えの傾向（rating_assortment）：5段階評価
2. 陳列の見やすさ（rating_display_clarity）：5段階評価
3. 店内の清潔感（rating_cleanliness）：5段階評価
4. 値付け（rating_pricing）：5段階評価
5. 客層（rating_customer_base）：5段階評価
6. 立地・行きやすさ（rating_accessibility）：5段階評価

※総合評価は上記6項目の平均値で自動計算

## 🔐 アクセス権限

### 管理者（admin/editor）
- レビューの投稿・編集・削除
- AI文体変換機能の利用
- 完全なレビュー管理
- 構造化データ管理

### 一般ユーザー
- レビューの閲覧のみ
- 投稿者情報は一切表示されない
- AI処理済みの匿名化された文章のみ閲覧

## 🤖 AI匿名化機能

### Gemini API連携
- `system/config/ai_config.php`でAPIキー管理
- 文体の特徴を除去
- 個人的な表現を一般的な表現に変換
- 元の意味を保持した匿名化

### 処理対象
- レビューコメント全項目
- 文体の統一
- 個人識別可能な表現の除去

### AI設定
```php
// system/config/ai_config.php
return [
    'gemini' => [
        'api_key' => 'YOUR_GEMINI_API_KEY',
        'model' => 'gemini-pro',
        'anonymize_prompt' => '以下のレビュー文章を、元の意味を保持しながら匿名性を高めるように書き換えてください...'
    ]
];
```

## 📊 Schema.org構造化データ

### LocalBusiness対応
```json
{
  "@context": "https://schema.org/",
  "@type": "LocalBusiness",
  "name": "店舗名",
  "address": {...},
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": 4.2,
    "reviewCount": 25,
    "bestRating": 5,
    "worstRating": 1
  },
  "review": {
    "@type": "Review",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "4.5",
      "bestRating": "5",
      "worstRating": "1"
    },
    "author": {
      "@type": "Person",
      "name": "匿名レビュアー"
    },
    "datePublished": "2025-06-17",
    "reviewBody": "【品揃え】4.0 【陳列】4.5 【清潔感】5.0 【値付け】4.0 【客層】4.0 【立地】5.0\n店内は非常に清潔で、商品の陳列も見やすく工夫されています..."
  }
}
```

## 🏗️ 実装アーキテクチャ

### フロントエンド（一般ユーザー向け）
```
/store_detail.php
├── 店舗基本情報表示
├── 匿名化レビュー一覧
├── 集計評価表示
└── Schema.org構造化データ出力
```

### バックエンド（管理者向け）
```
/admin/
├── reviews.php（レビュー管理）
├── review_form.php（レビュー投稿・編集）
├── ai_anonymize.php（AI匿名化処理）
└── schema_manager.php（構造化データ管理）
```

## 🔧 技術仕様

### 検索機能
- トップページの検索フォームは廃止
- 各セクション内でのみ検索機能を提供
- 検索条件はURLパラメータで管理

### レビューデータ構造
```sql
ALTER TABLE reviews 
ADD COLUMN anonymized_content TEXT COMMENT 'AI匿名化済みコメント',
ADD COLUMN ai_processed BOOLEAN DEFAULT FALSE COMMENT 'AI処理済みフラグ',
ADD COLUMN display_author VARCHAR(50) DEFAULT 'レビュアー' COMMENT '表示用投稿者名';
```

## 🎨 UI/UX設計

### 店舗評価表示
- 6項目の評価をレーダーチャートで可視化
- 各評価項目の詳細を折りたたみ形式で表示
- 総合評価は目立つ位置に配置

### レビュー一覧
- 評価の高い順にソート
- ページネーション対応
- フィルタリング機能

## 📈 SEO最適化

### 構造化データ
- LocalBusinessスキーマ対応
- レビュー・評価情報の構造化
- サイトマップXML自動生成

### コンテンツ最適化
- パンくずリスト実装
- メタデータの動的生成
- OGP対応

## 🔄 運用フロー

### レビュー投稿
1. 管理者がレビューを作成
2. 6項目の評価を入力
3. AI匿名化処理を実行
4. 構造化データを更新
5. 公開設定の確認
6. 公開処理の実行

### 定期メンテナンス
- AI処理の品質チェック
- 評価の整合性確認
- 構造化データの検証

## 📊 KPI指標

### 基本指標
- レビュー投稿数
- 閲覧数（PV/UU）
- 直帰率

### 品質指標
- AI匿名化の精度
- 評価の分布
- リッチスニペット表示率

## 🚀 実装フェーズ

### Phase 1: 基盤実装（完了）
- [x] 管理者専用レビュー機能
- [x] 6項目評価システム
- [x] 基本的な構造化データ

### Phase 2: 改善実装（進行中）
- [ ] AI匿名化の精度向上
- [ ] 検索機能の最適化
- [ ] パフォーマンス改善

この仕様に基づいて、店舗評価に特化した、より使いやすいレビューシステムを構築します。