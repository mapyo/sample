yaml = require 'js-yaml'
fs = require 'fs'

test = yaml.safeLoad(fs.readFileSync('./test.yml'))

console.log test
console.log test[Math.floor(Math.random() * test.length)]


