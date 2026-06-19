# ReuseShop-Database-System

このリポジトリは、RSFDS (Reuse Shop Field Database System) 全体の親プロジェクトです。

Current repository: `yutaro0726/ReuseShop-Database-System`  
Future rename target: `yutaro0726/Reuse-Shop-Field-Database-System`

## RSFDS とは

リユースショップ巡回・店舗 DB・レビュー・訪問ログを束ねるフィールドワーク情報基盤。

## 現行 3repo 体制

本親 repo が統括する 3 つの実装 repo：

| Repo | Future rename target | 概念名 | 役割 |
|------|---|-------|------|
| `ReuseShop-Database-System` | `Reuse-Shop-Field-Database-System` | RSFDS | 親 repo（このrepo）/ 全体方針 / 統括 |
| `Reuse-Shop-DataBase` | `Reuse-Shop-Field-DataBase` | RSFDB + RSFD | 店舗マスター + 公開サイト |
| `diglog-review-site` | 変更予定なし | DIG LOG | 匿名レビュー・スコア・承認 |

## 概念名リファレンス

- **RSFDS**: Reuse Shop Field Database System
- **RSFDB**: Reuse Shop Field DB（店舗マスター）
- **RSFD**: RSFDB 公開サイト
- **DIG LOG**: 匿名レビュー・スコア・承認・レビュー表示

## Repo rename inventory

将来のrepo rename影響範囲は以下に集約します。

- `docs/REPOSITORY_RENAME_INVENTORY.md`

## 外部 SSOT

設計・責務・接続の正本：

- `yutaro0726/integrated-system-atlas`
  - [[10_Systems/rsfds|RSFDS]]
  - [[10_Systems/RSFDB|RSFDB]]
  - [[10_Systems/RSFD|RSFD]]
  - [[10_Systems/DIG_LOG|DIG LOG]]
  - [[70_Context_Packs/rsfds-context|RSFDS Context Pack]]

## 次に読む文書

- `docs/INDEX.md` - 親 repo のナビゲーション
- `docs/PLAN.md` - 親 repo の計画
- `docs/TASKS.md` - タスク管理
- `docs/REPOSITORY_RENAME_INVENTORY.md` - repo rename影響範囲棚卸し
- `integrated-system-atlas` - 横断 SSOT

---

**Last Updated**: 2026-06-20
