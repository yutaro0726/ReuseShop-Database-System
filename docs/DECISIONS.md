# RSFDS 親 repo の設計決定

RSFDS 親 repo (`ReuseShop-Database-System`) レベルの設計決定と根拠。

## DEC-1: 3repo 体制の採用

### 決定

RSFDS 全体を 3 つの実装 repo に分割する。

```text
ReuseShop-Database-System (親 / future: Reuse-Shop-Field-Database-System)
├── Reuse-Shop-DataBase (RSFDB + RSFD / future: Reuse-Shop-Field-DataBase)
└── diglog-review-site (DIG LOG / no rename planned)
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

ただし、Field抜けを解消するため、将来的なrename先を別欄で管理する。

### 理由

1. **GitHub URL の安定性**: repo 名を変更するとURLが変わる
2. **Git history の保全**: repo 名変更は作業者のlocal clone更新を伴う
3. **概念と実装の分離**: ドキュメントは概念で一貫性を保つ
4. **rename影響管理**: 実rename前にREADME/docs/Atlas/外部ツールの影響範囲を棚卸しする

### Mapping

| current repo | future rename target | 概念名 | 説明 |
|--------|---|--------|------|
| ReuseShop-Database-System | Reuse-Shop-Field-Database-System | RSFDS | Reuse Shop Field Database System |
| Reuse-Shop-DataBase | Reuse-Shop-Field-DataBase | RSFDB / RSFD | Reuse Shop Field DB（店舗マスター + 公開サイト） |
| diglog-review-site | 変更予定なし | DIG LOG | Dig Log（匿名レビュー・スコア） |

### rename前の棚卸し

rename前の影響範囲は `docs/REPOSITORY_RENAME_INVENTORY.md` を正本とする。

### ドキュメント表記例

```markdown
// ✓ 正しい
repo 名は `Reuse-Shop-DataBase` ですが、概念的には RSFDB と RSFD を統括します。
将来rename先は `Reuse-Shop-Field-DataBase` です。

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

```text
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

## DEC-5: 親repo docsは現行docsとlegacy docsを分離する

### 決定

`ReuseShop-Database-System/docs/` 配下は、現行docs・棚卸しdocs・legacy docsを明確に分離して扱う。

| 区分 | 対象 | 扱い |
|---|---|---|
| 現行docs | `INDEX.md`, `PLAN.md`, `TASKS.md`, `DECISIONS.md`, `DOCS_STRUCTURE.md` | active |
| 棚卸しdocs | `REPOSITORY_RENAME_INVENTORY.md`, `LEGACY_DOCS_INVENTORY.md` | 管理台帳 |
| legacy docs | `revi.mypressonline.com/`, `rsfdb.suyalist.com/` | 現行正本ではない。REVIEW_REQUIRED |

### 理由

1. **混線回避**: 旧DIG LOG資料・旧RSFD/HDF資料がdocs直下に混在しているため
2. **秘密情報対策**: 旧環境資料・server情報・deployment資料に秘密情報候補が含まれる可能性があるため
3. **導線整理**: README/INDEXから現行docsとlegacy docsを明確に分けて辿れるようにするため
4. **削除回避**: 旧資料はすぐ削除せず、索引化してからarchive移動または要約昇格を判断するため

### 正本

- docs整理方針: `docs/DOCS_STRUCTURE.md`
- legacy docs棚卸し: `docs/LEGACY_DOCS_INVENTORY.md`

### 除外

- legacy docsの本文を無条件に現行docsへ昇格しない
- 秘密情報候補を本文転記しない
- 大量移動・削除は別タスクで判断する

---

**Last Updated**: 2026-06-20
