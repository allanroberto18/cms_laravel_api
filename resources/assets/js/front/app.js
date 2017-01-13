require('angular');
require('angular-ui-bootstrap');
require('angular-animate');
require('angular-sanitize');

// Configs
var configValue = require('../app/config/configValue');

// Services
var ModalService = require('../app/services/ModalService');

// Controllers
var FaleConoscoController = require('./controllers/FaleConoscoController');

angular.module('app', [
    'ngSanitize',
    'ngAnimate',
    'ui.bootstrap'
]);

// Configs
angular.module('app').value('configValue', configValue);
angular.module('app').controller('FaleConoscoController', ['$scope', '$log', '$http', 'configValue', FaleConoscoController]);





