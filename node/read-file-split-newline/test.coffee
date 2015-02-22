fs = require('fs')

path = './sample.txt'
file = fs.readFileSync(path, 'utf8')

words = file.split('\n')

# 最後の要素を抽出して削除する
# 改行だけの部分ができるので。
words.pop()

console.log words
