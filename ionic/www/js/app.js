// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', [
    'ionic','starter.controllers','angular-oauth2'
])
    .provider('calculadorDeArea', function () {

        var o = {
            calcular: function () {
                return this.largura * this.comprimento;
            }
        };

        return {
            $get: function () {
                o.largura = this.largura;
                o.comprimento = this.comprimento;
                return o;
            }
        }
    })
    .factory('meuFactory', ['OAuth', '$http', function (a, ajax) {
        //a.getAccessToken({username:'teste@teste.com',password:'Teste'});
        //ajax.get();
        return {
            largura: 40,
            comprimento: 40,
            minhaFuncao: function () {
                //console.log("Factory: " + this.largura * this.comprimento);
            }
        }
    }])
    .service('meuService', ['OAuth', '$http', function (a, ajax) {
        // a.getAccessToken({username:'teste@teste.com',password:'Teste'});
        // ajax.get();
        this.largura = 40;
        this.comprimento = 40;
        this.minhaFuncao = function () {
            //console.log("Service: "+ this.largura * this.comprimento);
        };
    }])
    .constant("meuConstant",{
        name: "Eduardo Brites",
        endereco: "Rua aaaaa",
        minhaFuncao: function () {
            //console.log("minha função dentro do meuConstant");
        }
    })
    .run(function ($ionicPlatform, meuConstant, meuService,meuFactory) {
        // meuFactory.largura = 100;
        // meuService.largura = 200;
        // meuService.minhaFuncao();
        // meuFactory.minhaFuncao();

        $ionicPlatform.ready(function () {
            if (window.cordova && window.cordova.plugins.Keyboard) {
                // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
                // for form inputs)
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

                // Don't remove this line unless you know what you are doing. It stops the viewport
                // from snapping when text inputs are focused. Ionic handles this internally for
                // a much nicer keyboard experience.
                cordova.plugins.Keyboard.disableScroll(true);
            }
            if (window.StatusBar) {
                StatusBar.styleDefault();
            }
        });
    })
    .config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider,
                      meuConstant,calculadorDeAreaProvider) {
        calculadorDeAreaProvider.largura = 50;
        calculadorDeAreaProvider.comprimento= 50;

        OAuthProvider.configure({
            baseUrl: 'http://10.211.55.9',
            clientId: 'appid01',
            clientSecret: 'secret', // optional
            grantPath: '/oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });

        $stateProvider
            .state('login',{
                url: '/login',
                templateUrl: 'templates/login.html',
                controller: 'LoginCtrl'
            })
            .state('home', {
                url: '/home',
                templateUrl: 'templates/home.html',
                // controller: 'HomeCtrl'
                controller: function ($scope, meuConstant,meuService, meuFactory,calculadorDeArea) {
                   console.log(calculadorDeArea.calcular());
                   // console.log(meuValue);
                    meuConstant.minhaFuncao();
                    meuFactory.minhaFuncao();
                }
            });
       // $urlRouterProvider.otherwise('/');
    });