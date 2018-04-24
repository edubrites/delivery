angular.module('starter.controllers')
    .controller('HomeCtrl',
        ['$scope', '$cookies', '$http',
            function ($scope, $cookies, $http) {
                // console.log(meuValue);
                $scope.user = '';
                $http({
                    method: 'GET',
                    url: 'http://10.211.55.9/api/authenticated'
                }).then(function successCallback(response) {
                    $scope.user = response.data;

                }, function errorCallback(response) {
                    console.log('erro ao autenticar');
                });
            }]);
