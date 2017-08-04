var express = require('express');
var path = require('path');
var logger = require('morgan');
var http = require('http');
var config = require('./config');
var bodyParser = require('body-parser');
var cookieParser = require('cookie-parser');
var log = require('./libs/log')(module);

var app = express();

app.engine('ejs', require('ejs-locals'));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');


//app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
if(app.get('env') === 'development') app.use(logger('dev'));
else app.use(logger('default'));
app.use(logger('dev'));
app.use(bodyParser());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use(function (error, request, response, next) {
    if (app.get('env') === 'development'){
      var errorHandler = express._errorHandler();
      errorHandler(error, request, response, next);
    } else {response.send(500);}
});

app.get('/', function (request, response, next) {
   response.render("index", {})
});
http.createServer(app).listen(config.get('port'), function () {
    log.info('Express server works on port: ' + config.get('port'));
});



/*
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');

var index = require('./routes/index');
var users = require('./routes/users');

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');

// uncomment after placing your favicon in /public
app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', index);
app.use('/users', users);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
*/