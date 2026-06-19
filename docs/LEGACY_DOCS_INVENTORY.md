# Legacy Docs Inventory

**Status**: `REVIEW_REQUIRED`
**Last Updated**: 2026-06-20

この文書は、`ReuseShop-Database-System/docs/` 直下に残る旧プロジェクト由来ドキュメントの棚卸しである。

現時点では、旧資料を現行正本として扱わない。削除や大量移動は行わず、まず由来・状態・移管候補を索引化する。

## 対象

| パス | 推定由来 | 現行での扱い |
|---|---|---|
| `docs/revi.mypressonline.com/` | DIG LOG旧設計・旧実装資料 | `legacy / reference / REVIEW_REQUIRED` |
| `docs/rsfdb.suyalist.com/` | 旧RSFD / HDF時代の資料 | `legacy / reference / REVIEW_REQUIRED` |

## 基本判断

| 判断 | 意味 |
|---|---|
| `current` | 現行docsとして維持 |
| `legacy` | 旧資料として保持 |
| `reference` | 背景資料として参照のみ |
| `promote_candidate` | 現行repoへ昇格候補 |
| `REVIEW_REQUIRED` | 内容確認・秘密情報確認・移管先判断が必要 |
| `do_not_copy_body` | 秘密情報候補があるため本文転記禁止 |

## `revi.mypressonline.com/`

### 推定内容

DIG LOG旧設計・旧実装資料。管理画面、DB設計、認証、レビュー投稿、作業報告、サーバー情報などを含む可能性がある。

### 現行との関係

| 現行repo | 関係 |
|---|---|
| `diglog-review-site` | DIG LOG現行repo。旧設計の昇格候補があればこちらへ移管 |
| `integrated-system-atlas` | DIG LOG境界・接続方針の横断SSOT |

### 注意

`server_info.md` や `environment.md` など、秘密情報候補を含む可能性があるファイル名が存在する。本文転記は禁止し、内容確認時も実値をdocsへ移さない。

### 代表パス

| パス | 推定内容 | 判定 |
|---|---|---|
| `docs/revi.mypressonline.com/docs/environment.md` | 環境情報 | `do_not_copy_body / REVIEW_REQUIRED` |
| `docs/revi.mypressonline.com/docs/server_info.md` | サーバー情報 | `do_not_copy_body / REVIEW_REQUIRED` |
| `docs/revi.mypressonline.com/docs/project_plan.md` | 旧計画 | `reference` |
| `docs/revi.mypressonline.com/docs/project_directory_structure.md` | 旧構成 | `reference` |
| `docs/revi.mypressonline.com/docs/admin_ui_ux_design_unified.md` | 管理UI/UX旧設計 | `promote_candidate / REVIEW_REQUIRED` |
| `docs/revi.mypressonline.com/docs/work-report/` | 作業報告 | `legacy` |

## `rsfdb.suyalist.com/`

### 推定内容

旧RSFD / HDF時代の資料。deployment、environment、requirements、HTML sampleなどを含む。

### 現行との関係

| 現行repo | 関係 |
|---|---|
| `Reuse-Shop-DataBase` | RSFDB + RSFD現行repo。再利用可能な設計があればこちらへ昇格 |
| `Reuse-Shop-DataBase/public-site/` | RSFD公開サイトの現行正本 |
| `integrated-system-atlas` | RSFD/RSFDB境界・接続方針の横断SSOT |

### 注意

`deployment.md` や `environment.md` など、運用情報・秘密情報候補を含む可能性があるファイル名が存在する。本文転記は禁止する。

### 代表パス

| パス | 推定内容 | 判定 |
|---|---|---|
| `docs/rsfdb.suyalist.com/0_pj-docs/docs/README.md` | 旧docs入口 | `legacy` |
| `docs/rsfdb.suyalist.com/0_pj-docs/docs/deployment.md` | 旧deploy資料 | `do_not_copy_body / REVIEW_REQUIRED` |
| `docs/rsfdb.suyalist.com/0_pj-docs/docs/environment.md` | 旧環境資料 | `do_not_copy_body / REVIEW_REQUIRED` |
| `docs/rsfdb.suyalist.com/0_pj-docs/requirements/requirements.md` | 旧要件 | `reference / REVIEW_REQUIRED` |
| `docs/rsfdb.suyalist.com/0_pj-docs/html-sample/` | 旧HTML sample | `reference` |

## 推奨整理順序

1. 現行docs入口を `INDEX.md` / `DOCS_STRUCTURE.md` に固定する。
2. legacy docsは `LEGACY_DOCS_INVENTORY.md` から辿る。
3. 秘密情報候補を含む可能性があるファイルは本文転記しない。
4. 昇格候補だけを現行repo側docsへ要約移管する。
5. 実移動する場合は `docs/99_archive/legacy-imports/` へ移す。
6. 移動後に旧パスへstub READMEを置くか、INDEXから新パスへ誘導する。

## 秘密情報ガイドライン

以下は本文に転記しない。

- host / IP / production URL
- DB接続情報
- username / password
- API key / token / webhook URL
- SSH / FTP情報
- `.env` の値
- 本番パス

抽象参照は可。

```text
$SECRET_[NAME]
```

## REVIEW_REQUIRED

- `revi.mypressonline.com/` を `diglog-review-site` archiveへ移管するか
- `rsfdb.suyalist.com/` を `Reuse-Shop-DataBase` archiveへ移管するか
- `environment.md` / `server_info.md` / `deployment.md` の扱い
- HTML sampleを残すか、スクリーンショット/仕様要約へ置換するか
- 現行docsへ昇格する旧設計の選定
