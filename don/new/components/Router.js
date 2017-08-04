/**
 * Created by 3002 on 2/13/2017.
 */
var routes, routersPath, u, controllerName, language, languagePath, parts, arrName, actionName, controllerFile;

//Create variable containing
routersPath = __dirname + '/configurations/routers.json';

routes = require('lang');

language = require(languagePath);
module.exports = {
    handleRequest: function (request, response) {
        response.writeHead(200, {'Content-Type': 'text/html'});
        u =  request.url.substr(1);
        parts = routes[u];
        arrName = parts.split('|');
        controllerName = arrName['0'];
        controllerName = controllerName.charAt(0).toUpperCase() + controllerName.substr(1);
        actionName = arrName['1'];
        actionName = 'action' + actionName.charAt(0).toUpperCase() + actionName.substr(1);
        switch (routes){
            case routes[u]: controllers.controllerName(data, response); break;
            default:
                response.writeHead(404);
                response.write('Route not defined.');
                response.end();
        }


        var path = url.parse(request.url).pathname;
        switch(path){
            case '/': renderHTML('./view/index.html', response); break;
            case '/login': renderHTML('./view/user/login.html', response); break;
            default:
                response.writeHead(404);
                response.write('Route not defined.');
                response.end();
        }
    }
};