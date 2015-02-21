client = require('cheerio-httpcli')

urlEncode = (string) ->
  Encoding.urlEncode(string)

words = [ '面白い　サイト', 'hoge' ]

search = (word) ->
  client.fetch('http://search.yahoo.co.jp/search', { p: word }, (err, $, res) ->
    url = $('#WS2m > div').eq(4).find('h3 > a').attr('href')
    console.log word
    console.log url
  )

words.forEach (word) ->
  search word
