# RSFDS 親 Repo ドキュメント INDEX

このドキュメントは、RSFDS 親 repo (ReuseShop-Database-System) のナビゲーション入口です。

RSFDS の正式名称は **Reuse Shop Field Database System** です。repo 名 `ReuseShop-Database-System` には `Field` が含まれませんが、概念名としては `Field` を含めて表記します。

## 3repo 体制

```text
ReuseShop-Database-System (future: Reuse-Shop-Field-Database-System)
├── Reuse-Shop-DataBase (future: Reuse-Shop-Field-DataBase)
└── diglog-review-site (no rename planned)
```

## ドキュメント構成

| ドキュメント | 目的 |
|----------|------|
| `README.md` | 親repoの全体説明 |
| `docs/INDEX.md` | このナビゲーション（このファイル） |
| `docs/PLAN.md` | RSFDS親repoの計画・優先度 |
| `docs/TASKS.md` | タスク管理・状態追跡 |
| `docs/DECISIONS.md` | 設計決定・根拠 |
| `docs/REPOSITORY_RENAME_INVENTORY.md` | repo rename前の影響範囲棚卸し |

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
|--------|---|--------|
| ReuseShop-Database-System | Reuse-Shop-Field-Database-System | RSFDS = Reuse Shop Field Database System |
| Reuse-Shop-DataBase | Reuse-Shop-Field-DataBase | RSFDB = Reuse Shop Field DB / RSFD |
| diglog-review-site | 変更予定なし | DIG LOG |

## 次のステップ

1. **PLAN を確認** - `docs/PLAN.md` で優先度と進捗を把握
2. **TASKS を確認** - `docs/TASKS.md` で現在のタスク状態を確認
3. **rename棚卸しを確認** - `docs/REPOSITORY_RENAME_INVENTORY.md` でrename前の影響範囲を確認
4. **各 repo のドキュメント** - `Reuse-Shop-DataBase` と `diglog-review-site` のドキュメントを確認

---

**Last Updated**: 2026-06-20
