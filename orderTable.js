var app = angular.module("orderBy", []);

app.controller('controllerTableC', ['$scope', '$http', function($scope, $http) {
    $scope.conts;
    $http.get("/campeonatos").success(function(data){
        $scope.conts = data;
    });
    
    $(function () {
            $("#add-camp").click(function () {
                var _camp    = $("#add-nomeC").val();
                
                var _obj = {
                    "nome": _camp
                };
                
                $http.post("/campeonatos",_obj).success(function(data){});
                location.reload();
            });
        }); 
        
    $(function () {
            $("#rem-camp").click(function () {
                var _camp    = $("#rem-camp").val();
                
                var _obj = {
                    "nome": _camp
                };
                
                $http.delete("/campeonatos",_obj).success(function(data){});
            
            });
        }); 
    
    $scope.predicate = 'nome';
    $scope.reverse = true;
    $scope.order = function(predicate) {
      $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
      $scope.predicate = predicate;
    };
}]);

app.controller('controllerTableT', ['$scope', '$http', function($scope, $http) {
    $scope.conts;
    $http.get("/times").success(function(data){
        $scope.conts = data;
    });
    
    $(function () {
            $("#add-time").click(function () {
                var _time    = $("#add-nomeT").val();
                var _tecnico = $("#add-tecnico").val(); 
                var _local   = $("#add-local").val();
                var _camp    = $("#add-campeonatoT").val();
                
                var _obj = {
                    "time": _time,
                    "tecnico": _tecnico,
                    "localizacao": _local,
                    "campeonato": _camp
                };
                
                $http.post("/times",_obj).success(function(data){});
                location.reload();
            });
        }); 
        
    $(function () {
            $("#rem-time").click(function () {
                var _time    = $("#rem-time").val();
                
                var _obj = {
                    "time": _time
                };
                
                $http.delete("/times",_obj).success(function(data){});
            
            });
        });
    
    $scope.predicate = 'nome';
    $scope.reverse = true;
    $scope.order = function(predicate) {
      $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
      $scope.predicate = predicate;
    };
}]);


app.controller('controllerOptionT', ['$scope', '$http', function($scope, $http) {
    $scope.conts;
    $http.get("/campeonatos").success(function(data){
        $scope.conts = data;
    });
    
}]);

app.controller('controllerTableJ', ['$scope', '$http', function($scope, $http) {
    $scope.conts;
    $http.get("/jogadores").success(function(data){
        $scope.conts = data;
    });
    
    $(function () {
        $("#add-jogador").click(function () {
            var _nome    = $("#add-nomeJ").val();
            var _posicao = $("#add-posicao").val(); 
            var _idade   = $("#add-idade").val();
            var _nacio   = $("#add-nacio").val();
            var _numero  = $("#add-numero").val(); 
            var _time    = $("#add-timeJ").val();
                
            var _obj = {
                "nome": _nome,
                "posicao": _posicao,
                "idade": _idade,
                "nacionalidade": _nacio,
                "numero": _numero,
                "time": _time
            };
            
            console.log(_obj);
               
            $http.post("/jogadores",_obj).success(function(data){});
            location.reload();
        });
    }); 
        
    $(function () {
            $("#rem-jogador").click(function () {
                var _jogador    = $("#rem-jogador").val();
                
                var _jogador = {
                    "time": _jogador
                };
                
                $http.delete("/jogadores",_obj).success(function(data){});
            
            });
        });
    
    $scope.predicate = 'nome';
    $scope.reverse = true;
    $scope.order = function(predicate) {
      $scope.reverse = ($scope.predicate === predicate) ? !$scope.reverse : false;
      $scope.predicate = predicate;
    };
  }]);
  
app.controller('controllerOptionJ', ['$scope', '$http', function($scope, $http) {
    $scope.conts;
    $http.get("/times").success(function(data){
        $scope.conts = data;
    });
}]);

$( document ).ready(function(){
$(".tableC").addClass("hide");
$(".tableT").addClass("hide");
$(".tableJ").addClass("hide");
});

function listCampeonatos(){
  $(".tableC").addClass("show");
  $(".tableT").removeClass("show");
  $(".tableJ").removeClass("show");
}
function listTimes(){
  $(".tableC").removeClass("show");
  $(".tableT").addClass("show");
  $(".tableJ").removeClass("show");
}
function listJogadores(){
  $(".tableC").removeClass("show");
  $(".tableT").removeClass("show");
  $(".tableJ").addClass("show");
}
