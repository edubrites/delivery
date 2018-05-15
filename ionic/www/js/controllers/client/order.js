angular.module('starter.controllers')
    .controller("ClientOrderCtrl", [
        "$scope", "$state", "Order", "$ionicLoading",
        function($scope, $state, Order, $ionicLoading){

            $scope.items = {};

            $ionicLoading.show({
                template: "Carregando..."
            });

            $scope.doRefresh = function () {
                getOrders({include: "items"}).then(function(data){
                    $scope.items = data.data;
                    $scope.$broadcast('scroll.refreshComplete');
                }, function(dataError){
                    $scope.$broadcast('scroll.refreshComplete');
                });
            };

            function getOrders(){
                return Order.query({
                    id : null,
                    orderBy: 'created_at',
                    sortedBy: 'desc'
                }).$promise;
            }

            getOrders().then(function(data){
                $scope.items = data.data;
                //console.log(data.data);
                $ionicLoading.hide();
            }, function(dataError){

            });



        }]);