var http = require('http');
var port = 1337;
var host = '127.0.0.1';

http.createServer(function(request, response) {
    console.log('From: '+request.connection.remoteAddress+', Path: '+request.url);
    response.writeHeader(200, {
        'Content-Type': 'text/html'
    });
    response.end('Hello NodeJS');
}).listen(port, host);

console.log('Server start at http://'+host+':'+port+'/');
