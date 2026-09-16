<?xml version="1.0" encoding="UTF-8"?>
<!--
  Оформление RSS-ленты для браузеров.
  Без этого Chrome/Edge показывают ленту как plain-text.
-->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" encoding="UTF-8" indent="yes"/>
  <xsl:template match="/">
    <html lang="ru">
      <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><xsl:value-of select="/rss/channel/title"/></title>
        <style>
          * { margin: 0; padding: 0; box-sizing: border-box; }
          body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; background: #f3f4fb; color: #0f172a; padding: 24px; }
          .wrap { max-width: 760px; margin: 0 auto; }
          .hero { background: #0f172a; color: #fff; border-radius: 16px; padding: 28px; margin-bottom: 20px; }
          .hero h1 { font-size: 22px; margin-bottom: 8px; }
          .hero p { color: #cbd5e1; font-size: 14px; line-height: 1.6; }
          .hero a { color: #fb923c; }
          .item { background: #fff; border: 1px solid #e6e7ee; border-radius: 12px; padding: 18px 20px; margin-bottom: 12px; }
          .item h2 { font-size: 17px; margin-bottom: 6px; }
          .item h2 a { color: #0f172a; text-decoration: none; }
          .item h2 a:hover { color: #ea580c; }
          .meta { font-size: 12px; color: #94a3b8; margin-bottom: 8px; }
          .desc { font-size: 14px; color: #475569; line-height: 1.6; }
        </style>
      </head>
      <body>
        <div class="wrap">
          <div class="hero">
            <h1><xsl:value-of select="/rss/channel/title"/></h1>
            <p><xsl:value-of select="/rss/channel/description"/></p>
            <p style="margin-top:10px"><a href="/blogs">Все статьи блога →</a></p>
          </div>
          <xsl:for-each select="/rss/channel/item">
            <div class="item">
              <h2><a href="{link}"><xsl:value-of select="title"/></a></h2>
              <div class="meta"><xsl:value-of select="pubDate"/> · <xsl:value-of select="category"/></div>
              <div class="desc"><xsl:value-of select="description"/></div>
            </div>
          </xsl:for-each>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
