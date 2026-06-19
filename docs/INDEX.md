# RSFDS 親 Repo ドキュメント INDEX

このドキュメントは、RSFDS 親 repo (`ReuseShop-Database-System`) のナビゲーション入口です。

RSFDS の正式名称は **Reuse Shop Field Database System** です。repo 名 `ReuseShop-Database-System` には `Field` が含まれませんが、概念名としては `Field` を含めて表記します。

## まず読む

| 優先 | ドキュメント | 目的 |
|---:|---|---|
| 1 | `README.md` | 親repoの全体説明 |
| 2 | `docs/INDEX.md` | このナビゲーション |
| 3 | `docs/DOCS_STRUCTURE.md` | docs整理方針・現行/legacyの分離ルール |
| 4 | `docs/PLAN.md` | RSFDS親repoの計画・優先度 |
| 5 | `docs/TASKS.md` | タスク管理・状態追跡 |
| 6 | `docs/DECISIONS.md` | 設計決定・根拠 |

## 棚卸し・移行確認

| ドキュメント | 目的 |
|---|---|
| `docs/REPOSITORY_RENAME_INVENTORY.md` | repo rename前の影響範囲棚卸し |
| `docs/LEGACY_DOCS_INVENTORY.md` | 旧プロジェクト由来docsの棚卸し |

## docs配下の扱い

| 区分 | 対象 | 扱い |
|---|---|---|
| 現行docs | `INDEX.md`, `PLAN.md`, `TASKS.md`, `DECISIONS.md`, `DOCS_STRUCTURE.md` | active |
| 棚卸しdocs | `REPOSITORY_RENAME_INVENTORY.md`, `LEGACY_DOCS_INVENTORY.md` | REVIEW_REQUIREDを含む管理台帳 |
| legacy docs | `revi.mypressonline.com/`, `rsfdb.suyalist.com/` | 現行正本ではない。本文転記注意 |

## 3repo 体制

```text
ReuseShop-Database-System (future: Reuse-Shop-Field-Database-System)
├── Reuse-Shop-DataBase (future: Reuse-Shop-Field-DataBase)
└── diglog-review-site (no rename planned)
```

## 各実装 repo へのリンク

### Reuse-Shop-DataBase（RSFDB + RSFD）

- current: `yutaro0726/Reuse-Shop-DataBase`
- future rename target: `yutaro0726/Reuse-Shop-Field-DataBase`
- 役割: 店舗マスター、公開サイト
- Docs: `Reuse-Shop-DataBase/docs/INDEX.md`

### diglog-review-site（DIG LOG）

- current: `yutaro0726/diglog-review-site`
- future rename target: 変更予定なし
- 役割: 匿名レビュー、スコア、承認
- Docs: `diglog-review-site/docs/INDEX.md`

## 外部 SSOT

横断的な用語・責務・接続の正本：

- リポジトリ: `yutaro0726/integrated-system-atlas`
- Context Pack: `70_Context_Packs/rsfds-context.md`

## 重要な決定

### DIG LOG と RSFD は統合しない

- **RSFD**: 公式・中立的メディア（店舗情報公開）
- **DIG LOG**: 匿名・別人格メディア（レビュー・スコア）
- 統合禁止: DIG LOG 内容を RSFD へ、RSFD 内容を DIG LOG へ逆流させない

### repo 名と概念名

repo 名は固有名詞として現状維持。ドキュメント内では概念名（RSFDS, RSFDB など）と分けて書く。

| repo 名 | future rename target | 概念名 |
|---|---|---|
| `ReuseShop-Database-System` | `Reuse-Shop-Field-Database-System` | RSFDS = Reuse Shop Field Database System |
| `Reuse-Shop-DataBase` | `Reuse-Shop-Field-DataBase` | RSFDB = Reuse Shop Field DB / RSFD |
| `diglog-review-site` | 変更予定なし | DIG LOG |

## legacy docs の注意

`docs/revi.mypressonline.com/` と `docs/rsfdb.suyalist.com/` は、旧プロジェクト由来の資料です。

- 現行正本ではありません。
- 秘密情報候補を含む可能性があるため、本文転記しません。
- 昇格候補は要約して現行repo側docsへ移します。
- 詳細は `docs/LEGACY_DOCS_INVENTORY.md` を参照してください。

## 次のステップ

1. **docs構造を確認** - `docs/DOCS_STRUCTURE.md`
2. **PLAN を確認** - `docs/PLAN.md`
3. **TASKS を確認** - `docs/TASKS.md`
4. **rename棚卸しを確認** - `docs/REPOSITORY_RENAME_INVENTORY.md`
5. **legacy棚卸しを確認** - `docs/LEGACY_DOCS_INVENTORY.md`
6. **各 repo のドキュメント** - `Reuse-Shop-DataBase` と `diglog-review-site` のドキュメントを確認

---

**Last Updated**: 2026-06-20
