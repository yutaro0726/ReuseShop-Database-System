# RSFDS 親 Repo ドキュメント INDEX

このドキュメントは、RSFDS 親 repo (ReuseShop-Database-System) のナビゲーション入口です。

## 3repo 体制

```
ReuseShop-Database-System (RSFDS親repo)
├── Reuse-Shop-DataBase (RSFDB + RSFD)
└── diglog-review-site (DIG LOG)
```

## ドキュメント構成

| ドキュメント | 目的 |
|----------|------|
| `README.md` | 親repoの全体説明 |
| `docs/INDEX.md` | このナビゲーション（このファイル） |
| `docs/PLAN.md` | RSFDS親repoの計画・優先度 |
| `docs/TASKS.md` | タスク管理・状態追跡 |
| `docs/DECISIONS.md` | 設計決定・根拠 |

## 各実装 repo へのリンク

### Reuse-Shop-DataBase（RSFDB + RSFD）

- リポジトリ: `yutaro0726/Reuse-Shop-DataBase`
- 役割: 店舗マスター、公開サイト
- Docs: `Reuse-Shop-DataBase/docs/INDEX.md`

### diglog-review-site（DIG LOG）

- リポジトリ: `yutaro0726/diglog-review-site`
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

| repo 名 | 概念名 |
|--------|--------|
| ReuseShop-Database-System | RSFDS |
| Reuse-Shop-DataBase | RSFDB / RSFD |
| diglog-review-site | DIG LOG |

## 次のステップ

1. **PLAN を確認** - `docs/PLAN.md` で優先度と進捗を把握
2. **TASKS を確認** - `docs/TASKS.md` で現在のタスク状態を確認
3. **各 repo のドキュメント** - `Reuse-Shop-DataBase` と `diglog-review-site` のドキュメントを確認

---

**Last Updated**: 2026-06-19
