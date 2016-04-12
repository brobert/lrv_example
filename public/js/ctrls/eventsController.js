/**
 * 
 */

scotchApp.controller('eventsController', function($scope, $http ) {
	$scope.message = 'Contact us! JK. This is just a demo.';
	$scope.page = {
		title: 'Wydarzenia',
		breadCrumbs: [
            {href: '/#', text: 'Główna'},
            {href: false, text: 'Wydarzenia'}
        ]
	};
	
    $scope.items = [];
    $scope.sort = 'asc';
    $scope.sortBy = 'id';
    loadData();

    $scope.toggleSort = function( column ) {
        $scope.sort = $scope.sort === 'asc' ? 'desc' : 'asc';
        $scope.sortBy = column;
        loadData();
    }

    function loadData() {
        $http.get('/events/list', {
            params : {
                sort : $scope.sort,
                sort_by: $scope.sortBy,
            }
        }).then(function(response) {
            $scope.items = response.data.data;
        });
    }
});