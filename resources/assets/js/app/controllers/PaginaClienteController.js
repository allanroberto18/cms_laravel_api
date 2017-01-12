module.exports = function ($scope, $log, $uibModal, ClientAPIService, ImageService) {

    $scope.modulo = {
        title: 'Gerenciar Módulo',
        subtitle: 'Clientes do Segmento'
    };

    $scope.title = '';
    $scope.column = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';

    $scope.loadList;
    $scope.showForm;
    $scope.loadForm;
    $scope.itemsSelectedAll = false;
    $scope.animationsEnabled = true;

    $scope.items = {};
    $scope.total = 0;
    $scope.perPage = 10;
    $scope.pagination = {
        current: 1
    };

    $scope.errors = '';
    $scope.message = '';

    $scope.token = '';
    $scope.pagina = '';
    $scope.entity = {};

    $scope.pageChanged = function (page) {
        list(page);
    };

    var list = function (page) {
        $scope.loadList = true;

        ClientAPIService.getList('pagina/cliente/' + $scope.pagina, page)
            .then(function (result) {
                $scope.items = result.data;

                $scope.total = $scope.items.meta.pagination.total;

                $scope.loadList = false;
            });
    };

    $scope.loadPage = function() {
        list(1);
    };

    $scope.init = function (pagina) {
        $scope.pagina = pagina;

        list(1);
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
    };

    $scope.new = function () {
        $scope.title = 'Novo Registro';

        $scope.edit(true);

        $scope.entity = {
            pagina_id: $scope.pagina,
            nome: '',
            cidade: '',
            imagem: '',
            posicao: '',
            status: 1
        };
    };

    $scope.load = function (entity) {
        $scope.title = 'Alterar Registro #' + entity.id;

        $scope.entity = entity;

        $scope.edit(true);
    };

    $scope.closeMessage = function () {
        $scope.message = '';
    };

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
        var modulo = 'pagina/cliente/remover';

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
                        list($scope.items.meta.pagination.current_page);
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
                ClientAPIService.getDelete('pagina/cliente/remover', selecteds)
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
            ClientAPIService.getPut('pagina/cliente/atualizar/' + entity.id, entity)
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

        ClientAPIService.getPost('pagina/cliente/salvar', entity)
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
        return;
    };

    $scope.upload = function (imagem) {
        $scope.loadForm = true;

        var fd = new FormData();
        fd.append('file', imagem[0]);

        ImageService.post(fd, 'pagina/cliente/upload')
            .then(function (data) {
                $scope.entity.imagem = data.data;

                $scope.loadForm = false;
            });
    }
};