	// create the module and name it scotchApp
	var scotchApp = angular.module('scotchApp', ['ngRoute'], function($interpolateProvider) {
//        $interpolateProvider.startSymbol('[[');
//        $interpolateProvider.endSymbol(']]');
    });

	// configure our routes
	scotchApp.config(function($routeProvider) {
		$routeProvider

			// route for the home page
			.when('/', {
                templateUrl : 'home',
                controller  : 'mainController'
			})

			// route for the about page
			.when('/layout-default', {
				templateUrl : 'about',
				controller  : 'aboutController'
			})

            // route for the contact page
            .when('/wydarzenia', {
                templateUrl : 'wydarzenia',
                controller  : 'eventsController'
            })

            // route for the contact page
            .when('/menu', {
                templateUrl : 'pages/contact.html',
                controller  : 'contactController'
            });
	});



	scotchApp.controller('aboutController', function($scope) {
		$scope.message = 'Look! I am an about page.';
	});

