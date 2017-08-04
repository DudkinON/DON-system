/**
 * Created by 3002 on 2/16/2017.
 */
var http = require('http');
//var app = require('./app');
//http.createServer(app.handleRequest).listen(8080);
var routes, routersPath, u, controllerName, language, controllers, parts, arrName, actionName, controllerFile;
routersPath = __dirname + '/configurations/routers.json';
routes = require(routersPath);
language = require('lang');
language.requireLang();
//controllers = require('controllers');
//controllers.requireControllers();

var server = http.createServer(function(request, response) {
    u =  request.url.substr(1);
    parts = routes[u];
    arrName = parts.split('|');
    controllerName = arrName['0'];
    controllerName = controllerName.charAt(0).toUpperCase() + controllerName.substr(1)+'Controller';
    actionName = arrName['1'];
    actionName = 'action' + actionName.charAt(0).toUpperCase() + actionName.substr(1);
    controllerFile = __dirname + '/controllers/' + controllerName + '.js';
    /*
     switch (routes){
     case routes[u]: renderHTML(controllers.file(controllerName, actionName), response); break;
     default:
     response.writeHead(404);
     response.write('Route not defined.');
     response.end();
     }
     */
    response.write(
        request.url
        + '\n controllerName: ' + controllerName
        + '\n actionName: ' + actionName
        + '\n parts: ' + parts
        + '\n language: ' + language.f('page_not_found')
        + '\n controllers: ' + controllers.file(controllerName, actionName)
    );
    response.end();

});
server.listen(8080);

console.log('Server running at port: 8080');