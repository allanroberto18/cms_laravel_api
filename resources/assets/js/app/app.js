require('angular');
require('angular-ui-bootstrap');
require('angular-utils-pagination');
require('angular-animate');
require('angular-sanitize');
require('angular-route');
require('angular-youtube-embed');
require('angular-ui-mask/dist/mask');
require('textangular/dist/textAngular-sanitize');
require('textAngular');
require('./locale/angular-locale_pt-br');

// Configs
var configValue = require('./config/configValue');

// Directives
var cep = require('./directives/cep');
var alertMsg = require('./directives/alertMsg');
var telefone = require('./directives/telefone');
var passwordVerify = require('./directives/passwordVerify');

// Services
var ImageService = require('./services/ImageService');
var ModalService = require('./services/ModalService');

// Controllers
var BannerController = require('./controllers/BannerController');
var ClientAPIService = require('./services/ClientAPIService');
var ConfigController = require('./controllers/ConfigController');
var DownloadController = require('./controllers/DownloadController');
var DashboardController = require('./controllers/DashboardController');
var FaleConoscoController = require('./controllers/FaleConoscoController');
var MenuController = require('./controllers/MenuController');
var NoticiaController = require('./controllers/NoticiaController');
var PaginaController = require('./controllers/PaginaController');
var PaginaCaracteristicaController = require('./controllers/PaginaCaracteristicaController');
var PaginaSegmentoController = require('./controllers/PaginaSegmentoController');
var PaginaSegmentoCaracteristicaController = require('./controllers/PaginaSegmentoCaracteristicaController');
var PaginaVideoController = require('./controllers/PaginaVideoController');
var SobreNosController = require('./controllers/SobreNosController');
var VideoController = require('./controllers/VideoController');

angular.module('app', [
    'angularUtils.directives.dirPagination',
    'ngSanitize',
    'ngAnimate',
    'ui.bootstrap',
    'ngRoute',
    'youtube-embed',
    'ui.mask',
    'textAngular'
]).config(
    function (paginationTemplateProvider) {
        paginationTemplateProvider.setPath('/js/app/templates/dirPagination.tpl.html');
    }
);

angular.module('app').config(function ($routeProvider) {
    // Routes
    $routeProvider
        .when("/", {
            templateUrl: "/js/app/templates/dashboard/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/banner", {
            templateUrl: "/js/app/templates/banner/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/config", {
            templateUrl: "/js/app/templates/config/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/contato", {
            templateUrl: "/js/app/templates/contato/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/menu", {
            templateUrl: "/js/app/templates/menu/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/download", {
            templateUrl: "/js/app/templates/download/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/noticia", {
            templateUrl: "/js/app/templates/noticia/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/pagina", {
            templateUrl: "/js/app/templates/pagina/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/sobre_nos", {
            templateUrl: "/js/app/templates/sobre_nos/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
        .when("/video", {
            templateUrl: "/js/app/templates/video/index.tpl.html",
            resolve: {
                // I will cause a 1 second delay
                delay: function ($q, $timeout) {
                    var delay = $q.defer();
                    $timeout(delay.resolve, 1000);
                    return delay.promise;
                }
            }
        })
    ;
});

// Configs
angular.module('app').value('configValue', configValue);

// Directives
angular.module('app').directive('alertMsg', [alertMsg]);
angular.module('app').directive('cep', [cep]);
angular.module('app').directive('telefone', [telefone]);
angular.module('app').directive('passwordVerify', [passwordVerify]);

// Services
angular.module('app').service('ImageService', ['$http', 'configValue', ImageService]);
angular.module('app').service('ClientAPIService', ['$http', 'configValue', ClientAPIService]);
angular.module('app').controller('ModalService', ['$scope', '$uibModalInstance', 'title', 'message', 'entity', ModalService]);

// Controllers
angular.module('app').controller('BannerController', ['$scope', '$log', '$uibModal', 'ClientAPIService', 'ImageService', BannerController]);
angular.module('app').controller('ConfigController', ['$scope', '$log', '$uibModal', 'ClientAPIService', 'ImageService', '$http', ConfigController]);
angular.module('app').controller('DashboardController', ['$scope', '$log', '$uibModal', 'ClientAPIService', DashboardController]);
angular.module('app').controller('DownloadController', ['$scope', '$log', '$uibModal', 'ClientAPIService', DownloadController]);
angular.module('app').controller('FaleConoscoController', ['$scope', '$log', '$uibModal', 'ClientAPIService', FaleConoscoController]);
angular.module('app').controller('MenuController', ['$scope', '$location', '$log', '$uibModal', 'ClientAPIService', MenuController]);
angular.module('app').controller('NoticiaController', ['$scope', '$log', '$uibModal', 'ClientAPIService', 'ImageService', NoticiaController]);
angular.module('app').controller('PaginaController', ['$scope', '$log', '$uibModal', 'ClientAPIService', 'ImageService', PaginaController]);
angular.module('app').controller('PaginaCaracteristicaController', ['$scope', '$log', '$uibModal', 'ClientAPIService', PaginaCaracteristicaController]);
angular.module('app').controller('PaginaSegmentoController', ['$scope', '$log', '$uibModal', 'ClientAPIService', 'ImageService', PaginaSegmentoController]);
angular.module('app').controller('PaginaSegmentoCaracteristicaController', ['$scope', '$log', '$uibModal', 'ClientAPIService', PaginaSegmentoCaracteristicaController]);
angular.module('app').controller('PaginaVideoController', ['$scope', '$log', '$uibModal', 'ClientAPIService', PaginaVideoController]);
angular.module('app').controller('SobreNosController', ['$scope', '$log', '$uibModal', 'ClientAPIService', SobreNosController]);
angular.module('app').controller('VideoController', ['$scope', '$log', '$uibModal', 'ClientAPIService', VideoController]);





