module.exports = function ($http, configValue) {
  var prefix = 'api/angular/';

  this.post = function (data, modulo) {
    return $http.post(configValue.apiUrl + prefix + modulo, data, {
      withCredentials: true,
      headers: {"Content-type": undefined},
      transformRequest: angular.identity
    });
  };

  this.put = function (data, modulo) {
    return $http.put(configValue.apiUrl + prefix + modulo, data, {
      withCredentials: true,
      headers: {"Content-type": undefined},
      transformRequest: angular.identity
    });
  };
};