'use strict';

module.exports = function () {
  return {
    require: 'ngModel',
    link: function (scope, element, attributes, ctrl) {
      element.bind('keyup', function () {
        var _formatTel = function (value) {
          value = value.replace(/[^0-9]+/g, "");
          if (value.length === 8) {
            value =  value.substring(0, 5) + "-" + value.substring(5, 8);
          }
          return value;
        };
        ctrl.$setViewValue(_formatTel(ctrl.$viewValue));
        ctrl.$render();
      });
      ctrl.$parsers.push(function (value) {
        if (value.length === 8) {
          return value.replace(/[^0-9]+/g, "");
        }
      });
    }
  };
};