angular.module('myApp', [ 'shagstrom.angular-sortable-table' ]).controller('LogController',
	[ '$scope', '$timeout', '$filter', '$http', function($scope, $timeout, $filter, $http) {

		$('[data-toggle="tooltip"]').tooltip();
		$scope.agents = []; $scope.periods = []; $scope.depths = [];
		$scope.orders = [];		
		$scope.heads = []; $scope.tails = []; $scope.headSpecials = []; $scope.tailSpecials = [];		
		$scope.tops = []; $scope.bottoms = []; $scope.topRuns = []; $scope.bottomRuns = [];
		
		for(var i = 1; i < 101; i++){
			$scope.orders.push(i.toString());
		}

		getHeadSent = function(){
			var data = {
				"type": "Head",
				"org_id": $('.org-id').attr("org_id")
			}

			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.heads.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}
		getTailSent = function(){
			var data = {
				"type": "Tail",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.tails.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}
		getHeadSpecialSent = function(){
			var data = {
				"type": "Head Special",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.headSpecials.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}
		getTailSpecialSent = function(){
			var data = {
				"type": "Tail Special",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.tailSpecials.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}

		getTopSent = function(){
			var data = {
				"type": "Top",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.tops.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}
		getBottomSent = function(){
			var data = {
				"type": "Bottom",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.bottoms.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}
		getTopRunSent = function(){
			var data = {
				"type": "Top Run",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.topRuns.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}
		getBottomRunSent = function(){
			var data = {
				"type": "Bottom Run",
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/log/getSentByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					$scope.bottomRuns.push({number: element.number, amount: parseInt(element.amount), new_sent: parseInt(element.new_sent), hold: parseInt(element.hold), type: element.type, period_id: element.period_id, org_id: element.org_id, depth: element.depth, time: element.time});
				})
			},function(err){
			    
			});
		}

		getAgents = function(){
			var data = {
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/settings/superAgentManagement/getSuperAgentsByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				$scope.agents = response.data;				
			},function(err){
			        
			});
		}

		getPeriods = function(){
			var data = {
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/settings/periodManagement/getAllPeriodByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				$scope.periods = response.data;
				getDepth();
			},function(err){
			        
			});
		}

		getDepth = function(){
			$scope.periods.forEach(function(element){
		    	var data = {
					"org_id": $('.org-id').attr("org_id"),
					"period_id": element.period_id
				}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getOrgDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depths.push({depth: response.data, period_id: element.period_id});
				},function(err){
				    
				});
		    });
		}

		getTotal = function(){
			getHeadSent();
			getTailSent();
			getHeadSpecialSent();
			getTailSpecialSent();
			getTopSent();
			getBottomSent();
			getTopRunSent();
			getBottomRunSent();
			getAgents();
			getPeriods();			
		}

		getTotal();

		$scope.getTotalNewSent = function(period_id, type, depth){
			switch (type) {
			    case "Head":
			        var temp = $scope.heads;
			        break;
			    case "Tail":
			        var temp = $scope.tails;
			        break;
			    case "Head Special":
			        var temp = $scope.headSpecials;
			        break;
			    case "Tail Special":
			        var temp = $scope.tailSpecials;
			        break;
			    case "Top":
			        var temp = $scope.tops;
			        break;
			    case "Bottom":
			        var temp = $scope.bottoms;
			        break;
			    case "Top Run":
			        var temp = $scope.topRuns;
			        break;
			    case "Bottom Run":
			        var temp = $scope.bottomRuns;  
			}
			var res = 0;
			temp.forEach(function(element){
				if ((element.period_id == period_id)&&(element.depth == depth)){
					res += element.new_sent;
				}
			})
			return res;
		}

		$scope.getTotalNewSentFormat = function(period_id, type, depth){
			var res = $scope.getTotalNewSent(period_id, type, depth);
			return $scope.formatAmount(res);
		}

		$scope.getAgentSent = function(sent, id, type){
			switch (type) {
			    case "Head":
			        var tempType = "headLimit";
			        break;
			    case "Tail":
			        var tempType = "tailLimit";
			        break;
			    case "Head Special":
			        var tempType = "headSpecialLimit";
			        break;
			    case "Tail Special":
			        var tempType = "tailSpecialLimit";
			        break;
			    case "Top":
			        var tempType = "topLimit";
			        break;
			    case "Bottom":
			        var tempType = "bottomLimit";
			        break;
			    case "Top Run":
			        var tempType = "topRunLimit";
			        break;
			    case "Bottom Run":
			        var tempType = "bottomRunLimit";   
			}

			var temp1 = 0; temp2 = 0; res = 0;
			for(i=0; i < id; i++){
				if($scope.agents[i][tempType] == null){
					$scope.agents[i][tempType] = 0;
				}
				temp1 += parseInt($scope.agents[i][tempType]);
			}
			if($scope.agents[id][tempType] == null){
				$scope.agents[id][tempType] = 0;
			}
			temp2 = temp1 + parseInt($scope.agents[id][tempType]);
			if(temp1 >= sent){
				res = 0;
			} else if(temp2 <= sent){
				res = $scope.agents[id][tempType];
			} else {
				res = sent - temp1;
			}
			return parseInt(res);
		}
		$scope.getAgentSentFormat = function(sent, id, type){
			var res = $scope.getAgentSent(sent, id, type);
			return $scope.formatAmount(res);
		}

		$scope.getTotalAgentSent = function(period_id, depth, id, type){
			var res = 0;
			switch (type) {
			    case "Head":
			        var temp = $scope.heads;
			        break;
			    case "Tail":
			        var temp = $scope.tails;
			        break;
			    case "Head Special":
			        var temp = $scope.headSpecials;
			        break;
			    case "Tail Special":
			        var temp = $scope.tailSpecials;
			        break;
			    case "Top":
			        var temp = $scope.tops;
			        break;
			    case "Bottom":
			        var temp = $scope.bottoms;
			        break;
			    case "Top Run":
			        var temp = $scope.topRuns;
			        break;
			    case "Bottom Run":
			        var temp = $scope.bottomRuns;  
			}
			temp.forEach(function(element){
				if ((element.period_id == period_id)&&(element.depth == depth)){
					res += $scope.getAgentSent(element.amount-element.hold, id, type);
				}
			})
			return res;
		}
		$scope.getTotalAgentSentFormat = function(period_id, depth, id, type){
			var res = $scope.getTotalAgentSent(period_id, depth, id, type);
			return $scope.formatAmount(res);
		}

		$scope.getAgentExceed = function(sent, type){
			var temp = 0;
			for(i=0; i < $scope.agents.length; i++){
				temp += $scope.getAgentSent(sent, i, type);
			}
			return sent - temp;
		}
		$scope.getAgentExceedFormat = function(sent, type){
			var res = $scope.getAgentExceed(sent, type);
			return $scope.formatAmount(res);
		}

		$scope.getTotalExceed = function(period_id, depth, type){
			var res = 0;
			switch (type) {
			    case "Head":
			        var temp = $scope.heads;
			        break;
			    case "Tail":
			        var temp = $scope.tails;
			        break;
			    case "Head Special":
			        var temp = $scope.headSpecials;
			        break;
			    case "Tail Special":
			        var temp = $scope.tailSpecials;
			        break;
			    case "Top":
			        var temp = $scope.tops;
			        break;
			    case "Bottom":
			        var temp = $scope.bottoms;
			        break;
			    case "Top Run":
			        var temp = $scope.topRuns;
			        break;
			    case "Bottom Run":
			        var temp = $scope.bottomRuns;  
			}
			temp.forEach(function(element){
				if ((element.period_id == period_id)&&(element.depth == depth)){
					res += $scope.getAgentExceed(element.amount-element.hold, type);
				}
			})
			return res;
		}

		$scope.getTotalExceedFormat = function(period_id, depth, type){
			var res = $scope.getTotalExceed(period_id, depth, type);
			return $scope.formatAmount(res);
		}

		$scope.getSendTime = function(period_id, depth, type){
			var res = "";
			switch (type) {
			    case "Head":
			        var temp = $scope.heads;
			        break;
			    case "Tail":
			        var temp = $scope.tails;
			        break;
			    case "Head Special":
			        var temp = $scope.headSpecials;
			        break;
			    case "Tail Special":
			        var temp = $scope.tailSpecials;
			        break;
			    case "Top":
			        var temp = $scope.tops;
			        break;
			    case "Bottom":
			        var temp = $scope.bottoms;
			        break;
			    case "Top Run":
			        var temp = $scope.topRuns;
			        break;
			    case "Bottom Run":
			        var temp = $scope.bottomRuns;  
			}

			temp.forEach(function(element){
				if ((element.period_id == period_id)&&(element.depth == depth)){
					res = element.time;
				}
			})
			return res;
		}

		$scope.getExistance = function(period_id, depth, type){
			var res = 0;
			switch (type) {
			    case "Head":
			        var temp = $scope.heads;
			        break;
			    case "Tail":
			        var temp = $scope.tails;
			        break;
			    case "Head Special":
			        var temp = $scope.headSpecials;
			        break;
			    case "Tail Special":
			        var temp = $scope.tailSpecials;
			        break;
			    case "Top":
			        var temp = $scope.tops;
			        break;
			    case "Bottom":
			        var temp = $scope.bottoms;
			        break;
			    case "Top Run":
			        var temp = $scope.topRuns;
			        break;
			    case "Bottom Run":
			        var temp = $scope.bottomRuns;  
			}

			temp.forEach(function(element){
				if ((element.period_id == period_id)&&(element.depth == depth)){
					res += 1;
				}
			})
			return res;
		}

		$scope.positive = function(temp1, temp2){
			if(parseInt(temp1) > parseInt(temp2)){
				return false;
			}else{
				return true;
			}
		}

		$scope.formatAmount = function(temp){
			var result = "";
			if((temp =="") || (temp == undefined)){
				result = "0";
			} else {
				temp = parseInt(temp).toString();
				var dots = 0;				
				if(temp.length % 3 == 0){
					dots = parseInt(temp.length / 3) - 1;
				} else {				
					dots = parseInt(temp.length / 3);
				}
				for(var i = dots; i >= 1; i--){
					result += "," + temp.slice(temp.length - i *3, temp.length - (i - 1) *3);
				}
				result = temp.slice(0, temp.length - dots * 3) + result;
			}			
			return result;
		}
}]);

angular.element(function() {
	angular.bootstrap(document,[ 'myApp' ]);
});
