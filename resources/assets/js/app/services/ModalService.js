module.exports = function ($scope, $uibModalInstance, title, message, entity) {
  $scope.title = title;
  $scope.message = message;
  $scope.entity = entity;

  $scope.ok = function () {
    $uibModalInstance.close($scope.entity);
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
};