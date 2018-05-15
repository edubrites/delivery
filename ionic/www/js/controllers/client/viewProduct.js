angular.module('starter.controllers')
    .controller('ClientViewProductsCtrl', [
        "$scope", "$state", "Product", "$ionicLoading", "$cart", "$ionicPopup",
        function($scope, $state, Product, $ionicLoading, $cart, $ionicPopup){

            $scope.products = [];
            $ionicLoading.show({
                template: 'Carregando...'
            });

            Product.query({}, function (data) {
                $scope.products = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: "Problemas em exibir os produtos",
                    template: "dataError = " + JSON.stringify(dataError)
                });
            });

            $scope.addItem = function (item) {
                $cart.items.push(item);
                $state.go('client.checkout');
            };

            $scope.addItem = function(item){
                item.qtd = 1;
                $cart.addItem(item);
                $state.go('client.checkout');
            };

        }]);