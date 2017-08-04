/**
 * Created by 3002 on 2/16/2017.
 */
var nconf = require('nconf');
var path = require('path');
nconf.argv().env().file({ file: path.join(__dirname, 'config.json') });
module.exports = nconf;