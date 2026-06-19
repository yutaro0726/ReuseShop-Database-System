# revi.mypressonline.com legacy import

**Status**: `legacy / reference / REVIEW_REQUIRED`
**Last Updated**: 2026-06-20

このディレクトリは、旧 `revi.mypressonline.com` 由来のDIG LOG旧設計・旧実装資料を整理するarchive先です。

## 扱い

- 現行DIG LOG正本ではない。
- 現行repoは `diglog-review-site`。
- 管理画面、レビュー投稿、DB設計、認証、作業報告などの参考資料として扱う。
- `environment.md` / `server_info.md` / config系などは秘密情報候補として本文転記禁止。

## 現行docsへの接続

| 現行repo | 関連docs |
|---|---|
| `diglog-review-site` | `docs/INDEX.md`, `docs/PLAN.md`, `docs/TASKS.md`, `docs/SYNC_RECEIVE.md`, `docs/WEB.md` |
| `integrated-system-atlas` | `20_Connections/RSFDB--DIG_LOG.md`, `10_Systems/DIG_LOG.md` |

## 代表的な昇格候補

| 旧資料 | 扱い |
|---|---|
| 管理UI/UX設計 | `reference / promote_candidate` |
| レビュー管理設計 | `reference / promote_candidate` |
| DB設計 | 秘密情報候補を除去したうえで `reference` |
| 作業報告 | `legacy` |

## REVIEW_REQUIRED

- 物理ファイルをこのarchive配下へすべて移すか
- 秘密情報候補ファイルを本文保存せず、要約だけに置換するか
- `diglog-review-site` 側へ昇格済みの資料との差分を確認するか
