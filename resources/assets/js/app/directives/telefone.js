'use strict';

module.exports = function () {
  return {
    require: 'ngModel',
    link: function (scope, element, attributes, ctrl) {
      element.bind('keyup', function () {
        var _formatTel = function (value) {
          value = value.replace(/[^0-9]+/g, "");
          if (value.length > 2 && value.length <= 10) {
            value = "(" + value.substring(0, 2) + ")" + value.substring(2, 6) + "-" + value.substring(6, 10);
          }
          else if (value.length > 2) {
            value = "(" + value.substring(0, 2) + ")" + value.substring(2, 7) + "-" + value.substring(7, 11);
          }
          return value;
        };
        ctrl.$setViewValue(_formatTel(ctrl.$viewValue));
        ctrl.$render();
      });
      ctrl.$parsers.push(function (value) {
        if (value.length > 10) {
          return value.replace(/[^0-9]+/g, "");
        }
      });
    }
  };
};