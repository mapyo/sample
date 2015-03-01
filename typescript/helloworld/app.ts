// Node.jsの型定義ファイルの読み込み
/// <reference path="../node.d.ts"/>;
import http = require("http");
class Main
{
    // コンストラクター
    constructor()
    {
        // httpサーバーを設定
        var server:http.Server = http.createServer((request, response) => this.requestHandler(request, response));
        // var server:http.Server = http.createServer((request, response) => this.requestHandler(request, response));
        // サーバを起動してリクエストを待ち受け状態にする
        server.listen("5000");
    }
    /*
     * サーバにリクエストがあった時に実行される関数
     */
     private requestHandler(request, response):void
     {
         response.end("Hello! Node.js with TypeScript");
     }
}

// Mainクラスのインスタンス作成
var main:Main = new Main();
