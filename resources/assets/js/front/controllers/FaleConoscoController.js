module.exports = function ($scope, $log, $http, configValue) {

    $scope.assuntos = {};

    $scope.entity = {};

    $scope.isDisabled = false;
    $scope.loading = false;
    $scope.showErrors = false;
    $scope.erros = {};

    $scope.init = function () {
        $scope.getAssuntos();
    };

    $scope.getAssuntos = function () {
        $http.get(configValue.apiUrl + 'api/angular/contato/assuntos')
            .then(function (result) {
                $scope.assuntos = result.data;
            });
    };

    $scope.salvar = function (entity) {
        $scope.erros = '';
        $scope.showErrors = false;
        $scope.form.$setPristine();

        $scope.isDisabled = true;
        $scope.loading = true;

        $http.post(configValue.apiUrl + 'api/angular/contato/salvar', entity, {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(function (response, data) {
            $scope.entity = {};

            alert('Sua mensagem foi enviada com sucesso');

            $scope.isDisabled = false;
            $scope.loading = false;
        }, function (response) {
            $scope.erros = response.data;
            $scope.showErrors = true;

            $scope.isDisabled = false;
            $scope.loading = false;
        });
    };
};
