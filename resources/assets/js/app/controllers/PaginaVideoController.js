module.exports = function ($scope, $log, $uibModal, ClientAPIService, ImageService) {

    $scope.modulo = {
        title: 'Gerenciar Módulo',
        subtitle: 'Video da Página'
    };

    $scope.title = '';
    $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

    $scope.loadList;
    $scope.showForm;
    $scope.loadForm;
    $scope.itemsSelectedAll = false;
    $scope.animationsEnabled = true;

    $scope.items = {};

    $scope.errors = '';
    $scope.message = '';

    $scope.token = '';
    $scope.pagina = '';
    $scope.entity = {};

    $scope.loadPage = function() {
        list();
    };

    var list = function () {
        $scope.loadList = true;

        ClientAPIService.getLoad('pagina/video/' + $scope.pagina)
            .then(function (result) {
                $scope.items = result.data;

                $scope.loadList = false;
            });
    };

    $scope.init = function (pagina) {
        $scope.pagina = pagina;

        list();
    };

    $scope.getToken = function () {
        ClientAPIService.getToken()
            .then(function (data, status) {
                $scope.token = data;
            });
    };

    $scope.edit = function (check) {
        $scope.showForm = check;

        $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

        if (check) {
            $scope.errors = '';

            $scope.message = '';

            $scope.column = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';

            $scope.getToken();

            return;
        }
        $scope.imagem = '';
    };

    $scope.new = function () {
        $scope.title = 'Novo Registro';

        $scope.edit(true);

        $scope.entity = {
            pagina_id: $scope.pagina,
            link: '',
            largura: 1280,
            altura: 720,
            status: 1
        };
    };

    $scope.load = function (entity) {
        $scope.title = 'Alterar Registro #' + entity.id;

        $scope.entity = entity;

        $scope.edit(true);

        $scope.imagem = entity.imagem;
    };

    $scope.closeMessage = function () {
        $scope.message = '';
    };

    $scope.cancel = function (form) {
        if (form) {
            form.$setPristine();
            form.$setUntouched();
        }
        $scope.entity = {
            pagina_id: $scope.pagina,
            link: '',
            largura: 1280,
            altura: 720,
            status: 1
        };
        $scope.errors = '';
    };

    $scope.close = function (form) {
        $scope.cancel(form);

        $scope.edit(false);
    };

    $scope.checkAll = function () {
        if ($scope.itemsSelectedAll == false) {
            $scope.itemsSelectedAll = true;
        } else {
            $scope.itemsSelectedAll = false;
        }

        angular.forEach($scope.items.data, function (item) {
            item.Selected = $scope.itemsSelectedAll;
        });
    };

    $scope.delete = function (key, entity) {
        var modulo = 'pagina/video/remover';

        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'modal.tpl.html',
            controller: 'ModalService',
            resolve: {
                title: function () {
                    return 'Atenção';
                },
                message: function () {
                    return 'Deseja excluir o registro #' + entity.id;
                },
                entity: function () {
                    return entity;
                }
            }
        });

        modalInstance.result.then(function () {
            var selected = [];

            $scope.loadList = true;

            selected.push(entity.id);
            ClientAPIService.getDelete(modulo, selected)
                .then(function (data) {
                    $scope.message = data.data;

                    $scope.items.data.splice(key, 1);

                    if ($scope.items.data.length == 0) {
                        list();
                    }

                    $scope.entity = {};

                    $scope.loadList = false;
                })
                .then(function (data, status) {
                    if (status == 422) {
                        $scope.errors = data.data;
                    }
                    $scope.loadList = false;
                });
        });
    };

    $scope.deleteSelected = function () {
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'modal.tpl.html',
            controller: 'ModalService',
            resolve: {
                title: function () {
                    return 'Atenção';
                },
                message: function () {
                    return 'Deseja confirmar a exclusão dos registros selecionados?';
                },
                entity: function () {
                    return {};
                }
            }
        });

        modalInstance.result.then(function () {
            $scope.message = '';

            var selecteds = [];

            angular.forEach($scope.items.data, function (item) {
                if (item.Selected) {
                    selecteds.push(item.id);
                }
            });

            if (selecteds.length > 0) {
                ClientAPIService.getDelete('pagina/video/remover', selecteds)
                    .then(function (data, status) {
                        $scope.itemsSelectedAll = false;

                        $scope.message = data.data;

                        list();
                    });
            }
        });
    };

    $scope.save = function (entity, form) {
        form.$setPristine();
        $scope.loadForm = true;

        if (entity.id) {
            ClientAPIService.getPut('pagina/video/atualizar/' + entity.id, entity)
                .then(function (data, status) {
                    $scope.message = data.data;

                    $scope.entity = {};

                    $scope.edit(false);

                    $scope.loadForm = false;
                })
                .then(function (data, status) {
                    if (status == 422) {
                        $scope.errors = data;
                    }
                    $scope.loadForm = false;
                });
            return;
        }

        ClientAPIService.getPost('pagina/video/salvar', entity)
            .then(function (data, status) {
                entity.id = data.id;

                $scope.message = data.data;

                $scope.items.data.unshift(entity);

                $scope.edit(false);

                $scope.entity = {};

                $scope.loadForm = false;
            })
            .then(function (data, status) {
                if (status == 422) {
                    $scope.errors = data;
                }
                $scope.loadForm = false;
            });
        $scope.loadForm = false;
        return;
    };
};