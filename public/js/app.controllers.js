/**
* app.controller Module
*
* Description
*/
angular.module('app.controllers', [])
	.controller('HomeController', ['$scope', '$rootScope',
		function ($scope, $rootScope){
			$rootScope.entrar = true;
			$rootScope.permiso = false;
		}
	])
	.controller('LoginController', ['$scope', '$http', '$rootScope', '$location',
		function ($scope, $http, $rootScope, $location){
			$scope.email = '';
			$scope.password = '';
			$scope.error = {
				valid: false,
				message: ''
			};

			// $scope.token = '';

			$scope.login = function(){
				$http.post('/oauth/access_token', {
					username: $scope.email,
					password: $scope.password,
					//datos api angungular
					client_id: 1,
					client_secret: 'passApi',
					grant_type: 'password'
				})
				.success(function (data){
					// $scope.token = data;
					if(typeof data.access_token != 'undefined' && data.access_token != ''){
						$scope.error.valid = false;
						$scope.error.message = '';
						$scope.email = '';
						$scope.password = '';
						$rootScope.entrar = false;
						$rootScope.permiso = true;
						$rootScope.token = data.access_token;
						$location.path('posts');
					}
				})
				.error(function (data){
					$scope.error.valid = true;
					$scope.error.message = data.error_description;
				})
				return false;
			};
		}
	])
	.controller('PostController', ['$scope', '$http', '$rootScope', '$location',
		function ($scope, $http, $rootScope, $location){
			$scope.posts = [];
			$http({
				method: 'GET',
				url: '/post',
				headers: {
					Authorization: 'Bearer ' +$rootScope.token
				}
			})
			.success(function (data){
				$scope.posts = data;
			})
			.error(function (data){
				$location.path('login');
			});
		}
	]);