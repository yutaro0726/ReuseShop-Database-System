# Repository Rename Inventory

**Status**: `REVIEW_REQUIRED`  
**Last Updated**: 2026-06-20

この文書は、RSFDS系repoを将来renameする前の影響範囲棚卸しです。

repo名そのものはまだ変更しません。現時点では、docs上で current / future を分けて管理します。

## Rename targets

| 現行repo | 将来rename先 | 概念 | 状態 |
|---|---|---|---|
| `yutaro0726/ReuseShop-Database-System` | `yutaro0726/Reuse-Shop-Field-Database-System` | RSFDS親repo | `planned` |
| `yutaro0726/Reuse-Shop-DataBase` | `yutaro0726/Reuse-Shop-Field-DataBase` | RSFDB + RSFD | `planned` |
| `yutaro0726/diglog-review-site` | 変更予定なし | DIG LOG | `no-change` |
| `yutaro0726/integrated-system-atlas` | 変更予定なし | 横断SSOT | `no-change` |

## GitHub rename時の前提

GitHub repo rename後も旧URLからのredirectは期待できるが、混乱防止のため各local cloneのremote URLは新URLへ更新する。

GitHub Pages project site、GitHub Actionsでactionとして参照されているrepo、外部ドキュメント、Claude/Codex作業メモはredirectに依存せず更新対象として扱う。

## 影響範囲

| 区分 | 対象 | 対応 |
|---|---|---|
| GitHub repo settings | repo名変更 | GitHub Settingsで手動rename |
| local clone | `origin` URL | `git remote set-url origin <NEW_URL>` |
| docs | README / docs / Atlas | current/future 表記をrename後にcurrentへ更新 |
| GitHub Actions | workflow / badges | repo名参照の有無を確認 |
| GitHub Pages | project site URL | custom domain有無を確認。project site URLは要注意 |
| external tools | Claude Code / Codex / local memory | workspace path・プロンプト内repo名を更新 |
| old repo names | 旧名の再利用 | redirect保護のため旧名repoを再作成しない |
| archived repos | `rsfdb.suyalist.com` | rename対象外。archive維持 |
| deprecated repos | `hdf-admin-system` | rename対象外。legacy参照のみ |

## Repo別チェックリスト

### 1. ReuseShop-Database-System → Reuse-Shop-Field-Database-System

- [ ] GitHub repo名をrenameする
- [ ] local cloneのremote URLを更新する
- [ ] `README.md` の current repo 名を更新する
- [ ] `docs/INDEX.md` の current repo 名を更新する
- [ ] `docs/DECISIONS.md` の mapping を更新する
- [ ] `docs/TASKS.md` のrename関連タスクをdone化する
- [ ] `integrated-system-atlas/70_Context_Packs/rsfds-context.md` を更新する
- [ ] `integrated-system-atlas/10_Systems/rsfds.md` を更新する
- [ ] Claude Code / Codex 用プロンプトのrepo名を更新する

### 2. Reuse-Shop-DataBase → Reuse-Shop-Field-DataBase

- [ ] GitHub repo名をrenameする
- [ ] local cloneのremote URLを更新する
- [ ] `Reuse-Shop-DataBase` を参照するdocsを更新する
- [ ] `Reuse-Shop-DataBase/public-site/` を `Reuse-Shop-Field-DataBase/public-site/` として読み替える
- [ ] `integrated-system-atlas/10_Systems/RSFDB.md` を更新する
- [ ] `integrated-system-atlas/10_Systems/RSFD.md` を更新する
- [ ] `integrated-system-atlas/20_Connections/RSFDB--RSFD.md` を更新する
- [ ] `integrated-system-atlas/20_Connections/RSFDB--DIG_LOG.md` を更新する
- [ ] `diglog-review-site` 内のRSFDB参照を確認する

### 3. diglog-review-site

- [ ] repo名変更なし
- [ ] RSFDB参照が現行repo名に固定されていないか確認する
- [ ] `docs/SYNC_RECEIVE.md` のRSFDB参照をrename後に更新する
- [ ] `docs/DECISIONS.md` のRSFDB参照をrename後に更新する

### 4. integrated-system-atlas

- [ ] Repository Mappingをrename後のcurrentへ更新する
- [ ] future rename target列を削除または「done」に変更する
- [ ] RSFDS / RSFDB / RSFD system noteを更新する
- [ ] 接続ノートのrepo名参照を更新する

## 実施順序案

1. docs上の棚卸し完了を確認する
2. GitHub repo名を変更する
3. local cloneのremote URLを更新する
4. `ReuseShop-Database-System` docsを新repo名へ更新する
5. `Reuse-Shop-DataBase` docsを新repo名へ更新する
6. `integrated-system-atlas` を更新する
7. `diglog-review-site` の参照を確認・更新する
8. GitHub Actions / Pages / badge / external links を確認する
9. 旧repo名を再利用しないことを記録する

## REVIEW_REQUIRED

- GitHub Pages project site URLの有無
- GitHub Actions workflow内のrepo名固定参照
- README badgeの有無
- Xserver / cron / external docs内のrepo名固定参照
- Claude Code / Codexのlocal memory path更新要否
- local cloneの実パス変更要否

## 検証コマンド案

```bash
git grep -n "ReuseShop-Database-System\|Reuse-Shop-DataBase\|Reuse-Shop-Field-Database-System\|Reuse-Shop-Field-DataBase" -- README.md docs .github 2>/dev/null || true
```

```bash
git remote -v
```
