angular.module('starter.controllers')
    .controller('ClientViewProductsCtrl', [
        '$scope', 'OAuth', '$ionicPopup', '$state', function ($scope, OAuth, $ionicPopup, $state) {

            $scope.user = {
                username: '',
                password: ''
            };


            $scope.login = function () {
                OAuth.getAccessToken($scope.user)
                    .then(function (data) {
                        // success
                        $state.go('home',{'login':$scope.user.name});
                    }, function (responseError) {
                        $ionicPopup.alert({
                            title: 'Advertência',
                            template: 'Login e/ou senha inválido(s)'
                        });
                        console.debug(responseError);
                    });
            }
        }
    ]);