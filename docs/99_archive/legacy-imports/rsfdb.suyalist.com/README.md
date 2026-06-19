# rsfdb.suyalist.com legacy import

**Status**: `legacy / reference / REVIEW_REQUIRED`
**Last Updated**: 2026-06-20

このディレクトリは、旧 `rsfdb.suyalist.com` / HDF時代のRSFD関連資料を整理するarchive先です。

## 扱い

- 現行RSFDB/RSFD正本ではない。
- 現行repoは `Reuse-Shop-DataBase`、将来rename先は `Reuse-Shop-Field-DataBase`。
- 現行公開サイト正本は `Reuse-Shop-DataBase/public-site/`。
- deployment / environment / config系は秘密情報候補として本文転記禁止。

## 現行docsへの接続

| 現行repo | 関連docs |
|---|---|
| `Reuse-Shop-DataBase` | `docs/INDEX.md`, `docs/WEB.md`, `docs/DATA_ACQUISITION.md`, `docs/DIGLOG_DELIVERY.md` |
| `Reuse-Shop-DataBase/public-site/` | RSFD公開サイト正本 |
| `integrated-system-atlas` | `10_Systems/RSFDB.md`, `10_Systems/RSFD.md`, `20_Connections/RSFDB--RSFD.md` |

## 代表的な昇格候補

| 旧資料 | 扱い |
|---|---|
| requirements | `reference` |
| HTML sample | `reference / REVIEW_REQUIRED` |
| deployment / environment | `do_not_copy_body / REVIEW_REQUIRED` |
| 旧README | `legacy` |

## REVIEW_REQUIRED

- 物理ファイルをこのarchive配下へすべて移すか
- deployment / environment を本文保存せず、要約だけに置換するか
- RSFD公開サイトに再利用できるHTML sampleがあるか
