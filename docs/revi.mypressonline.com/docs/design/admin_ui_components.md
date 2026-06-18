# 管理画面 UIコンポーネント ガイドライン

## 概要
管理画面で使用するUIコンポーネントの一覧とその使用方法について説明します。

## 基本設定
以下のファイルを読み込んでください：

```html
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<!-- 管理画面用CSS（読み込み順序重要） -->
<link href="/admin/assets/css/admin_new.css" rel="stylesheet">     <!-- ベーススタイル -->
<link href="/admin/assets/css/layout.css" rel="stylesheet">        <!-- レイアウト -->
<link href="/admin/assets/css/components.css" rel="stylesheet">    <!-- UIコンポーネント -->
```

## 1. ボタン

### 基本的なボタン
```html
<button class="admin-btn">ボタン</button>
```

### バリエーション
```html
<button class="admin-btn admin-btn-success">成功</button>
<button class="admin-btn admin-btn-warning">警告</button>
<button class="admin-btn admin-btn-danger">危険</button>
<button class="admin-btn admin-btn-outline">アウトライン</button>
```

### サイズ
```html
<button class="admin-btn admin-btn-sm">小</button>
<button class="admin-btn">中（デフォルト）</button>
<button class="admin-btn admin-btn-lg">大</button>
```

### アイコン付きボタン
```html
<button class="admin-btn">
    <i class="fas fa-save"></i>
    保存
</button>
```

## 2. フォーム要素

### テキスト入力
```html
<div class="admin-form-group">
    <label class="admin-label">ラベル</label>
    <input type="text" class="admin-input" placeholder="プレースホルダー">
</div>
```

### セレクトボックス
```html
<div class="admin-form-group">
    <label class="admin-label">選択</label>
    <select class="admin-select">
        <option value="">選択してください</option>
        <option value="1">選択肢1</option>
        <option value="2">選択肢2</option>
    </select>
</div>
```

### テキストエリア
```html
<div class="admin-form-group">
    <label class="admin-label">説明</label>
    <textarea class="admin-textarea" rows="5"></textarea>
</div>
```

## 3. カード

### 基本的なカード
```html
<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">タイトル</h2>
    </div>
    <div class="admin-card-body">
        コンテンツ
    </div>
    <div class="admin-card-footer">
        フッター
    </div>
</div>
```

## 4. テーブル

### 基本的なテーブル
```html
<table class="admin-table">
    <thead>
        <tr>
            <th>列1</th>
            <th>列2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>データ1</td>
            <td>データ2</td>
        </tr>
    </tbody>
</table>
```

### ホバー効果付きテーブル
```html
<table class="admin-table admin-table-hover">
```

### ストライプ付きテーブル
```html
<table class="admin-table admin-table-striped">
```

## 5. アラート

### 成功メッセージ
```html
<div class="admin-alert admin-alert-success">
    処理が完了しました。
</div>
```

### 警告メッセージ
```html
<div class="admin-alert admin-alert-warning">
    注意が必要です。
</div>
```

### エラーメッセージ
```html
<div class="admin-alert admin-alert-danger">
    エラーが発生しました。
</div>
```

## 6. バッジ

### ステータス表示
```html
<span class="admin-badge">デフォルト</span>
<span class="admin-badge admin-badge-success">成功</span>
<span class="admin-badge admin-badge-warning">警告</span>
<span class="admin-badge admin-badge-danger">エラー</span>
```

## 7. ページネーション

### 基本的なページネーション
```html
<div class="admin-pagination">
    <a href="#" class="admin-pagination-item disabled">&laquo;</a>
    <a href="#" class="admin-pagination-item active">1</a>
    <a href="#" class="admin-pagination-item">2</a>
    <a href="#" class="admin-pagination-item">3</a>
    <a href="#" class="admin-pagination-item">&raquo;</a>
</div>
```

## 使用上の注意

1. コンポーネントの組み合わせ
- 複数のコンポーネントを組み合わせる場合は、適切な余白を保つこと
- カード内にテーブルやフォームを配置する場合は、`admin-card-body`内に配置すること

2. レスポンシブ対応
- すべてのコンポーネントは768px以下の画面幅でもレイアウトが崩れないよう設計
- 特にテーブルは横スクロール対応が必要な場合がある

3. アイコンの使用
- Font Awesomeアイコンは適切な用途で使用すること
- アイコンとテキストの組み合わせは視認性を考慮すること

4. アクセシビリティ
- フォーム要素には必ずラベルを付与すること
- 適切な見出しレベル（h1-h6）を使用すること

この文書は随時更新していきます。