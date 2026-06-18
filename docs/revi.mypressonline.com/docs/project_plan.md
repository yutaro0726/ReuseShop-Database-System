# リサイクルショップレビューサイト プロジェクト計画書

## プロジェクト概要
リサイクルショップのレビューサイトを `/recycle-reviews` 階層下に構築します。

## 技術要件
- Bootstrap 5 フレームワーク
- PHP（UTF-8 BOMなし）
- MySQL データベース
- レスポンシブデザイン
- 共通UI/UXコンポーネント

## ディレクトリ構成
```
revi.mypressonline.com/
├── recycle-reviews/                # リサイクルレビューサイト
│   ├── index.php                  # トップページ
│   ├── shop/                      # ショップ関連
│   │   ├── list.php              # ショップ一覧
│   │   ├── detail.php            # ショップ詳細
│   │   └── search.php            # ショップ検索
│   ├── review/                    # レビュー関連
│   │   ├── list.php              # レビュー一覧
│   │   ├── write.php             # レビュー投稿
│   │   └── detail.php            # レビュー詳細
│   ├── user/                      # ユーザー関連
│   │   ├── login.php             # ログイン
│   │   ├── register.php          # 新規登録
│   │   └── profile.php           # プロフィール
│   └── api/                       # API エンドポイント
│       ├── shops.php             # ショップAPI
│       └── reviews.php           # レビューAPI
├── assets/                        # 共通アセット
│   ├── css/
│   │   ├── bootstrap.min.css     # Bootstrap 5
│   │   └── custom.css            # カスタムスタイル
│   ├── js/
│   │   ├── bootstrap.bundle.min.js
│   │   └── custom.js             # カスタムJS
│   └── images/                    # 画像ファイル
└── components/                    # 共通コンポーネント
    ├── header.php                 # 共通ヘッダー
    ├── footer.php                 # 共通フッター
    ├── sidebar.php                # サイドメニュー
    └── navigation.php             # ナビゲーション
```

## タスク分解

### Phase 1: 基盤構築
- [ ] 1.1 プロジェクト設定ファイル作成
- [ ] 1.2 データベース設計・作成
- [ ] 1.3 Bootstrap 5 セットアップ
- [ ] 1.4 共通コンポーネント作成

### Phase 2: 共通UI/UX
- [ ] 2.1 ヘッダー・フッター作成
- [ ] 2.2 サイドメニュー作成
- [ ] 2.3 ナビゲーション設計
- [ ] 2.4 レスポンシブ対応

### Phase 3: 基本機能実装
- [ ] 3.1 トップページ
- [ ] 3.2 ショップ一覧・詳細
- [ ] 3.3 レビュー機能
- [ ] 3.4 検索機能

### Phase 4: ユーザー機能
- [ ] 4.1 ユーザー認証
- [ ] 4.2 レビュー投稿
- [ ] 4.3 プロフィール管理

### Phase 5: API・最適化
- [ ] 5.1 REST API 実装
- [ ] 5.2 パフォーマンス最適化
- [ ] 5.3 セキュリティ強化

## データベース設計
### 主要テーブル
1. `recycle_shops` - リサイクルショップ情報
2. `shop_reviews` - レビュー情報
3. `users` - ユーザー情報
4. `shop_categories` - ショップカテゴリ

## 進捗管理
- 各サブタスクは完了時にチェック
- 問題発生時は docs/issues.md に記録
- 仕様変更は docs/changelog.md に記録

## セキュリティ対策
- XSS対策（HTMLエスケープ）
- CSRF対策（トークン検証）
- SQLインジェクション対策（プリペアドステートメント）
- ファイルアップロード制限

---
作成日: 2025/06/13
更新日: 2025/06/13