- [ホーム](https://developers.google.com/?hl=ja)
- [検索セントラル](https://developers.google.com/search?hl=ja)
- [Documentation](https://developers.google.com/search/docs?hl=ja)

この情報は役に立ちましたか？

フィードバックを送信

- このページの内容
- [構造化データを追加する方法](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#add-structured-data)
- [例](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#examples)
    - [シンプルなレビュー](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#simple-review-example)
    - [ネストされたレビュー](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#embedded-review-example)
    - [総合評価](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#aggregate-rating)
    - [ネストされた総合評価](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#embedded-aggregate-rating)
- [ガイドライン](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#guidelines)
    - [技術に関するガイドライン](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#technical-guidelines)
- [構造化データタイプの定義](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#structured-data-type-definitions)
    - [Review](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#review-properties)
    - [AggregateRating](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#aggregated-rating-type-definition)
- [Search Console でリッチリザルトを監視する](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#monitor)
    - [構造化データを初めてデプロイした後](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#after-deploying)
    - [新しいテンプレートをリリースした後やコードを更新した後](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#after-releasing)
    - [トラフィックを定期的に分析する場合](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#analyzing-periodically)
- [トラブルシューティング](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#troubleshooting)

# クチコミ抜粋（`Review`、`AggregateRating`）の構造化データ

bookmark\_borderbookmark コレクションでコンテンツを整理 必要に応じて、コンテンツの保存と分類を行います。

クチコミ抜粋は、レビューサイトからのレビューや評価を短く抜粋したものです。通常は、数多くのレビュー投稿者の評価スコアを集計し、その平均値を表示します。Google によるクロールでレビューや評価の有効なマークアップが見つかった場合は、星やその他の要約情報を含むリッチ スニペットが表示されることもあります。レビューの文章に加え、評価が数値（たとえば 1～5）で示されます。クチコミ抜粋は、リッチリザルトや Google ナレッジパネルに表示される場合もあります。次の機能の評価を掲載できます。

![Google 検索におけるクチコミ抜粋](https://developers.google.com/static/search/docs/images/reviews04.png?hl=ja)

**注**: Google 検索の検索結果に表示される実際のコンテンツとは異なる場合があります。ほとんどの機能は[リッチリザルト テスト](https://support.google.com/webmasters/answer/7445569?hl=ja)でプレビューできます。

- [書籍](https://developers.google.com/search/docs/appearance/structured-data/book?hl=ja)
- [コースリスト](https://developers.google.com/search/docs/appearance/structured-data/course?hl=ja)
- [イベント](https://developers.google.com/search/docs/appearance/structured-data/event?hl=ja)
- [ローカル ビジネス](https://developers.google.com/search/docs/appearance/structured-data/local-business?hl=ja)（他のローカル ビジネスに関するレビューを収集するサイトのみ。[セルフ サービングのレビューに関するガイドライン](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#self-serving)を参照）
- [映画](https://developers.google.com/search/docs/appearance/structured-data/movie?hl=ja)
- [商品](https://developers.google.com/search/docs/appearance/structured-data/product?hl=ja)
- [レシピ](https://developers.google.com/search/docs/appearance/structured-data/recipe?hl=ja)
- [ソフトウェア アプリ](https://developers.google.com/search/docs/appearance/structured-data/software-app?hl=ja)

次の schema.org タイプ（およびそのサブタイプ）のレビューもサポートされています。

- `[CreativeWorkSeason](https://schema.org/CreativeWorkSeason)`
- `[CreativeWorkSeries](https://schema.org/CreativeWorkSeries)`
- `[Episode](https://schema.org/Episode)`
- `[Game](https://schema.org/Game)`
- `[MediaObject](https://schema.org/MediaObject)`
- `[MusicPlaylist](https://schema.org/MusicPlaylist)`
- `[MusicRecording](https://schema.org/MusicRecording)`
- `[Organization](https://schema.org/Organization)`（他の組織に関するレビューを収集するサイトのみ。[セルフサービングのレビューに関するガイドライン](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#self-serving)を参照）

**サイトで他の雇用主に関するレビューを提供している場合は、**[`EmployerAggregateRating` 構造化データ](https://developers.google.com/search/docs/appearance/structured-data/employer-rating?hl=ja)を使用できます。  
**他者の主張に対するレビューをサイトに掲載している場合は、**[ファクト チェックの構造化データ](https://developers.google.com/search/docs/appearance/structured-data/factcheck?hl=ja)を使用できます。

## 構造化データを追加する方法

構造化データは、ページに関する情報を提供し、ページ コンテンツを分類するための標準化されたデータ形式です。構造化データを初めて使用する場合は、[構造化データの仕組みについて](https://developers.google.com/search/docs/appearance/structured-data/intro-structured-data?hl=ja)をご覧ください。

構造化データの作成、テスト、リリースの概要は次のとおりです。

1. [必須プロパティ](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#structured-data-type-definitions)を追加します。使用している形式に基づいて、[ページ上の構造化データを挿入する](https://developers.google.com/search/docs/appearance/structured-data/intro-structured-data?hl=ja#format-placement)場所をご確認ください。
    
    **CMS をお使いの場合は、**CMS に統合されているプラグインを使用する方が簡単な場合もあります。  
    **JavaScript をお使いの場合は、**[JavaScript で構造化データを生成する](https://developers.google.com/search/docs/appearance/structured-data/generate-structured-data-with-javascript?hl=ja)方法をご確認ください。
    
2. [ガイドライン](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#guidelines)に従います。
3. [リッチリザルト テスト](https://search.google.com/test/rich-results?hl=ja)でコードを検証し、重大なエラーを修正します。ツールで報告される重大ではない問題の修正も検討してください。構造化データの品質向上に役立ちます（ただし、リッチリザルトの対象となるために必ずしも必要というわけではありません）。
4. 構造化データが含まれているページを数ページ導入し、[URL 検査ツール](https://support.google.com/webmasters/answer/9012289?hl=ja)を使用して、Google でページがどのように表示されるかをテストします。Google がページにアクセスでき、robots.txt ファイル、`noindex` タグ、ログイン要件によってページがブロックされていないことを確認します。ページが正常に表示されたら、[Google に URL の再クロールを依頼](https://developers.google.com/search/docs/crawling-indexing/ask-google-to-recrawl?hl=ja)できます。
    
    **注**: 再クロールとインデックスの再登録にかかる時間を考慮してください。ページを公開した後、Google がそのページを検出してクロールするまで数日かかる場合があることにご注意ください。
    
5. 今後の変更について Google に継続して情報を提供するために、[サイトマップを送信する](https://developers.google.com/search/docs/crawling-indexing/sitemaps/build-sitemap?hl=ja)ことをおすすめします。これは、[Search Console Sitemap API](https://developers.google.com/webmaster-tools/v1/sitemaps?hl=ja) で自動化できます。

## 例

`Review` 構造化データをページに追加する方法はいくつかあります。

- シンプルなレビューを追加する。
- [`review`](https://schema.org/review) プロパティを使用して、レビューを別の schema.org タイプにネストする。
- 総合評価を追加する。マークアップされたコンテンツにレビューの投稿者と日付の両方が含まれている場合は、個別のレビューの評価を省略できます。集計レビューの場合は、リッチ スニペット表示用の平均評価を提供する必要があります。
- [`aggregateRating`](https://schema.org/aggregateRating) プロパティを使用して、総合評価を別の schema.org タイプにネストする。

### シンプルなレビュー

シンプルなレビューの例を以下に示します。

[JSON-LD](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#json-ld)[RDFa](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#rdfa)[microdata](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#microdata) もっと見る

<html> <head> <title>Legal Seafood</title> <script type="application/ld+json"> { "@context": "https://schema.org/", "@type": "Review", "itemReviewed": { "@type": "Restaurant", "image": "https://www.example.com/seafood-restaurant.jpg", "name": "Legal Seafood", "servesCuisine": "Seafood", "priceRange": "$$$", "telephone": "1234567", "address" :{ "@type": "PostalAddress", "streetAddress": "123 William St", "addressLocality": "New York", "addressRegion": "NY", "postalCode": "10038", "addressCountry": "US" } }, "reviewRating": { "@type": "Rating", "ratingValue": 4 }, "author": { "@type": "Person", "name": "Bob Smith" }, "publisher": { "@type": "Organization", "name": "Washington Times" } } </script> </head> <body> </body> </html>

  

<html>
  <head>
  <title>Legal Seafood</title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Review",
      "itemReviewed": {
        "@type": "Restaurant",
        "image": "https://www.example.com/seafood-restaurant.jpg",
        "name": "Legal Seafood",
        "servesCuisine": "Seafood",
        "priceRange": "$$$",
        "telephone": "1234567",
        "address" :{
          "@type": "PostalAddress",
          "streetAddress": "123 William St",
          "addressLocality": "New York",
          "addressRegion": "NY",
          "postalCode": "10038",
          "addressCountry": "US"
        }
      },
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": 4
      },
      "author": {
        "@type": "Person",
        "name": "Bob Smith"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Washington Times"
      }
    }
    </script>
  </head>
  <body>
  </body>
</html>

 <html> <head> <title>Legal Seafood</title> </head> <body> <div vocab="https://schema.org/" typeof="Review"> <div property="itemReviewed" typeof="Restaurant"> <img property="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/> <span property="name">Legal Seafood</span> <span property="servesCuisine">Seafood</span> <span property="priceRange">$$$</span> <span property="telephone">1234567</span> <span property="address">123 William St, New York</span> </div> <span property="reviewRating" typeof="Rating"> <span property="ratingValue">4</span> </span> stars - <b>"A good seafood place." </b> <span property="author" typeof="Person"> <span property="name">Bob Smith</span> </span> <div property="publisher" typeof="Organization"> <meta property="name" content="Washington Times"> </div> </div> </body> </html>

  

 <html>
  <head>
    <title>Legal Seafood</title>
  </head>
  <body>
    <div vocab="https://schema.org/" typeof="Review">
      <div property="itemReviewed" typeof="Restaurant">
        <img property="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/>
        <span property="name">Legal Seafood</span>
        <span property="servesCuisine">Seafood</span>
        <span property="priceRange">$$$</span>
        <span property="telephone">1234567</span>
        <span property="address">123 William St, New York</span>
      </div>
      <span property="reviewRating" typeof="Rating">
        <span property="ratingValue">4</span>
      </span> stars -
      <b>"A good seafood place." </b>
      <span property="author" typeof="Person">
        <span property="name">Bob Smith</span>
      </span>
      <div property="publisher" typeof="Organization">
        <meta property="name" content="Washington Times">
      </div>
    </div>
  </body>
</html>

 <html> <head> <title>Legal Seafood</title> </head> <body> <div itemscope itemtype="https://schema.org/Review"> <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/Restaurant"> <img itemprop="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/> <span itemprop="name">Legal Seafood</span> <span itemprop="servesCuisine">Seafood</span> <span itemprop="priceRange">$$$</span> <span itemprop="telephone">1234567</span> <span itemprop="address">123 William St, New York</span> </div> <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating"> <span itemprop="ratingValue">4</span> </span> stars - <b>"A good seafood place." </b> <span itemprop="author" itemscope itemtype="https://schema.org/Person"> <span itemprop="name">Bob Smith</span> </span> <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization"> <meta itemprop="name" content="Washington Times"> </div> </div> </body> </html>

  

 <html>
  <head>
  <title>Legal Seafood</title>
  </head>
  <body>
    <div itemscope itemtype="https://schema.org/Review">
      <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/Restaurant">
        <img itemprop="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/>
        <span itemprop="name">Legal Seafood</span>
        <span itemprop="servesCuisine">Seafood</span>
        <span itemprop="priceRange">$$$</span>
        <span itemprop="telephone">1234567</span>
        <span itemprop="address">123 William St, New York</span>
      </div>
      <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
        <span itemprop="ratingValue">4</span>
      </span> stars -
      <b>"A good seafood place." </b>
      <span itemprop="author" itemscope itemtype="https://schema.org/Person">
        <span itemprop="name">Bob Smith</span>
      </span>
      <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <meta itemprop="name" content="Washington Times">
      </div>
    </div>
  </body>
</html>

### ネストされたレビュー

`Product` にネストされたレビューの例を以下に示します。サンプルをコピーしてご自身の HTML ページに貼り付けることができます。

[JSON-LD](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#json-ld)[RDFa](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#rdfa)[microdata](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#microdata) もっと見る

<html> <head> <title>The Catcher in the Rye</title> <script type="application/ld+json"> { "@context": "https://schema.org/", "@type": "Product", "brand": { "@type": "Brand", "name": "Penguin Books" }, "description": "The Catcher in the Rye is a classic coming-of-age story: an story of teenage alienation, capturing the human need for connection and the bewildering sense of loss as we leave childhood behind.", "sku": "9780241984758", "mpn": "925872", "image": "https://www.example.com/catcher-in-the-rye-book-cover.jpg", "name": "The Catcher in the Rye", "review": \[{ "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": 5 }, "author": { "@type": "Person", "name": "John Doe" } }, { "@type": "Review", "reviewRating": { "@type": "Rating", "ratingValue": 1 }, "author": { "@type": "Person", "name": "Jane Doe" } }\], "aggregateRating": { "@type": "AggregateRating", "ratingValue": 88, "bestRating": 100, "ratingCount": 20 }, "offers": { "@type": "Offer", "url": "https://example.com/offers/catcher-in-the-rye", "priceCurrency": "USD", "price": 5.99, "priceValidUntil": "2024-11-05", "itemCondition": "https://schema.org/UsedCondition", "availability": "https://schema.org/InStock", "seller": { "@type": "Organization", "name": "eBay" } } } </script> </head> <body> </body> </html>

  

<html>
  <head>
    <title>The Catcher in the Rye</title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "brand": {
        "@type": "Brand",
        "name": "Penguin Books"
      },
      "description": "The Catcher in the Rye is a classic coming-of-age story: an story of teenage alienation, capturing the human need for connection and the bewildering sense of loss as we leave childhood behind.",
      "sku": "9780241984758",
      "mpn": "925872",
      "image": "https://www.example.com/catcher-in-the-rye-book-cover.jpg",
      "name": "The Catcher in the Rye",
      "review": \[{
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": 5
        },
        "author": {
          "@type": "Person",
          "name": "John Doe"
        }
       },
      {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": 1
        },
        "author": {
          "@type": "Person",
          "name": "Jane Doe"
        }
      }\],
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": 88,
        "bestRating": 100,
        "ratingCount": 20
      },
      "offers": {
        "@type": "Offer",
        "url": "https://example.com/offers/catcher-in-the-rye",
        "priceCurrency": "USD",
        "price": 5.99,
        "priceValidUntil": "2024-11-05",
        "itemCondition": "https://schema.org/UsedCondition",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@type": "Organization",
          "name": "eBay"
        }
      }
    }
    </script>
  </head>
  <body>
  </body>
</html>

 <html> <head> <title>The Catcher in the Rye</title> </head> <body> <div vocab="https://schema.org/" typeof="Product"> <div rel="schema:brand"> <div typeof="schema:Brand"> <div property="schema:name" content="Penguin"></div> </div> </div> <div property="schema:description" content="The Catcher in the Rye is a classic coming-of-age story: an story of teenage alienation, capturing the human need for connection and the bewildering sense of loss as we leave childhood behind."></div> <div property="schema:sku" content="9780241984758"></div> <div property="schema:mpn" content="925872"></div> <img property="image" src="https://example.com/photos/1x1/catcher-in-the-rye-book-cover.jpg" alt="Catcher in the Rye"/> <span property="name">The Catcher in the Rye</span> <div property="review" typeof="Review"> Reviews: <span property="reviewRating" typeof="Rating"> <span property="ratingValue">5</span> - </span> <b>"A masterpiece of literature" </b> by <span property="author" typeof="Person"> <span property="name">John Doe</span></span>, written on <meta property="datePublished" content="2006-05-04">4 May 2006 <div>I really enjoyed this book. It captures the essential challenge people face as they try make sense of their lives and grow to adulthood.</div> <span property="publisher" typeof="Organization"> <meta property="name" content="Washington Times"> </span> </div><div property="review" typeof="Review"> <span property="reviewRating" typeof="Rating"> <span property="ratingValue">1</span> - </span> <b>"The worst thing I've ever read" </b> by <span property="author" typeof="Person"> <span property="name">Jane Doe</span></span>, written on <meta property="datePublished" content="2006-05-10">10 May 2006 <span property="publisher" typeof="Organization"> <meta property="name" content="Washington Times"> </span> </div> <div rel="schema:aggregateRating"> <div typeof="schema:AggregateRating"> <div property="schema:reviewCount" content="89"></div> <div property="schema:ratingValue" content="4.4">4,4</div> stars </div> </div> <div rel="schema:offers"> <div typeof="schema:Offer"> <div property="schema:price" content="4.99"></div> <div property="schema:availability" content="https://schema.org/InStock"></div> <div property="schema:priceCurrency" content="GBP"></div> <div property="schema:priceValidUntil" datatype="xsd:date" content="2024-11-21"></div> <div rel="schema:url" resource="https://example.com/catcher"></div> <div property="schema:itemCondition" content="https://schema.org/UsedCondition"></div> </div> </div> </div> </body> </html>

  

 <html>
  <head>
    <title>The Catcher in the Rye</title>
  </head>
    <body>
      <div vocab="https://schema.org/" typeof="Product">
        <div rel="schema:brand">
          <div typeof="schema:Brand">
            <div property="schema:name" content="Penguin"></div>
          </div>
        </div>
        <div property="schema:description" content="The Catcher in the Rye is a classic coming-of-age story: an story of teenage alienation, capturing the human need for connection and the bewildering sense of loss as we leave childhood behind."></div>
        <div property="schema:sku" content="9780241984758"></div>
        <div property="schema:mpn" content="925872"></div>
        <img property="image" src="https://example.com/photos/1x1/catcher-in-the-rye-book-cover.jpg" alt="Catcher in the Rye"/>
        <span property="name">The Catcher in the Rye</span>
        <div property="review" typeof="Review"> Reviews:
          <span property="reviewRating" typeof="Rating">
            <span property="ratingValue">5</span> -
          </span>
          <b>"A masterpiece of literature" </b> by
          <span property="author" typeof="Person">
            <span property="name">John Doe</span></span>, written on
          <meta property="datePublished" content="2006-05-04">4 May 2006
          <div>I really enjoyed this book. It captures the essential challenge people face as they try make sense of their lives and grow to adulthood.</div>
          <span property="publisher" typeof="Organization">
            <meta property="name" content="Washington Times">
          </span>
        </div><div property="review" typeof="Review">
          <span property="reviewRating" typeof="Rating">
            <span property="ratingValue">1</span> -
          </span>
          <b>"The worst thing I've ever read" </b> by
          <span property="author" typeof="Person">
            <span property="name">Jane Doe</span></span>, written on
          <meta property="datePublished" content="2006-05-10">10 May 2006
          <span property="publisher" typeof="Organization">
            <meta property="name" content="Washington Times">
          </span>
        </div>
        <div rel="schema:aggregateRating">
          <div typeof="schema:AggregateRating">
            <div property="schema:reviewCount" content="89"></div>
            <div property="schema:ratingValue" content="4.4">4,4</div> stars
          </div>
        </div>
        <div rel="schema:offers">
          <div typeof="schema:Offer">
            <div property="schema:price" content="4.99"></div>
            <div property="schema:availability" content="https://schema.org/InStock"></div>
            <div property="schema:priceCurrency" content="GBP"></div>
            <div property="schema:priceValidUntil" datatype="xsd:date" content="2024-11-21"></div>
            <div rel="schema:url" resource="https://example.com/catcher"></div>
            <div property="schema:itemCondition" content="https://schema.org/UsedCondition"></div>
          </div>
        </div>
    </div>
  </body>
</html>

 <html> <head> <title>The Catcher in the Rye</title> </head> <body> <div itemscope itemtype="https://schema.org/Product"> <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope> <meta itemprop="name" content="Penguin" /> </div> <meta itemprop="description" content="The Catcher in the Rye is a classic coming-of-age story: an story of teenage alienation, capturing the human need for connection and the bewildering sense of loss as we leave childhood behind." /> <meta itemprop="sku" content="0446310786" /> <meta itemprop="mpn" content="925872" /> <img itemprop="image" src="https://example.com/photos/1x1/catcher-in-the-rye-book-cover.jpg" alt="Catcher in the Rye"/> <span itemprop="name">The Catcher in the Rye</span> <div itemprop="review" itemscope itemtype="https://schema.org/Review"> Reviews: <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating"> <span itemprop="ratingValue">5</span> - </span> <b>"A masterpiece of literature" </b> by <span itemprop="author" itemscope itemtype="https://schema.org/Person"> <span itemprop="name">John Doe</span></span>, written on <meta itemprop="datePublished" content="2006-05-04">4 May 2006 <div>I really enjoyed this book. It captures the essential challenge people face as they try make sense of their lives and grow to adulthood.</div> <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization"> <meta itemprop="name" content="Washington Times"> </span> </div><div itemprop="review" itemscope itemtype="https://schema.org/Review"> <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating"> <span itemprop="ratingValue">1</span> - </span> <b>"The worst thing I've ever read" </b> by <span itemprop="author" itemscope itemtype="https://schema.org/Person"> <span itemprop="name">Jane Doe</span></span>, written on <meta itemprop="datePublished" content="2006-05-10">10 May 2006 <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization"> <meta itemprop="name" content="Washington Times"> </span> </div> <div itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope> <meta itemprop="reviewCount" content="89" /> <span itemprop="ratingValue" content="4.4">4,4</span> stars </div> <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope> <link itemprop="url" href="https://example.com/catcher" /> <meta itemprop="availability" content="https://schema.org/InStock" /> <meta itemprop="priceCurrency" content="GBP" /> <meta itemprop="itemCondition" content="https://schema.org/UsedCondition" /> <meta itemprop="price" content="4.99" /> <meta itemprop="priceValidUntil" content="2024-11-21" /> </div> </div> </body> </html>

  

 <html>
  <head>
    <title>The Catcher in the Rye</title>
  </head>
  <body>
    <div itemscope itemtype="https://schema.org/Product">
      <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
        <meta itemprop="name" content="Penguin" />
      </div>
      <meta itemprop="description" content="The Catcher in the Rye is a classic coming-of-age story: an story of teenage alienation, capturing the human need for connection and the bewildering sense of loss as we leave childhood behind." />
      <meta itemprop="sku" content="0446310786" />
      <meta itemprop="mpn" content="925872" />
      <img itemprop="image" src="https://example.com/photos/1x1/catcher-in-the-rye-book-cover.jpg" alt="Catcher in the Rye"/>
      <span itemprop="name">The Catcher in the Rye</span>
      <div itemprop="review" itemscope itemtype="https://schema.org/Review"> Reviews:
        <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
          <span itemprop="ratingValue">5</span> -
        </span>
        <b>"A masterpiece of literature" </b> by
        <span itemprop="author" itemscope itemtype="https://schema.org/Person">
          <span itemprop="name">John Doe</span></span>, written on
        <meta itemprop="datePublished" content="2006-05-04">4 May 2006
        <div>I really enjoyed this book. It captures the essential challenge people face as they try make sense of their lives and grow to adulthood.</div>
        <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <meta itemprop="name" content="Washington Times">
        </span>
      </div><div itemprop="review" itemscope itemtype="https://schema.org/Review">
        <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
            <span itemprop="ratingValue">1</span> -
        </span>
        <b>"The worst thing I've ever read" </b> by
        <span itemprop="author" itemscope itemtype="https://schema.org/Person">
          <span itemprop="name">Jane Doe</span></span>, written on
        <meta itemprop="datePublished" content="2006-05-10">10 May 2006
        <span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
          <meta itemprop="name" content="Washington Times">
        </span>
      </div>
      <div itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
        <meta itemprop="reviewCount" content="89" />
        <span itemprop="ratingValue" content="4.4">4,4</span> stars
      </div>
      <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope>
        <link itemprop="url" href="https://example.com/catcher" />
        <meta itemprop="availability" content="https://schema.org/InStock" />
        <meta itemprop="priceCurrency" content="GBP" />
        <meta itemprop="itemCondition" content="https://schema.org/UsedCondition" />
        <meta itemprop="price" content="4.99" />
        <meta itemprop="priceValidUntil" content="2024-11-21" />
      </div>
    </div>
  </body>
</html>

### 総合評価

総合評価の例を以下に示します。

[JSON-LD](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#json-ld)[RDFa](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#rdfa)[microdata](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#microdata) もっと見る

<html> <head> <title>Legal Seafood</title> <script type="application/ld+json"> { "@context": "https://schema.org/", "@type": "AggregateRating", "itemReviewed": { "@type": "Restaurant", "image": "https://www.example.com/seafood-restaurant.jpg", "name": "Legal Seafood", "servesCuisine": "Seafood", "telephone": "1234567", "address" : { "@type": "PostalAddress", "streetAddress": "123 William St", "addressLocality": "New York", "addressRegion": "NY", "postalCode": "10038", "addressCountry": "US" } }, "ratingValue": 88, "bestRating": 100, "ratingCount": 20 } </script> </head> <body> </body> </html>

  

<html>
  <head>
    <title>Legal Seafood</title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "AggregateRating",
      "itemReviewed": {
        "@type": "Restaurant",
        "image": "https://www.example.com/seafood-restaurant.jpg",
        "name": "Legal Seafood",
        "servesCuisine": "Seafood",
        "telephone": "1234567",
        "address" : {
          "@type": "PostalAddress",
          "streetAddress": "123 William St",
          "addressLocality": "New York",
          "addressRegion": "NY",
          "postalCode": "10038",
          "addressCountry": "US"
        }
      },
      "ratingValue": 88,
      "bestRating": 100,
      "ratingCount": 20
    }
    </script>
  </head>
  <body>
  </body>
</html>

 <html> <head> <title>Legal Seafood</title> </head> <body> <div vocab="https://schema.org/" typeof="AggregateRating"> <div property="itemReviewed" typeof="Restaurant"> <img property="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/> <span property="name">Legal Seafood</span> <span property="servesCuisine">Seafood</span> <span property="telephone">1234567</span> <span property="address">123 William St, New York</span> </div> <span property="ratingValue">4.2</span> out of <span property="bestRating">5</span> stars - <span property="ratingCount">123</span> votes </div> </body> </html>

  

 <html>
  <head>
    <title>Legal Seafood</title>
  </head>
  <body>
    <div vocab="https://schema.org/" typeof="AggregateRating">
      <div property="itemReviewed" typeof="Restaurant">
        <img property="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/>
        <span property="name">Legal Seafood</span>
        <span property="servesCuisine">Seafood</span>
        <span property="telephone">1234567</span>
        <span property="address">123 William St, New York</span>
      </div>
      <span property="ratingValue">4.2</span> out of <span property="bestRating">5</span> stars -
      <span property="ratingCount">123</span> votes
    </div>
  </body>
</html>

 <html> <head> <title>Legal Seafood</title> </head> <body> <div itemscope itemtype="https://schema.org/AggregateRating"> <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/Restaurant"> <img itemprop="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/> <span itemprop="name">Legal Seafood</span> <span itemprop="servesCuisine">Seafood</span> <span itemprop="telephone">1234567</span> <span itemprop="address">123 William St, New York</span> </div> <span itemprop="ratingValue">4.2</span> out of <span itemprop="bestRating">5</span> stars - <span itemprop="ratingCount">123</span> votes </div> </body> </html>

  

 <html>
  <head>
    <title>Legal Seafood</title>
  </head>
  <body>
    <div itemscope itemtype="https://schema.org/AggregateRating">
      <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/Restaurant">
        <img itemprop="image" src="https://example.com/photos/1x1/seafood-restaurant.jpg" alt="Legal Seafood"/>
        <span itemprop="name">Legal Seafood</span>
        <span itemprop="servesCuisine">Seafood</span>
        <span itemprop="telephone">1234567</span>
        <span itemprop="address">123 William St, New York</span>
      </div>
      <span itemprop="ratingValue">4.2</span> out of <span itemprop="bestRating">5</span> stars -
      <span itemprop="ratingCount">123</span> votes
    </div>
  </body>
</html>

### ネストされた総合評価

`Product` にネストされた総合評価の例を以下に示します。サンプルをコピーしてご自身の HTML ページに貼り付けることができます。

[JSON-LD](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#json-ld)[RDFa](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#rdfa)[microdata](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#microdata) もっと見る

<html> <head> <title>Executive Anvil</title> <script type="application/ld+json"> { "@context": "https://schema.org/", "@type": "Product", "name": "Executive Anvil", "image": \[ "https://example.com/photos/1x1/photo.jpg", "https://example.com/photos/4x3/photo.jpg", "https://example.com/photos/16x9/photo.jpg" \], "brand": { "@type": "Brand", "name": "ACME" }, "aggregateRating": { "@type": "AggregateRating", "ratingValue": 4.4, "ratingCount": 89 }, "offers": { "@type": "AggregateOffer", "lowPrice": 119.99, "highPrice": 199.99, "priceCurrency": "USD" } } </script> </head> <body> </body> </html>

  

<html>
  <head>
  <title>Executive Anvil</title>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "Product",
    "name": "Executive Anvil",
    "image": \[
      "https://example.com/photos/1x1/photo.jpg",
      "https://example.com/photos/4x3/photo.jpg",
      "https://example.com/photos/16x9/photo.jpg"
     \],
    "brand": {
      "@type": "Brand",
      "name": "ACME"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": 4.4,
      "ratingCount": 89
    },
    "offers": {
      "@type": "AggregateOffer",
      "lowPrice": 119.99,
      "highPrice": 199.99,
      "priceCurrency": "USD"
    }
  }
  </script>
  </head>
  <body>
  </body>
</html>

 <html> <head> <title>Executive Anvil</title> </head> <body> <div vocab="https://schema.org/" typeof="Product"> <span property="brand" typeof="Brand">ACME</span> <span property="name">Executive Anvil</span> <img property="image" src="https://example.com/photos/1x1/anvil\_executive.jpg" alt="Executive Anvil logo" /> <span property="aggregateRating" typeof="AggregateRating"> Average rating: <span property="ratingValue">4.4</span>, based on <span property="ratingCount">89</span> reviews </span> <span property="offers" typeof="AggregateOffer"> from $<span property="lowPrice">119.99</span> to $<span property="highPrice">199.99</span> <meta property="priceCurrency" content="USD" /> </span> </div> </body> </html>

  

 <html>
  <head>
    <title>Executive Anvil</title>
  </head>
  <body>
    <div vocab="https://schema.org/" typeof="Product">
     <span property="brand" typeof="Brand">ACME</span> <span property="name">Executive Anvil</span>
     <img property="image" src="https://example.com/photos/1x1/anvil\_executive.jpg" alt="Executive Anvil logo" />
     <span property="aggregateRating"
           typeof="AggregateRating">
      Average rating: <span property="ratingValue">4.4</span>, based on
      <span property="ratingCount">89</span> reviews
     </span>
     <span property="offers" typeof="AggregateOffer">
      from $<span property="lowPrice">119.99</span> to
      $<span property="highPrice">199.99</span>
      <meta property="priceCurrency" content="USD" />
     </span>
    </div>
  </body>
</html>

 <html> <head> <title>Executive Anvil</title> </head> <body> <div itemscope itemtype="https://schema.org/Product"> <span itemprop="brand" itemtype="https://schema.org/Brand" itemscope>ACME</span> <span itemprop="name">Executive Anvil</span> <img itemprop="image" src="https://example.com/photos/1x1/anvil\_executive.jpg" /> <span itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating"> Average rating: <span itemprop="ratingValue">4.4</span>, based on <span itemprop="ratingCount">89</span> reviews </span> <span itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer"> from $<span itemprop="lowPrice">119.99</span> to $<span itemprop="highPrice">199.99</span> <meta itemprop="priceCurrency" content="USD" /> </span> </div> </body> </html>

  

 <html>
  <head>
    <title>Executive Anvil</title>
  </head>
  <body>
    <div itemscope itemtype="https://schema.org/Product">
      <span itemprop="brand" itemtype="https://schema.org/Brand" itemscope>ACME</span> <span itemprop="name">Executive Anvil</span>
      <img itemprop="image" src="https://example.com/photos/1x1/anvil\_executive.jpg" />
      <span itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
        Average rating: <span itemprop="ratingValue">4.4</span>, based on
        <span itemprop="ratingCount">89</span> reviews
      </span>
      <span itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer">
        from $<span itemprop="lowPrice">119.99</span> to
        $<span itemprop="highPrice">199.99</span>
        <meta itemprop="priceCurrency" content="USD" />
      </span>
    </div>
  </body>
</html>

## ガイドライン

コンテンツがリッチリザルトとして表示されるようにするには、下記のガイドラインを遵守する必要があります。

**警告:** サイトが下記のガイドラインのいずれかに違反している場合、Google はそのサイトに対して[手動による対策](https://support.google.com/webmasters/answer/2604824?hl=ja)を実施することがあります。問題があった場合は、修正した後、サイトの[再審査をリクエスト](https://support.google.com/webmasters/answer/35843?hl=ja)できます。

- [技術に関するガイドライン](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#technical-guidelines)
- [検索の基本事項](https://developers.google.com/search/docs/essentials?hl=ja)
- [構造化データに関する一般的なガイドライン](https://developers.google.com/search/docs/appearance/structured-data/sd-policies?hl=ja)

### 技術に関するガイドライン

- 数多くのレビューを集計してアイテムの総合評価を表示する場合は [schema.org/AggregateRating](https://schema.org/AggregateRating) でマークアップします。総合評価はリッチ スニペットとして表示されますが、アイテムのタイプによっては検索結果内に表示されることもあります。
- [schema.org/Book](https://schema.org/Book) や [schema.org/Recipe](https://schema.org/Recipe) など、別の schema.org タイプのマークアップにレビューをネストするか、`itemReviewed` プロパティの値として schema.org タイプを使用することで、特定の商品またはサービスに明確に言及します。
- マークアップしたレビュー コンテンツに、マークアップしたページからユーザーが簡単にアクセスできることを確認します。このページにレビュー コンテンツが含まれていることをユーザーがすぐにわかるようにする必要があります。たとえば、レビューをマークアップした場合、そのレビューのテキストと関連する評価をユーザーが閲覧できるようにします。`AggregateRating` を使用する場合、その総合評価をページ上でユーザーが閲覧できるようにします。
- レビュー コメントと作成者の名前が記載された評価のみを受け入れることをおすすめします。必須ではありませんが、このアプローチにより、ユーザーは評価についての補足情報を確認できるようになります。
- アイテムのカテゴリやリストに関する情報ではなく、特定のアイテムに関するレビュー情報を提供します。
- 複数のレビューを含める場合は、個々のレビューの総合評価も含める必要があります。
- 他のウェブサイトからのクチコミや評価は集計に含めないでください。
- ローカル ビジネスあるいは組織に対するクチコミ抜粋については、さらに以下のガイドラインを遵守する必要があります。
    - レビューされる側のエンティティが自身のレビューを管理している場合、`LocalBusiness` またはその他のタイプの `Organization` 構造化データを使用しているページは、スターレビュー機能の対象外となります。たとえば、エンティティ A に対するレビューがエンティティ A のウェブサイトに構造化データで直接、または埋め込まれたサードパーティ ウィジェットを介して置かれている場合（Google ビジネス レビューや Facebook レビューのウィジェット）などです。
        
        詳しくは、[このガイドラインを追加した理由に関するブログ投稿](https://developers.google.com/search/blog/2019/09/making-review-rich-results-more-helpful?hl=ja#updated)と[変更に関するよくある質問](https://developers.google.com/search/blog/2019/09/making-review-rich-results-more-helpful?hl=ja#faq)をご覧ください。
        
    - 評価は、ユーザーから直接入手する必要があります。
    - ローカル ビジネスの評価情報の作成、選定、編集を、人間の編集者が行うことは認められていません。

## 構造化データタイプの定義

構造化データが検索結果に表示されるようにするには、必須プロパティを含める必要があります。また、推奨プロパティを使用すると、構造化データにより多くの情報を追加でき、ユーザー エクスペリエンスの向上につながります。

### `Review`

`Review` の定義の全文は [schema.org/Review](https://schema.org/Review) で確認できます。

Google がサポートするプロパティは、次のとおりです。

| 必須プロパティ |
| --- |
| `author` | 
`[Person](https://schema.org/Person)` または `[Organization](https://schema.org/Organization)`

レビュー投稿者。投稿者名は有効な名前でなければなりません。たとえば、「土曜日まで 50% 割引」は無効な名前です。

このフィールドは 100 文字未満で指定してください。100 文字を超える場合、ページは投稿者のクチコミ抜粋の対象外になります。

さまざまな記事の作成者を Google ができる限り正しく認識できるように、[作成者のマークアップのベスト プラクティス](https://developers.google.com/search/docs/appearance/structured-data/article?hl=ja#author-bp)を実践することを検討してください。

 |
| `itemReviewed` | 

有効なタイプのいずれか

レビュー対象のアイテム。ただし、`[review](https://schema.org/review)` プロパティを使用して別の schema.org タイプにレビューをネストする場合は、`itemReviewed` プロパティを省略できます。

レビュー対象のアイテムに有効なタイプは次のとおりです。

- `[Book](https://schema.org/Book)`
- `[Course](https://schema.org/Course)`
- `[CreativeWorkSeason](https://schema.org/CreativeWorkSeason)`
- `[CreativeWorkSeries](https://schema.org/CreativeWorkSeries)`
- `[Episode](https://schema.org/Episode)`
- `[Event](https://schema.org/Event)`
- `[Game](https://schema.org/Game)`
- `[HowTo](https://schema.org/HowTo)`
- `[LocalBusiness](https://schema.org/LocalBusiness)`
- `[MediaObject](https://schema.org/MediaObject)`
- `[Movie](https://schema.org/Movie)`
- `[MusicPlaylist](https://schema.org/MusicPlaylist)`
- `[MusicRecording](https://schema.org/MusicRecording)`
- `[Organization](https://schema.org/Organization)`
- `[Product](https://schema.org/Product)`
- `[Recipe](https://schema.org/Recipe)`
- `[SoftwareApplication](https://schema.org/SoftwareApplication)`

 |
| `itemReviewed.name` | 

`[Text](https://schema.org/Text)`

レビュー対象のアイテムの名前。`[review](https://schema.org/review)` プロパティを使用して別の schema.org タイプにレビューをネストする場合は、レビュー対象の `name` を指定する必要があります。次に例を示します。

{
  "@context": "https://schema.org/",
  "@type": "Game",
  **"name": "Firefly",**
  "review": {
    "@type": "Review",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": 5
    },
    "author": {
      "@type": "Person",
      "name": "John Doe"
    }
  }
}

 |
| `reviewRating` | 

`[Rating](https://schema.org/Rating)`

このレビューで与えられた評価。ネストされた [`Rating`](https://schema.org/Rating) か、より具体的なサブタイプを指定できます。代表的なサブタイプは [`AggregateRating`](https://developers.google.com/search/docs/appearance/structured-data/review-snippet?hl=ja#aggregated-rating-type-definition) です。

 |
| `reviewRating.ratingValue` | 

`[Number](https://schema.org/Number)` または `[Text](https://schema.org/Text)`

数字、分数、またはパーセンテージでアイテムの質の評価を表す数値（例: `4`、`60%`、`6 / 10`）。分数やパーセンテージを使用した場合、比率であると認識されます。これは、比の値つまり比率は分数自体またはパーセンテージで表されるためです。数字のデフォルトの尺度は 5 段階評価（1 が最小、5 が最高）です。別の尺度にする場合は、`bestRating` と `worstRating` を使用します。

小数の場合はカンマではなくドットを使用して数値を指定します（例: `4,4` ではなく `4.4`）。microdata や RDFa では `content` 属性を使用して表示されているコンテンツをオーバーライドできます。これにより、構造化データのドットの要件を満たしつつ、どのようなスタイル規則でも表示させることができます。次に例を示します。

<span itemprop="ratingValue" content="4.4">4,4</span> stars

 |

| 推奨プロパティ |
| --- |
| `datePublished` | 
`[Date](https://schema.org/Date)`

レビューが公開された日付。[ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) の日付形式で指定します。

 |
| `reviewRating.bestRating` | 

`[Number](https://schema.org/Number)`

この評価システムで使用できる最大値。`bestRating` を省略すると、5 であると見なされます。

 |
| `reviewRating.worstRating` | 

`[Number](https://schema.org/Number)`

この評価システムで使用できる最小値。`worstRating` を省略すると、1 であると見なされます。

 |

### `AggregateRating`

`AggregateRating` の定義の全文は [schema.org/AggregateRating](https://schema.org/AggregateRating) で確認できます。

Google がサポートするプロパティは、次のとおりです。

| 必須プロパティ |
| --- |
| `itemReviewed` | 
有効なタイプのいずれか

評価対象のアイテム。ただし、`[aggregateRating](https://schema.org/aggregateRating)` プロパティを使用して別の schema.org タイプに総合評価をネストする場合は、`itemReviewed` プロパティを省略できます。

レビュー対象のアイテムに有効なタイプは次のとおりです。

- `[Book](https://schema.org/Book)`
- `[Course](https://schema.org/Course)`
- `[CreativeWorkSeason](https://schema.org/CreativeWorkSeason)`
- `[CreativeWorkSeries](https://schema.org/CreativeWorkSeries)`
- `[Episode](https://schema.org/Episode)`
- `[Event](https://schema.org/Event)`
- `[Game](https://schema.org/Game)`
- `[HowTo](https://schema.org/HowTo)`
- `[LocalBusiness](https://schema.org/LocalBusiness)`
- `[MediaObject](https://schema.org/MediaObject)`
- `[Movie](https://schema.org/Movie)`
- `[MusicPlaylist](https://schema.org/MusicPlaylist)`
- `[MusicRecording](https://schema.org/MusicRecording)`
- `[Organization](https://schema.org/Organization)`
- `[Product](https://schema.org/Product)`
- `[Recipe](https://schema.org/Recipe)`
- `[SoftwareApplication](https://schema.org/SoftwareApplication)`

 |
| `itemReviewed.name` | 

`[Text](https://schema.org/Text)`

レビュー対象のアイテムの名前。`[review](https://schema.org/review)` プロパティを使用して別の schema.org タイプにレビューをネストする場合は、レビュー対象の `name` を指定する必要があります。次に例を示します。

{
  "@context": "https://schema.org/",
  "@type": "Game",
  **"name": "Firefly",**
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": 88,
    "bestRating": 100,
    "ratingCount": 20
  }
}

 |
| `ratingCount` | 

`[Number](https://schema.org/Number)`

サイトでのアイテムの評価の合計数。`ratingCount` または `reviewCount` の少なくとも 1 つは必須です。

 |
| `reviewCount` | 

`[Number](https://schema.org/Number)`

評価の有無にかかわらず、レビューを投稿した人の数。`ratingCount` または `reviewCount` の少なくとも 1 つは必須です。

 |
| `ratingValue` | 

`[Number](https://schema.org/Number)` または `[Text](https://schema.org/Text)`

アイテムの品質の平均評価。数字、分数、パーセンテージ（`4`、`60%`、`6 / 10`など）で表します。分数やパーセンテージの場合、尺度は分数自体またはパーセンテージでわかるため、指定する必要がありません。数字のデフォルトの尺度は 5 段階評価（1 が最小、5 が最高）です。別の尺度にする場合は、`bestRating` と `worstRating` を使用します。

小数の場合はカンマではなくドットを使用して数値を指定します（例: `4,4` ではなく `4.4`）。Microdata や RDFa では `content` 属性を使用して表示されているコンテンツをオーバーライドできます。これにより、構造化データのドットの要件を満たしつつ、どのようなスタイル規則でも表示させることができます。次に例を示します。

<span itemprop="ratingValue" content="4.4">4,4</span> stars

 |

| 推奨プロパティ |
| --- |
| `bestRating` | 
`[Number](https://schema.org/Number)`

この評価システムで使用できる最大値。`bestRating` を省略すると、5 であると見なされます。

 |
| `worstRating` | 

`[Number](https://schema.org/Number)`

この評価システムで使用できる最小値。`worstRating` を省略すると、1 であると見なされます。

 |