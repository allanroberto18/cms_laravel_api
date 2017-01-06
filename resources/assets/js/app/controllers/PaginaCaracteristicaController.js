module.exports = function ($scope, $log, $uibModal, ClientAPIService) {

    $scope.modulo = {
        title: 'Gerenciar Módulo',
        subtitle: 'Características da Página'
    };

    $scope.title = '';
    $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
    $scope.loadList = '';
    $scope.showForm = false;
    $scope.loadForm = false;
    $scope.pagina = '';
    $scope.items = {};

    $scope.itemsSelectedAll = false;

    $scope.errors = '';
    $scope.message = '';

    $scope.token = '';
    $scope.icones = {};
    $scope.entity = {};
    $scope.animationsEnabled = true;

    var list = function () {
        $scope.loadList = true;
        ClientAPIService.getLoad('pagina/caracteristica/' + $scope.pagina)
            .then(function (result) {
                $scope.items = result.data;
            });
        $scope.loadList = false;
    };

    $scope.all = function () {
        list();
    };

    $scope.getIcones = function () {
        ClientAPIService.getLoad('sobre_nos/icones')
            .then(function (result, status) {
                $scope.icones = result.data;
            });
    };

    $scope.init = function (pagina) {
        $scope.pagina = pagina;
        $scope.getIcones();

        list();
    }

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
        }
        return;
    };

    $scope.new = function () {
        $scope.title = 'Novo Registro';

        $scope.entity = {
            pagina_id: $scope.pagina,
            icone: '',
            titulo: '',
            descricao: ''
        };

        $scope.edit(true);
    };

    $scope.load = function (entity) {
        $scope.title = 'Alterar Registro #' + entity.id;

        $scope.entity = entity;

        $scope.edit(true);
    };

    $scope.closeMessage = function () {
        $scope.message = '';
    }

    $scope.cancel = function (form) {
        if (form) {
            form.$setPristine();
            form.$setUntouched();
        }
        $scope.entity = {};
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
        var modulo = 'pagina/caracteristica/remover';

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
            selected.push(entity.id);
            ClientAPIService.getDelete(modulo, selected)
                .then(function (data) {
                    $scope.loadList = true;

                    $scope.message = data.data;
                    $scope.items.data.splice(key, 1);

                    $scope.loadList = false;

                    if ($scope.items.data.length == 0) {
                        list($scope.items.meta.pagination.current_page);
                    }

                    $scope.entity = {};
                })
                .then(function (data, status) {
                        if (status == 422) {
                            $scope.errors = data.data;
                        }
                    }
                );
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
                ClientAPIService.getDelete('pagina/caracteristica/remover', selecteds)
                    .then(function (data, status) {
                        $scope.itemsSelectedAll = false;
                        $scope.message = data.data;

                        list($scope.items.meta.pagination.current_page);
                    });
            }
        });
    };

    $scope.save = function (entity) {
        $scope.loadForm = true;

        if (entity.id) {
            ClientAPIService.getPut('pagina/caracteristica/atualizar/' + entity.id, entity)
                .then(function (data, status) {
                    $scope.message = data.data;

                    $scope.entity = {};

                    $scope.edit(false);
                })
                .then(function (data, status) {
                    if (status == 422) {
                        $scope.errors = data;
                    }
                });
            $scope.loadForm = false;
            return;
        }
        ClientAPIService.getPost('pagina/caracteristica/salvar', entity)
            .then(function (data, status) {

                entity.id = data.id;

                $scope.message = data.data;

                $scope.items.data.unshift(entity);

                $scope.edit(false);

                $scope.entity = {};
            })
            .then(function (data, status) {
                if (status == 422) {
                    $scope.errors = data;
                }
            });
        $scope.loadForm = false;
        return;
    };
};