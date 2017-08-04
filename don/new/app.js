/**
 * Created by 3002 on 2/15/2017.
 */
var url = require('url');
var fs = require('fs');
var HOME = __dirname;
function renderHTML(path, response) {
    fs.readFile(path, null, function (error, data) {
        if (error){response.writeHead(404); response.write('Page not found!');}
        else {response.write(data);}response.end();
    });
}
module.exports = {
    handleRequest: function (request, response) {
        response.writeHead(200, {'Content-Type': 'text/html'});

        var path = url.parse(request.url).pathname;
        switch(path){
            case '/': renderHTML(HOME + '/view/index.html', response); break;
            case '/login': renderHTML(HOME + '/view/user/login.html', response); break;
            default:
                response.writeHead(404);
                response.write('Route not defined.');
                response.end();
        }
    }
};