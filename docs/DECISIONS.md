# RSFDS 親 repo の設計決定

RSFDS 親 repo (ReuseShop-Database-System) レベルの設計決定と根拠。

## DEC-1: 3repo 体制の採用

### 決定

RSFDS 全体を 3 つの実装 repo に分割する。

```
ReuseShop-Database-System (親)
├── Reuse-Shop-DataBase (RSFDB + RSFD)
└── diglog-review-site (DIG LOG)
```

### 根拠

1. **責務の分離**: 店舗マスター、公開サイト、レビュー機能を別 repo で管理
2. **開発チームの独立性**: 各機能の開発・デプロイサイクルが異なる
3. **依存性の最小化**: RSFDB ↔ DIG LOG は読み取りのみ、逆流なし
4. **スケーラビリティ**: 各 repo が独立してスケール可能

### 影響範囲

- `ReuseShop-Database-System`: 親 repo・統括・計画
- `Reuse-Shop-DataBase`: 店舗マスター・公開サイト
- `diglog-review-site`: レビュー・スコア・承認
- `integrated-system-atlas`: SSOT・Context Pack

### 除外

- DIG LOG を RSFD に統合しない（別人格・別 repo）
- `rsfdb.suyalist.com` を現行正本として復活させない（archived）
- `hdf-admin-system` を現行正本として扱わない（deprecated）

---

## DEC-2: repo 名と概念名の分離

### 決定

repo 名は固有名詞として現状維持し、ドキュメント内では概念名を使う。

### 理由

1. **GitHub URL の安定性**: repo 名を変更するとURLが変わる
2. **Git history の保全**: repo 名変更は歴史的な追跡を難しくする
3. **概念と実装の分離**: ドキュメントは概念で一貫性を保つ

### Mapping

| repo 名 | 概念名 | 説明 |
|--------|--------|------|
| ReuseShop-Database-System | RSFDS | Reuse Shop Field Database System |
| Reuse-Shop-DataBase | RSFDB / RSFD | Reuse Shop Field DB（店舗マスター + 公開サイト） |
| diglog-review-site | DIG LOG | Dig Log（匿名レビュー・スコア） |

### ドキュメント表記例

```markdown
// ✓ 正しい
repo 名は `Reuse-Shop-DataBase` ですが、概念的には RSFDB と RSFD を統括します。

// ✗ 誤り
`Reuse-Shop-DataBase` は RSFD repo です。
```

---

## DEC-3: DIG LOG と RSFD の非統合

### 決定

DIG LOG と RSFD 公開サイトは統合しない。別人格・別 repo として管理する。

### 根拠

1. **身元の分離**: RSFD は公式・中立的メディア、DIG LOG は匿名・別人格
2. **機能の独立性**: 店舗情報と レビュー・スコアは異なる管理サイクル
3. **ユーザー体験**: 公開情報とレビュー投稿ページを分ける
4. **プライバシー**: DIG LOG ユーザーの匿名性を保護

### 接続方法

```
RSFDB (店舗マスター)
├─→ RSFD (公開サイト) ... 全店舗マスター
└─→ DIG LOG (レビュー) ... 公開可能な店舗マスター（読み取りのみ）
```

### 禁止パターン

- ❌ DIG LOG レビュー → RSFD 公開サイト へ表示
- ❌ DIG LOG ユーザー → RSFD / RSFDB へ寄せる
- ❌ RSFD 内でレビュー機能を実装

---

## DEC-4: 旧 repo と新 repo の関係

### 決定

旧 repo は現行正本として扱わず、legacy / archived / deprecated として整理する。

| repo | 状態 | 扱い |
|------|------|------|
| `rsfdb.suyalist.com` | archived | 統合元。2026-06-19 以降は legacy。remote repo はarchive済み |
| `hdf-admin-system` | deprecated | 参照のみ。migration complete。archive 検討中 |

### 根拠

1. **単一の正本**: `Reuse-Shop-DataBase` を RSFDB + RSFD の正本とする
2. **混乱回避**: 複数の "正本" を持たない
3. **移行完了**: 旧 repo の機能はすべて新体制で覆える

---

**Last Updated**: 2026-06-20