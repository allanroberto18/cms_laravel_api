module.exports = function ($http, configValue) {
  var prefix = 'api/angular/';

  this.getToken = function () {
    return $http.get(configValue.apiUrl + 'angular/token');
  };

  this.getList = function(module,page) {
    return $http.get(configValue.apiUrl + prefix + module + '?page=' + page);
  };

  this.getLoad = function(module) {
    return $http.get(configValue.apiUrl + prefix + module);
  };

  this.getPost = function(module, data) {
    return $http.post(configValue.apiUrl + prefix + module, data);
  }

  this.getPut = function(module, data) {
    return $http.put(configValue.apiUrl + prefix + module, data);
  }

  this.getDelete = function(module, data) {
    return $http.post(configValue.apiUrl + prefix + module, data);
  }
};
