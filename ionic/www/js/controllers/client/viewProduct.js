angular.module('starter.controllers')
    .controller('ClientViewProductsCtrl', [
        '$scope', '$state', 'Product',  function ($scope, $state, Product) {

        Product.query({}, function (data) {
            console.log(data.data);
        })

        }
    ]);