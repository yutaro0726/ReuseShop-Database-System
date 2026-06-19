# RSFDS 親 repo のタスク管理

RSFDS 親 repo (`ReuseShop-Database-System`) のタスク一覧。

## タスク状態の定義

| 状態 | 意味 |
|------|------|
| `todo` | 未着手 |
| `doing` | 作業中 |
| `blocked` | 外部要因で停止 |
| `done` | 完了 |
| `REVIEW_REQUIRED` | 判断保留（情報待ち） |

## P0 タスク

高優先度：すぐに対応が必要

| ID | 状態 | タスク | 詳細 | 次アクション |
|---|------|------|------|----------|
| 1-1 | done | RSFDS親repo入口整備 | README / docs/INDEX.md を作成 | 完了 |
| 1-2 | doing | Atlas導線整備 | Context Packへの相対リンク確認 | `integrated-system-atlas` と整合確認 |
| 1-3 | todo | 3repo責務境界確認 | RSFDB / RSFD / DIG LOGの説明を揃える | 各repoドキュメント完成後にレビュー |
| 1-9 | done | docs構造整理 | 現行docs/legacy docs/棚卸しdocsの区分を作成 | `docs/DOCS_STRUCTURE.md` 作成済み |
| 1-10 | done | legacy docs棚卸し | 旧 `revi.mypressonline.com` / `rsfdb.suyalist.com` を索引化 | `docs/LEGACY_DOCS_INVENTORY.md` 作成済み |
| 1-13 | done | archive入口作成 | `docs/99_archive/legacy-imports/` と旧パスstub READMEを作成 | 完了 |

## P1 タスク

中優先度：計画的に対応

| ID | 状態 | タスク | 詳細 | 次アクション |
|---|------|------|------|----------|
| 1-4 | todo | 3repo横断リンク確認 | README / docs / public-site の相互リンク確認 | docs/INDEX.md を更新 |
| 1-5 | done | Archive方針確認 | 旧資料の移管先を確認 | `docs/99_archive/legacy-imports/` を作成済み |
| 1-8 | done | repo rename影響範囲棚卸し | `ReuseShop-Database-System` と `Reuse-Shop-DataBase` のrename影響範囲を整理 | `docs/REPOSITORY_RENAME_INVENTORY.md` 作成済み |
| 1-11 | doing | legacy docs物理移動 | 旧docsを `docs/99_archive/legacy-imports/` へ移動 | GitHub connectorでは一括移動不可。ローカルcloneで継続 |
| 1-12 | REVIEW_REQUIRED | legacy docs昇格候補確認 | DIG LOG旧設計/旧RSFD資料のうち現行docsへ要約昇格するものを選定 | 各実装repo側docsと照合 |
| 1-14 | REVIEW_REQUIRED | 秘密情報候補ファイルの扱い | environment/server/deployment系を本文保存するか要約化するか決める | 実値を転記せずローカル確認 |

## P2 タスク

低優先度：余裕があれば対応

| ID | 状態 | タスク | 詳細 | 次アクション |
|---|------|------|------|----------|
| 1-6 | done | repo名と概念名の分離確認 | repo名には `Field` が含まれないが、概念名では RSFDS = Reuse Shop Field Database System と明示する | DEC-2 / README / INDEX で整理済み |
| 1-7 | todo | CI/CD ドキュメント | deploy・test・lint の入口 | 実装チーム確認待ち |

## タスク依存グラフ

```text
1-1 ✓ (done)
├── 1-2 (doing) → 1-3 (todo) → 1-4 (todo)
├── 1-8 ✓ (done: repo rename inventory)
├── 1-9 ✓ (done: docs structure)
│   └── 1-10 ✓ (done: legacy inventory)
│       ├── 1-13 ✓ (done: archive entrypoints)
│       ├── 1-11 (doing: physical move)
│       ├── 1-12 (REVIEW_REQUIRED: promote candidates)
│       └── 1-14 (REVIEW_REQUIRED: sensitive legacy files)
└── 各 repo ドキュメント完成待ち
    ├── 2-x: Reuse-Shop-DataBase
    └── 3-x: diglog-review-site
```

---

**Last Updated**: 2026-06-20
