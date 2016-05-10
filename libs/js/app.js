var app = angular.module('appGlosario', []);

app.controller('controllerSearch', function($scope, $http){
   
	$scope.getAllTerminos = function(){
		
		$http.get("methods/read_terminos.php").success(function(response){
			console.log(response.records);
			$scope.terminos = response.records;
		});
	}


});

app.controller('controllerSearchTwo', function($scope, $http){
   
	$scope.getAllTerminos = function(){
		
		$http.get("../../methods/read_terminos.php").success(function(response){
			console.log(response.records);
			$scope.terminos = response.records;
		});
	}

	$scope.eliminarTermino = function(id){
		console.log(id);

		var r = confirm("Eliminar Termino ?");

		if(r==true){
			$http.post('../../methods/delete_termino.php', {
	            'id' : id
	        }).success(function (data, status, headers, config){
	        	$("#msj").empty();
	            $("#msj").append(data);
		        $scope.getAllTerminos();
		        
	        });
		}

		

	
	
	}


})








