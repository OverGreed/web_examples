var http = require('http');
var port = 1337;
var host = '127.0.0.1';

http.createServer(function(request, response) {
    console.log('From: '+request.connection.remoteAddress+', Path: '+request.url);
    var text = '';

    if(request.method === 'POST'){
        request.addListener('data', function(chunk) {
            text += chunk;
        });
        
        request.addListener('end', function() {
            if(text){
                response.writeHeader(200, {
                    'Content-Type': 'application/json'
                });
                try {
                    var jsonObject = request = JSON.parse(text);
                    response.end(JSON.stringify({
                        success: true,
                        username: jsonObject.username
                    }));
                } catch(e) {
                    response.writeHead(500, {
                        'content-type': 'text/plain'
                    });
                    response.end('Post json data cannot be parsed: '+e);
                }
            } else {
                response.writeHeader(200, {
                    'Content-Type': 'text/html'
                });
                response.end('No Data Provided!');
            }
        });
    } else {
        response.writeHeader(200, {
            'Content-Type': 'text/html'
        });
        response.end('No Data Provided!');
    }
}).listen(port, host);

console.log('Server start at http://'+host+':'+port+'/');
