# RSFDS 親 repo のタスク管理

RSFDS 親 repo (ReuseShop-Database-System) のタスク一覧。

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

## P1 タスク

中優先度：計画的に対応

| ID | 状態 | タスク | 詳細 | 次アクション |
|---|------|------|------|----------|
| 1-4 | todo | 3repo横断リンク確認 | README / docs / public-site の相互リンク確認 | docs/INDEX.md を更新 |
| 1-5 | todo | Archive方針確認 | 旧資料の移管先を確認 | 各repoの docs/99_archive/ を確認 |

## P2 タスク

低優先度：余裕があれば対応

| ID | 状態 | タスク | 詳細 | 次アクション |
|---|------|------|------|----------|
| 1-6 | REVIEW_REQUIRED | repo名変更検討 | "Field" を明示する repo 名への変更可否 | 要ユーザー判断 |
| 1-7 | todo | CI/CD ドキュメント | deploy・test・lint の入口 | 実装チーム確認待ち |

## タスク依存グラフ

```
1-1 ✓ (done)
├── 1-2 (doing) → 1-3 (todo) → 1-4 (todo)
└── 各 repo ドキュメント完成待ち
    ├── 2-x: Reuse-Shop-DataBase
    └── 3-x: diglog-review-site
```

---

**Last Updated**: 2026-06-19
