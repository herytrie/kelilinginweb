var sampleApp = angular.module('sampleApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

var BaseURL = "http://localhost/kelilingin/";

// sampleApp.config(['$routeProvider',function($routeProvider) {
//     console.log(document.location.href);
//     $routeProvider
//     .when("/home2", {
//         templateUrl : "assets/partial/home.html",
//         controller : "mainCtrl"
//     })
//     .otherwise({
//         redirectTo: '/home2'
//       });
// }]);

sampleApp.factory('Inbox', function($http) {
        return {
            get : function(id) {
                return $http.get('http://localhost/kelilingin/inbox/'+id);
            }
        }

    });

sampleApp.controller('diskusiCtrl', function($scope,$http){
    $scope.diskusiReply;
    console.log(BaseURL);
    $scope.submitDiskusi = function(id){
        console.log(id);
        $http({
            method:'POST',
            url: BaseURL+'diskusi/'+id,
            data:'id='+id+'&diskusi='+$scope.diskusiReply,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}  
        }).success(function (data, status, headers, config) {
            $scope.loading = true;
            $scope.diskusiReply = data; 
            //$scope.diskusiReply ='';
            console.log(data);
            $scope.info = data.message + " ";
        }).error(function (data, status, headers, config) {
            console.log("Failure"+status);
            console.log(data);
            // handle error things
            $scope.info = data.message + " " + "gagal";
        });
    };
});

sampleApp.controller('commentCtrl', function($scope,$http){
    // $scope.getId = function(e){
    //     _BaseURL = "http://localhost/kelilingin/comment/";
    //     _tmp = e.replace("",_BaseURL);
    //     return _tmp;
    // };

    $scope.commentUser = {};

    $scope.init =function(id){
        $scope.loading = true;
        $http({
            method:'GET',
            url: BaseURL+'commentpost/'+id
        }).success(function(data,status,headers,config){
            $scope.commentUser = data;
            //$scope.idInbox = data.value[0].inbox_id;           
            $scope.loading = false;
            console.log(data);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);
            $scope.info = data.message + " " + "gagal";
            console.log($scope.info);              
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };

    $scope.submitComment = function(id){
        $http({
            method:'POST',
            //url:'http://localhost/kelilingin/comment/'+$scope.getId(document.location.href),
            url: BaseURL+'comment/'+id,
            data:'id='+id+'&komen='+$scope.comentReply.coment,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}  
        }).success(function (data, status, headers, config) {
            $scope.loading = true; 
            $scope.comentReply.coment ='';
            console.log(data);
            $scope.commentUser = data;
            $scope.init(id);
            $scope.info = data.message + " ";
        }).error(function (data, status, headers, config) {
            console.log("Failure"+status);
            console.log(data);
            // handle error things
            $scope.info = data.message + " " + "gagal";
        });
    };
});

sampleApp.controller('likeCtrl', function($scope,$http){
    $scope.countLike = {};
    $scope.display = "display: inline;";
    $scope.display2 = "display: none;";
    $scope.display3 = "display: inline;";
    $scope.display4 = "display: none;";

    $scope.init =function(id){
        $http({
            method:'GET',
            url: BaseURL+'countlike/'+id
        }).success(function(data,status,headers,config){
            $scope.countLike = data;         
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);
            $scope.info = data.message + " " + "gagal";
            console.log($scope.info);            
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };

    $scope.like =function(id){
        $http({
            method:'GET',
            url: BaseURL+'like/'+id
        }).success(function(data,status,headers,config){
            $scope.countLike = data;         
            $scope.display = "display: none;";
            $scope.display2 = "display: inline;";
            $scope.display3 = "display: inline;";
            $scope.display4 = "display: none;";
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);
            $scope.info = data.message + " " + "gagal";
            console.log($scope.info); 
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
        console.log($scope.countLike);
    };

    $scope.unlike =function(id){
        $http({
            method:'GET',
            url: BaseURL+'unlike/'+id
        }).success(function(data,status,headers,config){
            $scope.countLike = data;         
            $scope.display = "display: inline;";
            $scope.display2 = "display: none;";
            $scope.display4 = "display: inline;";
            $scope.display3 = "display: none;";
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);
            $scope.info = data.message + " " + "gagal";
            console.log($scope.info);              
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
        console.log($scope.countLike);
    };
});


sampleApp.controller('agentFollowCtrl', function($scope,$http){
    $scope.agentUnfollow = {};
    $scope.agentFollow = {};
    $scope.display = "display: inline;";
    $scope.display2 = "display: none;";
    $scope.display3 = "display: inline;";
    $scope.display4 = "display: none;";

    $scope.followerAgent = {};
    $scope.init =function(id){
        $scope.loading = true;
        $http({
            method:'GET',
            url: BaseURL+'follower-agent/'+id
        }).success(function(data,status,headers,config){
            $scope.followerAgent = data;          
            $scope.loading = false;
            console.log(data);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);
            $scope.info = data.message + " " + "gagal";
            console.log($scope.info);              
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };

    $scope.unfollowAgent = function(id){
        $scope.loading = true;
        $http({
            method:'GET',
            url: BaseURL+'unfollow-agent/'+id
        }).success(function(data,status,headers,config){
            $scope.agentUnfollow = data;
            //$scope.idInbox = data.value[0].inbox_id;           
            $scope.display = "display: none;";
            $scope.display2 = "display: inline;";
            $scope.display4 = "display: none;";
            $scope.display3 = "display: inline;";
            $scope.loading = false;
            console.log($scope.agentUnfollow);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };

    $scope.followAgent = function(id){
        $scope.loading = true;    
        $http({
            method:'GET',
            url: BaseURL+'follow-agent/'+id
        }).success(function(data,status,headers,config){
            $scope.agentFollow = data;
            //$scope.idInbox = data.value[0].inbox_id;           
            $scope.display = "display: inline;";
            $scope.display2 = "display: none;";
            $scope.display3 = "display: none;";
            $scope.display4 = "display: inline;";
            $scope.loading = false;
            console.log($scope.agentFollow);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };
});



sampleApp.controller('followCtrl', function($scope,$http,Inbox){
    $scope.userUnfollow = {};
    $scope.userFollow = {};
    $scope.display = "display: inline;";
    $scope.display2 = "display: none;";
    $scope.display3 = "display: inline;";
    $scope.display4 = "display: none;";

    $scope.unfollowUser = function(id){
        $scope.loading = true;
        $http({
            method:'GET',
            url: BaseURL+'unfollow/'+id
        }).success(function(data,status,headers,config){
            $scope.userUnfollow = data;
            //$scope.idInbox = data.value[0].inbox_id;           
            $scope.display = "display: none;";
            $scope.display2 = "display: inline;";
            $scope.display4 = "display: none;";
            $scope.display3 = "display: inline;";
            $scope.loading = false;
            console.log($scope.userUnfollow);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };

    $scope.followUser = function(id){
        $scope.loading = true;    
        $http({
            method:'GET',
            url: BaseURL+'follow/'+id
        }).success(function(data,status,headers,config){
            $scope.userFollow = data;
            //$scope.idInbox = data.value[0].inbox_id;           
            $scope.display = "display: inline;";
            $scope.display2 = "display: none;";
            $scope.display3 = "display: none;";
            $scope.display4 = "display: inline;";
            $scope.loading = false;
            console.log($scope.userFollow);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };
});

(function(){
    sampleApp.controller('inboxCtrl', function($scope,$http,Inbox){
        $scope.info;
       // $scope.inboxuser = [];
        $scope.idInbox;

        $scope.loading = true;

        $scope.init =function(id){
            $scope.loading = true;
            $http({
                method:'GET',
                url: BaseURL+'inbox/'+id
            }).success(function(data,status,headers,config){
                $scope.inboxuser = data;
                $scope.idInbox = data['0'].inbox_id;           
                $scope.loading = false;
                console.log(data);
            }).error(function(data,status,headers,config){
                console.log("Failure"+status);
                $scope.info = data.message + " " + "gagal";
                console.log($scope.info);              
            }).error(function(data,status,headers,config){
                console.log("Failure"+status);         
            });
        };


        $scope.loadDetailInbox = function(id){
            $scope.loading = true;
            $http({
                method:'GET',
                url: BaseURL+'inbox/'+id
            }).success(function(data,status,headers,config){
                $scope.inboxuser = data;
                $scope.idInbox = data['0'].inbox_id;           
                $scope.loading = false;
                console.log(data);
                console.log($scope.idInbox);
                // console.log($scope.inboxuser);
            // $scope.safeApply(function(){
            //     console.log("apply");
            // })

            }).error(function(data,status,headers,config){
                console.log("Failure"+status);         
            });
        };

        // $scope.safeApply = function(fn){
        //     var phase = this.$root.$$phase;
        //     if(phase=='$apply' || phase == '$digest'){
        //         if(fn && (typeof(fn) === 'function')){
        //             fn();
        //         }
        //     }else{
        //         this.$apply(fn);
        //     }
        // }
        
        // setInterval(function(id) {
        //     $http.get(BaseURL+'inbox/'+id).success(function(data) {
        //     $scope.inboxuser = data;
        // });
        // }, 5000);


        $scope.submitReplyInbox = function(){
            $scope.loading = true;       
            $http({
                method:'POST',
                url: BaseURL+'inbox/'+$scope.idInbox,
                data:'id='+$scope.idInbox+'&pesan='+$scope.inboxReply.pesan,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  
            }).success(function (data, status, headers, config) {
                $scope.loading = true; 
                $scope.inboxReply.pesan ='';
                console.log(data);
                $scope.info = data.message + " ";
                // //window.location.reload();
                $scope.inboxuser.push(data);
            }).error(function (data, status, headers, config) {
                console.log("Failure"+status);
                // handle error things
                $scope.info = data.message + " " + "gagal";
            });
        };
    });
})();


sampleApp.controller('orderCtrl',function($scope,$http){
    $scope.orderUser = {};
    $scope.createOrder = function(id){
        $scope.loading = true;    
        $http({
            method:'GET',
            url: BaseURL+'order/'+id
        }).success(function(data,status,headers,config){
            $scope.orderUser = data;
            $scope.loading = false;
            console.log($scope.orderUser);
        }).error(function(data,status,headers,config){
            console.log("Failure"+status);         
        });
    };
});

sampleApp.controller('mainCtrl',function($scope,$http){
    $scope.user = {};
    $scope.result = {};
	$scope.inboxReply = {};
	$scope.info;
    $scope.
	$scope.loading = false;
	$scope.loadUser = function(){
		$scope.loading = true;
		$http({
			method:'GET',
			url: BaseURL+'api/user/all'
		}).success(function(data,status,headers,config){
			$scope.result = data;
			$scope.loading = false;
		}).error(function(data,status,headers,config){

		});
	};





    $scope.register = function(user){
        if(user.password == user.repassword){
            $http({
                method:'POST',
                url:'http://localhost/kelilingin/api/user/register',
                data:'email='+user.email+'&name='+user.name+'&password='+user.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  
            }).success(function (data, status, headers, config) {
            // handle success things
                $scope.info = data.message + " ";
            }).error(function (data, status, headers, config) {
                // handle error things
                $scope.info = data.message + " " + "gagal";
            });
        }else{
            $scope.info = "Password tidak cocok dengan sebelumnya";
        }
    };

});

