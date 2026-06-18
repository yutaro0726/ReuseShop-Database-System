# HDF Suyalist アプリケーション

## プロジェクト概要
ハードオフ店舗管理データベースアプリケーション

## 開発環境
- PHP 8.2.12
- Apache 2.4.58
- MariaDB 10.4.32
- XAMPP 8.2.12

## ディレクトリ構造
```
suyalist.com/
└── public_html/
│   └── hdf.suyalist.com/
├── app/              # アプリケーションコア
│   ├── config/      # 設定ファイル
│   ├── controllers/ # コントローラー
│   ├── core/        # フレームワークコア
│   └── models/      # モデル
├── resources/        # リソース
│   ├── views/       # ビューファイル
│   └── assets/      # アセット（CSS/JS等）
├── routes/          # ルーティング
├── storage/         # ストレージ
│   ├── logs/       # ログファイル
│   └── cache/      # キャッシュ
└── public/          # 公開ディレクトリ
    ├── index.php    # エントリーポイント
    ├── css/         # CSS
    └── js/          # JavaScript
```

## セットアップ手順
1. [開発環境セットアップ](docs/setup.md) を参照してください。. [環定ガイド](docs/environment.md) で追加設定を確認してください。

## 開発ガイドライン
- [コーディング規約](docs/coding-standards.md)
- [セキュリティガイドライン](docs/security.md)
- [デプロイメント手順](docs/deployment.md)

## 動作確認
1. http://hdf.suyalist.local/ にアクセス
2. Welcome画面が表示されることを確認
3. [テスト実行]ボタンでデータベース接続を確認

## トラブルシューティング
問題が発生した場合は [セットアップガイド](docs/setup.md) のトラブルシューティングセクションを参照してください。