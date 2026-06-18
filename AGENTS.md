# AGENTS.md

## 基本方針

このリポジトリ `ReuseShop-Database-System` は、ハードオフ・リサイクルショップ巡り関連の複数システムを統括する **monorepo** です。

各サブリポジトリは独立した `.git` を保持し、独自の AGENTS.md を持ちます。

## Monorepo 構成

```
rsfds-pj/                    ← このリポジトリ
├── Reuse-Shop-DataBase/     ← 店舗情報管理・スクレイピング
├── Diglog-Review-Site/      ← レビューサイト（Laravel）
├── docs/                    ← 統一ドキュメント
└── .git/                    ← monorepo Git
```

### サブリポジトリ

各サブリポジトリは自身の `.git` を保持します：

- **Reuse-Shop-DataBase** (旧 hdf-admin-system)
  - GitHub: yutaro0726/Reuse-Shop-DataBase
  - 責務: 店舗マスタ管理、スクレイピング、同期データ生成
  - AGENTS.md を参照

- **Diglog-Review-Site** (旧 diglog-review-site)
  - GitHub: yutaro0726/diglog-review-site
  - 責務: 公開レビューサイト、レビュー管理
  - AGENTS.md を参照

- **rsfdb.suyalist.com** (旧 hdf.suyalist.com)
  - GitHub: yutaro0726/rsfdb.suyalist.com
  - 責務: 売却サイト フロントエンド
  - AGENTS.md を参照

## 開発時の注意

### クローン

```powershell
git clone https://github.com/yutaro0726/ReuseShop-Database-System.git
cd ReuseShop-Database-System
# 各サブディレクトリは独立したリポジトリなので、各々 git pull を実行
cd Reuse-Shop-DataBase && git pull origin main
cd ../Diglog-Review-Site && git pull origin main
cd ../Reuse-Shop-DataBase/rsfdb.suyalist.com && git pull origin main
```

### 作業フロー

各サブリポジトリで作業する場合：

```powershell
cd Reuse-Shop-DataBase
git status
git checkout -b feature/your-branch
# ... 変更 ...
git add .
git commit -m "your message"
git push origin feature/your-branch
# GitHub で PR 作成
```

**重要**: サブリポジトリの変更は、そのリポジトリの `main` に `push` してください。  
親リポジトリ（rsfds-pj）には、ドキュメント変更のみ commit してください。

### ドキュメント

統一ドキュメントは `docs/` に集約されています：

```
docs/
├── Reuse-Shop-DataBase/      ← 店舗管理システムのドキュメント
├── Diglog-Review-Site/       ← レビューサイトのドキュメント
├── rsfdb.suyalist.com/       ← 売却サイトのドキュメント
└── revi.mypressonline.com/   ← レビューアプリのドキュメント
```

各サブリポジトリの `docs/` フォルダは削除されて、ここに集約されています。

## Git運用

### parent リポジトリ（rsfds-pj）

- ドキュメント更新のみ commit
- ドキュメント作業は `main` に直接 commit 可
- 大規模変更は pull request で

### サブリポジトリ

各リポジトリの AGENTS.md に従ってください。

## ドキュメント運用

### Docs maintenance rules

- Docs-only work may be committed directly to main.
- Prefer small diffs over full-file rewrites.
- Prefer updating existing docs/INDEX.md, MOC, and existing README links before creating a new README.
- Use relative links for internal documentation.
- Use Mermaid when it clarifies system relations, flows, states, or dependencies.
- Archive outdated docs instead of deleting them when historical value remains.
- Mark uncertain items as REVIEW_REQUIRED.
- If an operation is blocked, do not retry the same large operation repeatedly. Produce a Handoff section with target operation, blockers, and suggested next steps.

## vhost 設定（ローカル開発）

### Windows hosts ファイル

```
127.0.0.1  hdf.local
127.0.0.1  rsfdb.suyalist.local
127.0.0.1  diglog.local
```

### Apache vhosts

- `hdf.local` → `Reuse-Shop-DataBase/public_html`
- `rsfdb.suyalist.local` → `Reuse-Shop-DataBase/rsfdb.suyalist.com/suyalist.com/public_html/rsfdb.suyalist.com/public`
- `diglog.local` → `Diglog-Review-Site/revi.mypressonline.com/` (disabled by default)

## よくある作業

### ドキュメント追加・修正

```powershell
cd rsfds-pj
# docs/ フォルダに新規ファイル作成 or 既存ファイル編集
git add docs/
git commit -m "docs: add XXX"
git push origin main
```

### サブリポジトリの機能開発

```powershell
cd Reuse-Shop-DataBase
git checkout -b feature/new-feature
# ... 開発 ...
git push origin feature/new-feature
# GitHub で PR 作成、review → merge
```

### サブリポジトリの docs 更新（非推奨）

**注意**: サブリポジトリの `docs/` は既に削除されています。  
ドキュメント更新は `docs/` 配下（親リポジトリ）で行ってください。

```powershell
# ❌ 間違い
cd Diglog-Review-Site
# docs/ は存在しません

# ✅ 正しい
cd ../
# docs/Diglog-Review-Site/ に追加・修正
```

## 回答言語

- 原則として日本語で回答する
- コマンド、パス、ファイル名は原文のまま正確に書く
