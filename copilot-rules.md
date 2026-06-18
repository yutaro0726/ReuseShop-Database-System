# GitHub Copilot ガイドラインルール

## プロジェクト概要

このワークスペースは2つのPHPプロジェクトから構成されています：
- **【表】Xserver (Admin/API)** - スクレイピングとデータ管理API
- **【裏】Review Site (Laravel)** - レビューサイト（Laravel）

## Copilot 使用ガイドライン

### 1. コード生成時のルール

#### PHP コード
- PHP 7.4 以上を想定
- PSR-12 コーディング標準に従う
- 関数・クラスのドキュメントコメントを必須とする
- 型ヒントの使用を推奨

```php
/**
 * 関数の説明
 *
 * @param string $param パラメータの説明
 * @return bool 戻り値の説明
 */
public function functionName(string $param): bool
{
    // 実装
}
```

#### Laravel (【裏】Review Site)
- Laravel 11+ 推奨
- Eloquent ORM を使用
- ルートは RESTful に
- Blade テンプレートで HTML を生成
- Service クラスでビジネスロジックを分離

```php
// 正しいパターン
class UserService {
    public function createUser(array $data): User
    {
        return User::create($data);
    }
}
```

#### API (【表】Xserver)
- RESTful API設計に従う
- JSON形式でレスポンスを返す
- 適切なHTTPステータスコードを使用
- エラーレスポンス形式を統一

```php
// レスポンス形式
[
    'success' => true,
    'data' => [],
    'message' => 'Success',
    'error' => null
]
```

### 2. セキュリティ関連

- **機密情報**: .env ファイルの内容は絶対にコミット禁止
- **SQL インジェクション**: プリペアドステートメント必須
- **XSS 対策**: 出力時に必ず htmlspecialchars() で適切にエスケープ
- **CSRF 対策**: フォームに@csrf トークン必須（Laravel）
- **認証**: API は Bearer Token または Session ベース

### 3. ファイル構成ルール

#### 命名規則
- **クラス**: PascalCase (UserController.php)
- **関数**: camelCase (getUserData())
- **定数**: UPPER_SNAKE_CASE (MAX_RETRY_COUNT)
- **変数**: camelCase (userName)
- **データベース**: snake_case (user_profiles)
- **テーブル**: 複数形 (users, posts)

#### ディレクトリ構成
```
【表】Xserver/
  batch/        # スクレイパー・バッチ処理
  config/       # 設定ファイル
  public_html/  # Web ルート
  docs/         # ドキュメント
  logs/         # ログ出力先

【裏】Review Site (Laravel)/
  app/
    Http/       # コントローラー、ミドルウェア
    Models/     # Eloquent モデル
    Services/   # ビジネスロジック
  config/       # アプリ設定
  database/     # マイグレーション
  resources/    # Blade テンプレート、CSS/JS
  routes/       # ルート定義
  storage/      # キャッシュ、ログ
```

### 4. データベース関連

#### マイグレーション
- マイグレーションファイル名は `YYYY_MM_DD_HHMMSS_描述` 形式
- マイグレーションは冪等性を持たせる

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});
```

#### クエリ最適化
- N+1 クエリ問題を回避（eager load を使用）
- 不要なカラム取得を避ける
- インデックス設定を検討

### 5. エラーハンドリング

- 例外は具体的なクラスを使用
- ユーザーフレンドリーなエラーメッセージ
- ログには詳細情報を記録
- 本番環境ではスタックトレース非表示

```php
try {
    // 処理
} catch (ModelNotFoundException $e) {
    return response()->json(['error' => 'Not found'], 404);
} catch (Exception $e) {
    Log::error('Error:', ['exception' => $e]);
    return response()->json(['error' => 'Server error'], 500);
}
```

### 6. テスト関連

- PHPUnit を使用
- テストファイルは tests/ ディレクトリに配置
- テストメソッド名は `test` で始める
- テストケース：正常系・異常系・エッジケース

```php
public function testUserCreation()
{
    $user = User::factory()->create();
    $this->assertNotNull($user->id);
}
```

### 7. パフォーマンス考慮

- **キャッシング**: Redis/Memcached を活用
- **クエリ**: SELECT * は避け、必要なカラムのみ取得
- **外部API呼び出し**: タイムアウト設定、リトライロジック
- **スクレイピング**: ユーザーエージェント設定、遅延の適切な設定

### 8. コメント・ドキュメンテーション

- 複雑なロジックにはインラインコメント
- 関数・メソッドには PHPDoc ブロック
- README.md でプロジェクト概要を記載
- API はエンドポイント一覧を文書化

### 9. Copilot に禁止事項

以下をコード提案に含めないよう指示してください：
- 認証情報（API キー、パスワード）
- データベース接続文字列（実環境）
- 機密な個人情報
- ライセンス違反コード

### 10. コンテキスト指定ジャンプ

Copilot チャットで以下の情報を提供してください：
- 現在のファイルパス
- 関連する関数・クラス名
- エラーメッセージ（該当時）
- 期待される動作

---

## フォルダ別ガイドライン

### 【表】Xserver (Admin/API)

- スクレイピングロジックは batch/ に集約
- API レスポンスは統一形式で
- スクレイパー実行前に robots.txt を確認
- レート制限を設定（被告発回避）
- 定期実行は cron / Windows タスクスケジューラで管理

### 【裏】Review Site (Laravel)

- artisan コマンドで新規生成
- マイグレーション実行前に必ずバックアップ
- Blade でロジックを書かない（Service に処理を移す）
- middleware で認証・認可を統一
- queue 使用でメール送信等の重処理を非同期化

---

## Copilot チャットの効果的な使い方

### ✅ 良い例

```
「UserService の createUser メソッドに、重複チェック機能を追加してください。
同じメールアドレスのユーザーが存在する場合は DuplicateUserException をスロー」
```

### ❌ 悪い例

```
「コード書いて」
```

---

## 関連リソース

- [PSR-12 - Extended Coding Style](https://www.php-fig.org/psr/psr-12/)
- [Laravel Documentation](https://laravel.com/docs)
- [PHP Security](https://www.php.net/manual/en/security.php)
- [RESTful API Design](https://restfulapi.net/)
