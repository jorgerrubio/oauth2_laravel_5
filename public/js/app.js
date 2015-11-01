angular.module('app', ['app.controllers', 'ngRoute'],
	function($interpolateProvider){
		$interpolateProvider.startSymbol('<%');
		$interpolateProvider.endSymbol('%>');
	})
	.config(function ($routeProvider) {
		$routeProvider
			.when('/', {
				templateUrl: 'js/views/home.html',
				// controller: 'HomeController'
			})
			.when('/login', {
				templateUrl: 'js/views/login.html',
				controller: 'LoginController'
			})
			.when('/posts', {
				templateUrl: '/js/views/posts.html',
				controller: 'PostController'
			})
			.otherwise({ redirectTo: '/' });
	});