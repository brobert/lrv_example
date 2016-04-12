// create the controller and inject Angular's $scope
scotchApp.controller('mainController', function($scope, $http) {
    // create a message to display in our view
    $scope.page = {
        title : 'Główna',
        breadCrumbs : [ {
            href : false,
            text : 'Główna'
        } ]
    };
    
    $scope.message = 'Everyone come and see how good I look!';
    $scope.items = [];
    $scope.sort = 'asc';
    loadData();

    $scope.toggleSort = function() {
        $scope.sort = $scope.sort === 'asc' ? 'desc' : 'asc';
        loadData();
    }

    function loadData() {
        $http.get('/events/index', {
            params : {
                sort : $scope.sort
            }
        }).then(function(response) {
            $scope.items = response.data.data;
        });
    }
});