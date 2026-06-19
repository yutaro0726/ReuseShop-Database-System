# RSFDS Docs Structure

**Status**: `active`
**Last Updated**: 2026-06-20

この文書は、`ReuseShop-Database-System/docs/` 配下の整理方針を定義する。

このrepoはRSFDS親repoであり、実装詳細の正本ではなく、3repo体制・横断方針・計画・棚卸しを扱う。

## 基本方針

- 現行docsとlegacy docsを混ぜない。
- 仕様書、計画、タスク、意思決定、作業ログ、旧資料を分離する。
- 秘密情報候補を含む可能性がある旧資料は、全文確認や本文転記を避ける。
- 削除や大量移動は後工程に回し、まず索引化で状態を固定する。
- 判断不能なものは `REVIEW_REQUIRED` として残す。

## 推奨構成

| 区分 | 役割 | 現在の代表ファイル |
|---|---|---|
| Entry | 入口・MOC | `INDEX.md`, root `README.md` |
| Planning | 計画・優先度 | `PLAN.md` |
| Tasks | タスク・状態管理 | `TASKS.md` |
| Decisions | 決定・根拠 | `DECISIONS.md` |
| Inventory | 棚卸し・移行前確認 | `REPOSITORY_RENAME_INVENTORY.md`, `LEGACY_DOCS_INVENTORY.md` |
| Legacy | 旧資料・移管元 | `revi.mypressonline.com/`, `rsfdb.suyalist.com/` |

## 現行docs

以下を現行docsとして扱う。

| ファイル | 役割 |
|---|---|
| `INDEX.md` | docs全体の入口 |
| `PLAN.md` | 親repoの計画 |
| `TASKS.md` | 親repoのタスク管理 |
| `DECISIONS.md` | 親repoの設計決定 |
| `DOCS_STRUCTURE.md` | docs整理方針 |
| `REPOSITORY_RENAME_INVENTORY.md` | repo rename前の影響範囲棚卸し |
| `LEGACY_DOCS_INVENTORY.md` | legacy docsの棚卸し |

## legacy docs

以下は現行正本ではなく、旧プロジェクト由来の資料として扱う。

| パス | 推定由来 | 状態 |
|---|---|---|
| `docs/revi.mypressonline.com/` | DIG LOG旧設計・旧実装資料 | `legacy / REVIEW_REQUIRED` |
| `docs/rsfdb.suyalist.com/` | 旧RSFD / HDF時代の資料 | `legacy / REVIEW_REQUIRED` |

## 今後の整理案

将来的には以下の構成へ寄せる。

```text
ReuseShop-Database-System/docs/
├── INDEX.md
├── PLAN.md
├── TASKS.md
├── DECISIONS.md
├── DOCS_STRUCTURE.md
├── REPOSITORY_RENAME_INVENTORY.md
├── LEGACY_DOCS_INVENTORY.md
└── 99_archive/
    └── legacy-imports/
        ├── revi.mypressonline.com/
        └── rsfdb.suyalist.com/
```

ただし、旧資料には秘密情報候補が含まれる可能性があるため、移動前に索引化・秘密情報候補確認・昇格候補確認を行う。

## Mermaid: docs整理状態

```mermaid
flowchart TD
  Index["INDEX.md\n入口"] --> Current["Current docs\nPLAN / TASKS / DECISIONS"]
  Index --> Inventory["Inventory\nrename / legacy"]
  Inventory --> LegacyRevi["revi.mypressonline.com\nlegacy / REVIEW_REQUIRED"]
  Inventory --> LegacyRsfd["rsfdb.suyalist.com\nlegacy / REVIEW_REQUIRED"]
  Current --> Atlas["integrated-system-atlas\n横断SSOT"]
```

## REVIEW_REQUIRED

- legacy docsを `docs/99_archive/legacy-imports/` へ実移動するか
- 秘密情報候補を含むファイルの扱い
- DIG LOG旧設計のうち `diglog-review-site` へ移管済み/未移管の分類
- 旧RSFD/HDF資料のうち `Reuse-Shop-DataBase` へ移管済み/未移管の分類
- 作業ログや一時メモを残すかarchiveに閉じるか
