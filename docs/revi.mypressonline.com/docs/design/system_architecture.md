# Revi プロジェクト システム相関図

## システム全体構成図

```mermaid
graph TB
    %% ユーザー層
    User[一般ユーザー]
    Admin[管理者]
    
    %% フロントエンド層
    Web[Webフロントエンド<br/>revi.mypressonline.com]
    AdminPanel[管理画面<br/>admin/]
    
    %% アプリケーション層
    WebApp[Webアプリケーション<br/>PHP]
    API[API層<br/>api/]
    
    %% システム層
    Config[設定ファイル<br/>system/config/]
    Classes[システムクラス<br/>system/classes/]
    Lib[ライブラリ<br/>system/lib/]
    
    %% データベース層
    DB[(データベース<br/>4646140_revi)]
    ExtDB[(外部DB<br/>リサイクルショップ)]
    
    %% 外部システム
    Sync[データ同期処理]
    
    %% ユーザーフロー
    User --> Web
    Admin --> AdminPanel
    
    %% フロントエンド → アプリケーション
    Web --> WebApp
    AdminPanel --> WebApp
    Web --> API
    AdminPanel --> API
    
    %% アプリケーション → システム
    WebApp --> Config
    WebApp --> Classes
    WebApp --> Lib
    API --> Config
    API --> Classes
    API --> Lib
    
    %% データベース接続
    WebApp --> DB
    API --> DB
    Classes --> DB
    
    %% 外部データ同期
    ExtDB --> Sync
    Sync --> DB
    
    %% スタイリング
    classDef userClass fill:#e1f5fe
    classDef frontClass fill:#f3e5f5
    classDef appClass fill:#e8f5e8
    classDef systemClass fill:#fff3e0
    classDef dbClass fill:#ffebee
    classDef externalClass fill:#f1f8e9
    
    class User,Admin userClass
    class Web,AdminPanel frontClass
    class WebApp,API appClass
    class Config,Classes,Lib systemClass
    class DB,ExtDB dbClass
    class Sync externalClass
```

---

## データフロー図

```mermaid
flowchart TD
    %% データソース
    ExtSystem[外部リサイクルショップシステム]
    UserInput[ユーザー入力データ]
    
    %% データ処理
    SyncProcess[データ同期処理]
    Validation[データ検証]
    Processing[データ処理・保存]
    
    %% データベーステーブル
    ShopTable[(店舗テーブル<br/>同期用)]
    ExtTable[(拡張テーブル<br/>当サイト独自)]
    ReviewTable[(レビューテーブル)]
    UserTable[(ユーザーテーブル)]
    LogTable[(アクセスログ)]
    
    %% 出力
    WebOutput[Web表示]
    AdminOutput[管理画面表示]
    APIOutput[API応答]
    
    %% データフロー
    ExtSystem --> SyncProcess
    SyncProcess --> ShopTable
    
    UserInput --> Validation
    Validation --> Processing
    Processing --> ExtTable
    Processing --> ReviewTable
    Processing --> UserTable
    Processing --> LogTable
    
    ShopTable --> WebOutput
    ExtTable --> WebOutput
    ReviewTable --> WebOutput
    
    ShopTable --> AdminOutput
    ExtTable --> AdminOutput
    ReviewTable --> AdminOutput
    UserTable --> AdminOutput
    LogTable --> AdminOutput
    
    ShopTable --> APIOutput
    ExtTable --> APIOutput
    ReviewTable --> APIOutput
    
    %% スタイリング
    classDef sourceClass fill:#e3f2fd
    classDef processClass fill:#f1f8e9
    classDef tableClass fill:#fff3e0
    classDef outputClass fill:#fce4ec
    
    class ExtSystem,UserInput sourceClass
    class SyncProcess,Validation,Processing processClass
    class ShopTable,ExtTable,ReviewTable,UserTable,LogTable tableClass
    class WebOutput,AdminOutput,APIOutput outputClass
```

---

## ディレクトリ構造図

```mermaid
graph LR
    Root[revi.mypressonline.com/]
    
    %% 開発環境専用
    Root --> Docs[docs/<br/>📁 ドキュメント]
    Root --> MySQL[mysql/<br/>📁 データベース]
    
    %% システム（非公開）
    Root --> System[system/<br/>📁 システム設定]
    
    %% 公開ディレクトリ
    Root --> Public[revi.mypressonline.com/<br/>📁 公開ディレクトリ]
    
    %% docs配下
    Docs --> WorkReport[work-report/<br/>📝 作業記録]
    Docs --> References[References/<br/>📚 参考資料]
    Docs --> Sample[sample/<br/>🎨 サンプル]
    Docs --> Design[design/<br/>📐 設計資料]
    
    %% system配下
    System --> Config[config/<br/>⚙️ 設定ファイル]
    System --> Lib[lib/<br/>📦 ライブラリ]
    System --> Classes[classes/<br/>🔧 クラス]
    
    %% 公開ディレクトリ配下
    Public --> Index[index.php<br/>🏠 トップページ]
    Public --> Admin[admin/<br/>👨‍💼 管理画面]
    Public --> RecycleShop[recycle-shop/<br/>♻️ リサイクルショップ]
    Public --> Assets[assets/<br/>🎯 静的ファイル]
    Public --> API[api/<br/>🔌 API]
    
    %% assets配下
    Assets --> CSS[css/<br/>🎨 スタイル]
    Assets --> JS[js/<br/>⚡ JavaScript]
    Assets --> Images[images/<br/>🖼️ 画像]
    
    %% スタイリング
    classDef devClass fill:#e8f5e8
    classDef systemClass fill:#fff3e0
    classDef publicClass fill:#e1f5fe
    classDef fileClass fill:#f3e5f5
    
    class Docs,MySQL,WorkReport,References,Sample,Design devClass
    class System,Config,Lib,Classes systemClass
    class Public,Admin,RecycleShop,Assets,API publicClass
    class Index,CSS,JS,Images fileClass
```

---

## セキュリティ層構成

```mermaid
graph TB
    Internet[インターネット]
    
    %% セキュリティ層
    WAF[Webアプリケーションファイアウォール<br/>（想定）]
    Auth[認証・認可システム]
    InputValidation[入力値検証]
    
    %% アプリケーション層
    PublicArea[公開エリア<br/>revi.mypressonline.com/]
    PrivateArea[非公開エリア<br/>system/]
    
    %% データ保護
    DBAccess[データベースアクセス制御]
    FileAccess[ファイルアクセス制御]
    
    %% ログ・監視
    AccessLog[アクセスログ]
    ErrorLog[エラーログ]
    
    Internet --> WAF
    WAF --> Auth
    Auth --> InputValidation
    
    InputValidation --> PublicArea
    Auth -.-> PrivateArea
    
    PublicArea --> DBAccess
    PrivateArea --> DBAccess
    
    DBAccess --> FileAccess
    
    PublicArea --> AccessLog
    PrivateArea --> AccessLog
    PublicArea --> ErrorLog
    PrivateArea --> ErrorLog
    
    %% スタイリング
    classDef securityClass fill:#ffebee
    classDef appClass fill:#e8f5e8
    classDef protectionClass fill:#fff3e0
    classDef logClass fill:#f3e5f5
    
    class WAF,Auth,InputValidation securityClass
    class PublicArea,PrivateArea appClass
    class DBAccess,FileAccess protectionClass
    class AccessLog,ErrorLog logClass
```

---

## 更新履歴
- 2025/6/14: 初版作成
- システム全体構成図、データフロー図、ディレクトリ構造図、セキュリティ層構成を作成

---

## 注意事項
- この設計図は実装の指針として使用すること
- 設計変更時は必ずこのファイルも更新すること
- Mermaid記法により、GitHub等での表示が可能