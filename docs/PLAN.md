# RSFDS 親 repo の計画

RSFDS 親 repo (ReuseShop-Database-System) の計画と優先度。

## 優先度マトリックス

| 優先度 | 状態 | 項目 | 次アクション | 期限 |
|---|---|---|---|---|
| P0 | done | 3repo体制の入口整備 | README / docs/INDEX.md を整備 | 2026-06-19 ✓ |
| P0 | doing | Atlas導線確認 | `integrated-system-atlas` のContext Packへリンク確認 | 2026-06-19 |
| P1 | done | repo rename影響範囲棚卸し | `docs/REPOSITORY_RENAME_INVENTORY.md` を作成 | 2026-06-20 ✓ |
| P1 | todo | RSFDB / DIG LOG接続方針整理 | 各repoのPLAN/TASKSと整合させる | 2026-06-26 |
| P1 | todo | 3repoドキュメント統合チェック | 用語・責務・リンクの一貫性確認 | 2026-07-03 |

## 現在の進捗

### 2026-06-19

- ✓ README.md 作成
- ✓ docs/INDEX.md 作成
- ✓ docs/PLAN.md 作成
- ✓ docs/TASKS.md 作成
- ✓ docs/DECISIONS.md 作成

### 2026-06-20

- ✓ RSFDS正式名を Reuse Shop Field Database System に統一
- ✓ 将来rename先を `Reuse-Shop-Field-Database-System` として記録
- ✓ RSFDB将来rename先を `Reuse-Shop-Field-DataBase` として記録
- ✓ repo rename影響範囲棚卸しを作成

## マイルストーン

| 日時 | マイルストーン |
|------|---------|
| 2026-06-19 | RSFDS親repoドキュメント初版完成 |
| 2026-06-20 | repo rename影響範囲棚卸し完了 |
| 2026-06-26 | Reuse-Shop-DataBase ドキュメント整備完了 |
| 2026-06-26 | diglog-review-site ドキュメント整備完了 |
| 2026-07-03 | 3repo横断リンク確認・修正完了 |

## 依存関係

- `integrated-system-atlas` の RSFDS Context Pack が参照元
- 各 repo のドキュメントは親 repo のこのドキュメントと整合要
- repo rename実施前に `docs/REPOSITORY_RENAME_INVENTORY.md` のチェックリストを確認する

---

**Last Updated**: 2026-06-20
