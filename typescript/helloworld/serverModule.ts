/// <reference path="../node.d.ts"/>;
import http = require("http");

export class ServerAPI
{
    public initServer():void
    {
        var server:http.Server = http.createServer((request:http.ServerRequest, response:http.ServerResponse) => this.requestHandler(request, response));
        server.listen("5000");
    }

    /*
     * サーバにリクエストがあった時に実行される関数
     */
    private requestHandler(request:http.ServerRequest, response:http.ServerResponse):void
    {
        response.end("Call From ServerAPI Class");
    }

}
