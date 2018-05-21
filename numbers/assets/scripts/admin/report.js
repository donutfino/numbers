angular.module('myApp', [ 'shagstrom.angular-sortable-table' ]).controller('ReportController',
	[ '$scope', '$timeout', '$filter', '$http', function($scope, $timeout, $filter, $http) {

		$scope.allHeads = []; $scope.allTails = []; $scope.allHeadSpecials = []; $scope.allTailSpecials = []; $scope.allTops = []; $scope.allBottoms = []; $scope.allTopRuns = []; $scope.allBottomRuns = [];
		var headSents = []; tailSents = []; headSpecialSents = []; tailSpecialSents = []; topSents = []; bottomSents = []; topRunSents = []; bottomRunSents = [];
		$scope.heads = []; $scope.tails = []; $scope.headSpecials = []; $scope.tailSpecials = []; $scope.tops = []; $scope.bottoms = []; $scope.topRuns = []; $scope.bottomRuns = [];
		$scope.headFlag = true; $scope.tailFlag = true; $scope.headSpecialFlag = true; $scope.tailSpecialFlag = true; $scope.topFlag = true; $scope.bottomFlag = true; $scope.topRunFlag = true; $scope.bottomRunFlag = true;
		var commission = 30;

		getHeadSent = function(){
			var data = {
				"number_type": "Head",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allHeads.findIndex( record => record.number === element.number );
					$scope.allHeads[index].sent = parseInt(element.sent);
					$scope.allHeads[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getTailSent = function(){
			var data = {
				"number_type": "Tail",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTails.findIndex( record => record.number === element.number );
					$scope.allTails[index].sent = parseInt(element.sent);
					$scope.allTails[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getHeadSpecialSent = function(){
			var data = {
				"number_type": "Head Special",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allHeadSpecials.findIndex( record => record.number === element.number );
					$scope.allHeadSpecials[index].sent = parseInt(element.sent);
					$scope.allHeadSpecials[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getTailSpecialSent = function(){
			var data = {
				"number_type": "Tail Special",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTailSpecials.findIndex( record => record.number === element.number );
					$scope.allTailSpecials[index].sent = parseInt(element.sent);
					$scope.allTailSpecials[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getTopSent = function(){
			var data = {
				"number_type": "Top",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTops.findIndex( record => record.number === element.number );
					$scope.allTops[index].sent = parseInt(element.sent);
					$scope.allTops[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getBottomSent = function(){
			var data = {
				"number_type": "Bottom",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allBottoms.findIndex( record => record.number === element.number );
					$scope.allBottoms[index].sent = parseInt(element.sent);
					$scope.allBottoms[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getTopRunSent = function(){
			var data = {
				"number_type": "Top Run",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTopRuns.findIndex( record => record.number === element.number );
					$scope.allTopRuns[index].sent = parseInt(element.sent);
					$scope.allTopRuns[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		getBottomRunSent = function(){
			var data = {
				"number_type": "BottomRun",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allBottomRuns.findIndex( record => record.number === element.number );
					$scope.allBottomRuns[index].sent = parseInt(element.sent);
					$scope.allBottomRuns[index].id = parseInt(element.id);
				})

			},function(err){
			    
			});
		}
		formatData = function(){
			for(var i=0; i<1000; i++){
				if(i.toString().length == 1){
					var num = "00" + i.toString();				
				} else if(i.toString().length == 2){
					var num = "0" + i.toString();
				} else {
					var num = i.toString();
				}
				$scope.allHeads.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
				$scope.allTails.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
				$scope.allHeadSpecials.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
				$scope.allTailSpecials.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
			}
			for(var i=0; i<100; i++){
				if(i.toString().length == 1){
					var num = "0" + i.toString();				
				} else {
					var num = i.toString();
				}
				$scope.allTops.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
				$scope.allBottoms.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
			}
			for(var i=0; i<10; i++){
				
				var num = i.toString();
				
				$scope.allTopRuns.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});
				$scope.allBottomRuns.push({number: num, amount: 0, sent: 0, hold: 0, new: false, id: 0});			
			}

			getHeadSent();
			getTailSent();
			getHeadSpecialSent();
			getTailSpecialSent();
			getTopSent();
			getBottomSent();
			getTopRunSent();
			getBottomRunSent();
		}
		
		formatData();

		getHeadSent = function(){
			var data = {
				"number_type": "Head",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					var index = -1;
					$scope.records.some(function(obj, i) {
						return obj.Country === "Austria" ? index = i : false;
					});
				})
			},function(err){
			    
			});
		}

		$scope.getLimitAndHold = function(){
			var data = {
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/report/getLimitAndHoldByOrg',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				var temp = response.data;
				if(temp.length == 8){
					temp.forEach(function(element){
						switch (element.type) {
						    case "Head":
						        $scope.headLimit = element.default_limit;
						        $scope.headRate = element.rate;
						        break;
						    case "Tail":
						        $scope.tailLimit = element.default_limit;
						        $scope.tailRate = element.rate;
						        break;
						    case "Head Special":
						        $scope.headSpecialLimit = element.default_limit;
						        $scope.headSpecialRate = element.rate;
						        break;
						    case "Tail Special":
						        $scope.tailSpecialLimit = element.default_limit;
						        $scope.tailSpecialRate = element.rate;
						        break;
						    case "Top":
						        $scope.topLimit = element.default_limit;
						        $scope.topRate = element.rate;
						        break;
						    case "Bottom":
						        $scope.bottomLimit = element.default_limit;
						        $scope.bottomRate = element.rate;
						        break;
						    case "Top Run":
						        $scope.topRunLimit = element.default_limit;
						        $scope.topRunRate = element.rate;
						        break;
						    case "Bottom Run":
						        $scope.bottomRunLimit = element.default_limit;
						        $scope.bottomRunRate = element.rate;
						}
					})
				} else {
					$http({
					    method:'post',
					    url:'/admin/report/getLimitAndHoldByDefault',
					    dataType:"json",
					    data: data,
					    async: false,
					}).then(function(response){
						var temp = response.data;
						temp.forEach(function(element){
							switch (element.type) {
							    case "Head":
							        $scope.headLimit = element.default_limit;
							        $scope.headRate = element.rate;
							        break;
							    case "Tail":
							        $scope.tailLimit = element.default_limit;
							        $scope.tailRate = element.rate;
							        break;
							    case "Head Special":
							        $scope.headSpecialLimit = element.default_limit;
							        $scope.headSpecialRate = element.rate;
							        break;
							    case "Tail Special":
							        $scope.tailSpecialLimit = element.default_limit;
							        $scope.tailSpecialRate = element.rate;
							        break;
							    case "Top":
							        $scope.topLimit = element.default_limit;
							        $scope.topRate = element.rate;
							        break;
							    case "Bottom":
							        $scope.bottomLimit = element.default_limit;
							        $scope.bottomRate = element.rate;
							        break;
							    case "Top Run":
							        $scope.topRunLimit = element.default_limit;
							        $scope.topRunRate = element.rate;
							        break;
							    case "Bottom Run":
							        $scope.bottomRunLimit = element.default_limit;
							        $scope.bottomRunRate = element.rate;
							}							
						})

						$scope.getHeadData();
						
					},function(err){
					        
					});
				}
			},function(err){
			        
			});
		}

		$scope.getLimitAndHold();

		shuffle = function(str){
			var a = str.slice(0, 1);
			var b = str.slice(1, 2);
			var c = str.slice(2, 3);
			var temp = [a+b+c, a+c+b, b+a+c, b+c+a, c+a+b, c+b+a];
			var i = temp.length;
			while(i--){
				for( var j = 0 ; j < i; j++){
					if(temp[i] == temp[j]){
						temp.splice(i, 1);
					}
				}
			}
			var res = temp;
			return res;
		}

		$scope.getHeadData = function(){
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/report/getHeadData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		
		        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
		        			if($scope.allHeads[i].number == element.number){
		        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        				break;
		        			}
		        		}

		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		
		        		
		        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
		        			if($scope.allHeads[i].number == element.number){
		        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        				break;
		        			}
		        		}

		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
				        			if($scope.allHeads[i].number == shuffle_number){
				        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeadSpecials.length; i++) {
				        			if($scope.allHeadSpecials[i].number == shuffle_number){
				        				$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
				        			if($scope.allHeads[i].number == shuffle_number){
				        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeadSpecials.length; i++) {
				        			if($scope.allHeadSpecials[i].number == shuffle_number){
				        				$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	}
		        });
		        $scope.getTailData();
			},function(err){
			        
			});
		}
		$scope.getTailData = function(){
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/report/getTailData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		
		        		for (var i = 0 ; i < $scope.allTails.length; i++) {
		        			if($scope.allTails[i].number == element.number){
		        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        				break;
		        			}
		        		}
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		
		        		
		        		for (var i = 0 ; i < $scope.allTails.length; i++) {
		        			if($scope.allTails[i].number == element.number){
		        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        				break;
		        			}
		        		}

		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTails.length; i++) {
				        			if($scope.allTails[i].number == shuffle_number){
				        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTailSpecials.length; i++) {
				        			if($scope.allTailSpecials[i].number == shuffle_number){
				        				$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTails.length; i++) {
				        			if($scope.allTails[i].number == shuffle_number){
				        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTailSpecials.length; i++) {
				        			if($scope.allTailSpecials[i].number == shuffle_number){
				        				$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	}
		        });
		        $scope.getHeadTailData();
			},function(err){
			        
			});
		}
		$scope.getHeadTailData = function(){
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/report/getHeadTailData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        var head_tmp = []; tail_tmp = [];
		        tmp.forEach(function(element){
		        	head_tmp.push({number:element.number, amount1: element.amount1/2, operator: element.operator, amount2: element.amount2/2});
		        	tail_tmp.push({number:element.number, amount1: element.amount1/2, operator: element.operator, amount2: element.amount2/2});
		        })

		        var tmp = head_tmp;
		        tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		
		        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
		        			if($scope.allHeads[i].number == element.number){
		        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        				break;
		        			}
		        		}
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		
		        		
		        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
		        			if($scope.allHeads[i].number == element.number){
		        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        				break;
		        			}
		        		}

		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
				        			if($scope.allHeads[i].number == shuffle_number){
				        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeadSpecials.length; i++) {
				        			if($scope.allHeadSpecials[i].number == shuffle_number){
				        				$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeads.length; i++) {
				        			if($scope.allHeads[i].number == shuffle_number){
				        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allHeadSpecials.length; i++) {
				        			if($scope.allHeadSpecials[i].number == shuffle_number){
				        				$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	}
		        });
				
				var tmp = tail_tmp;
				tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		
		        		for (var i = 0 ; i < $scope.allTails.length; i++) {
		        			if($scope.allTails[i].number == element.number){
		        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        				break;
		        			}
		        		}
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		
		        		
		        		for (var i = 0 ; i < $scope.allTails.length; i++) {
		        			if($scope.allTails[i].number == element.number){
		        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        				break;
		        			}
		        		}

		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTails.length; i++) {
				        			if($scope.allTails[i].number == shuffle_number){
				        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTailSpecials.length; i++) {
				        			if($scope.allTailSpecials[i].number == shuffle_number){
				        				$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		if(element.operator == "."){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTails.length; i++) {
				        			if($scope.allTails[i].number == shuffle_number){
				        				$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers = shuffle(element.number);
		        			var split_num = shuffle_numbers.length;
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				
				        		for (var i = 0 ; i < $scope.allTailSpecials.length; i++) {
				        			if($scope.allTailSpecials[i].number == shuffle_number){
				        				$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        				$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
				        				break;
				        			}
				        		}
		        			})
		        		}
		        	}
		        });
				
				$scope.heads = $scope.allHeads;
				$scope.tails = $scope.allTails;
				$scope.headSpecials = $scope.allHeadSpecials;
				$scope.tailSpecials = $scope.allTailSpecials;
				$scope.headAmountTotal = 0; $scope.headSentTotal = 0; $scope.headHoldTotal = 0;
				$scope.tailAmountTotal = 0; $scope.tailSentTotal = 0; $scope.tailHoldTotal = 0;
				$scope.headSpecialAmountTotal = 0; $scope.headSpecialSentTotal = 0; $scope.headSpecialHoldTotal = 0;
				$scope.tailSpecialAmountTotal = 0; $scope.tailSpecialSentTotal = 0; $scope.tailSpecialHoldTotal = 0;
				for( var i = 0; i < $scope.heads.length; i++){
					$scope.headAmountTotal += $scope.heads[i].amount;
					$scope.headSentTotal += $scope.heads[i].sent;
					$scope.headHoldTotal += $scope.heads[i].hold;
				}
				for( var i = 0; i < $scope.tails.length; i++){
					$scope.tailAmountTotal += $scope.tails[i].amount;
					$scope.tailSentTotal += $scope.tails[i].sent;
					$scope.tailHoldTotal += $scope.tails[i].hold;
				}
				for( var i = 0; i < $scope.headSpecials.length; i++){
					$scope.headSpecialAmountTotal += $scope.headSpecials[i].amount;
					$scope.headSpecialSentTotal += $scope.headSpecials[i].sent;
					$scope.headSpecialHoldTotal += $scope.headSpecials[i].hold;
				}
				for( var i = 0; i < $scope.tailSpecials.length; i++){
					$scope.tailSpecialAmountTotal += $scope.tailSpecials[i].amount;
					$scope.tailSpecialSentTotal += $scope.tailSpecials[i].sent;
					$scope.tailSpecialHoldTotal += $scope.tailSpecials[i].hold;
				}

				$scope.headNet = parseInt($scope.headAmountTotal * (1 - commission/100));
				$scope.tailNet = parseInt($scope.tailAmountTotal * (1 - commission/100));
				$scope.headSpecialNet = parseInt($scope.headSpecialAmountTotal * (1 - commission/100));
				$scope.tailSpecialNet = parseInt($scope.tailSpecialAmountTotal * (1 - commission/100));

				if($scope.headLimit == 0){
					$scope.headLimit = parseInt($scope.headNet/$scope.headRate);
				}
				if($scope.tailLimit == 0){
					$scope.tailLimit = parseInt($scope.tailNet/$scope.tailRate);
				}
				if($scope.headSpecialLimit == 0){
					$scope.headSpecialLimit = parseInt($scope.headSpecialNet/$scope.headSpecialRate);
				}
				if($scope.tailSpecialLimit == 0){
					$scope.tailSpecialLimit = parseInt($scope.tailSpecialNet/$scope.tailSpecialRate);
				}
				$scope.getTopData();				
			},function(err){
			        
			});
		}
		$scope.getTopData = function(){
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}			
            $http({
			    method:'post',
			    url:'/admin/report/getTopData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		
		        		for (var i = 0 ; i < $scope.allTops.length; i++) {
		        			if($scope.allTops[i].number == element.number){
		        				$scope.allTops[i].amount = $scope.allTops[i].amount + parseInt(element.amount1);
		        				$scope.allTops[i].hold = $scope.allTops[i].amount - $scope.allTops[i].sent;
		        				break;
		        			}
		        		}
		        	} else if(element.number.length == 1){
		        		
		        		for (var i = 0 ; i < $scope.allTopRuns.length; i++) {
		        			if($scope.allTopRuns[i].number == element.number){
		        				$scope.allTopRuns[i].amount = $scope.allTopRuns[i].amount + parseInt(element.amount1);
		        				$scope.allTopRuns[i].hold = $scope.allTopRuns[i].amount - $scope.allTopRuns[i].sent;
		        				break;
		        			}
		        		}
		        	}
		        })
		        $scope.getBottomData();
			},function(err){
			        
			});
		}
		$scope.getBottomData = function(){
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/report/getBottomData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		
		        		for (var i = 0 ; i < $scope.allBottoms.length; i++) {
		        			if($scope.allBottoms[i].number == element.number){
		        				$scope.allBottoms[i].amount = $scope.allBottoms[i].amount + parseInt(element.amount1);
		        				$scope.allBottoms[i].hold = $scope.allBottoms[i].amount - $scope.allBottoms[i].sent;
		        				break;
		        			}
		        		}
		        	} else if(element.number.length == 1){
		        		
		        		for (var i = 0 ; i < $scope.allBottomRuns.length; i++) {
		        			if($scope.allBottomRuns[i].number == element.number){
		        				$scope.allBottomRuns[i].amount = $scope.allBottomRuns[i].amount + parseInt(element.amount1);
		        				$scope.allBottomRuns[i].hold = $scope.allBottomRuns[i].amount - $scope.allBottomRuns[i].sent;
		        				break;
		        			}
		        		}
		        	}
		        })		        
		        $scope.getTopBottomData();
			},function(err){
			        
			});
		}
		$scope.getTopBottomData = function(){
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/report/getTopBottomData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				
		        var tmp = response.data;
		        var top_temp = []; bottom_temp = [];
		        tmp.forEach(function(element){
		        	top_temp.push({number:element.number, amount1: element.amount1/2, operator: element.operator, amount2: element.amount2/2});
		        	bottom_temp.push({number:element.number, amount1: element.amount1/2, operator: element.operator, amount2: element.amount2/2});
		        })

		        var tmp = top_temp;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		
		        		for (var i = 0 ; i < $scope.allTops.length; i++) {
		        			if($scope.allTops[i].number == element.number){
		        				$scope.allTops[i].amount = $scope.allTops[i].amount + parseInt(element.amount1);
		        				$scope.allTops[i].hold = $scope.allTops[i].amount - $scope.allTops[i].sent;
		        				break;
		        			}
		        		}
		        	} else if(element.number.length == 1){
		        		
		        		for (var i = 0 ; i < $scope.allTopRuns.length; i++) {
		        			if($scope.allTopRuns[i].number == element.number){
		        				$scope.allTopRuns[i].amount = $scope.allTopRuns[i].amount + parseInt(element.amount1);
		        				$scope.allTopRuns[i].hold = $scope.allTopRuns[i].amount - $scope.allTopRuns[i].sent;
		        				break;
		        			}
		        		}
		        	}
		        })

		        var tmp = bottom_temp;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		
		        		for (var i = 0 ; i < $scope.allBottoms.length; i++) {
		        			if($scope.allBottoms[i].number == element.number){
		        				$scope.allBottoms[i].amount = $scope.allBottoms[i].amount + parseInt(element.amount1);
		        				$scope.allBottoms[i].hold = $scope.allBottoms[i].amount - $scope.allBottoms[i].sent;
		        				break;
		        			}
		        		}
		        	} else if(element.number.length == 1){
		        		
		        		for (var i = 0 ; i < $scope.allBottomRuns.length; i++) {
		        			if($scope.allBottomRuns[i].number == element.number){
		        				$scope.allBottomRuns[i].amount = $scope.allBottomRuns[i].amount + parseInt(element.amount1);
		        				$scope.allBottomRuns[i].hold = $scope.allBottomRuns[i].amount - $scope.allBottomRuns[i].sent;
		        				break;
		        			}
		        		}
		        	}
		        })

		        $scope.tops = $scope.allTops;
				$scope.bottoms = $scope.allBottoms;
				$scope.topRuns = $scope.allTopRuns;
				$scope.bottomRuns = $scope.allBottomRuns;

				$scope.topAmountTotal = 0; $scope.topSentTotal = 0; $scope.topHoldTotal = 0;
				$scope.bottomAmountTotal = 0; $scope.bottomSentTotal = 0; $scope.bottomHoldTotal = 0;
				$scope.topRunAmountTotal = 0; $scope.topRunSentTotal = 0; $scope.topRunHoldTotal = 0;
				$scope.bottomRunAmountTotal = 0; $scope.bottomRunSentTotal = 0; $scope.bottomRunHoldTotal = 0;
				for( var i = 0; i < $scope.tops.length; i++){
					$scope.topAmountTotal += $scope.tops[i].amount;
					$scope.topSentTotal += $scope.tops[i].sent;
					$scope.topHoldTotal += $scope.tops[i].hold;
				}
				for( var i = 0; i < $scope.bottoms.length; i++){
					$scope.bottomAmountTotal += $scope.bottoms[i].amount;
					$scope.bottomSentTotal += $scope.bottoms[i].sent;
					$scope.bottomHoldTotal += $scope.bottoms[i].hold;
				}
				for( var i = 0; i < $scope.topRuns.length; i++){
					$scope.topRunAmountTotal += $scope.topRuns[i].amount;
					$scope.topRunSentTotal += $scope.topRuns[i].sent;
					$scope.topRunHoldTotal += $scope.topRuns[i].hold;
				}
				for( var i = 0; i < $scope.bottomRuns.length; i++){
					$scope.bottomRunAmountTotal += $scope.bottomRuns[i].amount;
					$scope.bottomRunSentTotal += $scope.bottomRuns[i].sent;
					$scope.bottomRunHoldTotal += $scope.bottomRuns[i].hold;
				}

				$scope.topNet = parseInt($scope.topAmountTotal * (1 - commission/100));
				$scope.bottomNet = parseInt($scope.bottomAmountTotal * (1 - commission/100));
				$scope.topRunNet = parseInt($scope.topRunAmountTotal * (1 - commission/100));
				$scope.bottomRunNet = parseInt($scope.bottomRunAmountTotal * (1 - commission/100));

			},function(err){
			        
			});
		}

		$scope.onHeadSend = function(){
			$scope.headFlag = false;
		}

		$scope.onHeadConfirm = function(){
			var divToPrint=document.getElementById("head-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.heads.forEach(function(element){
		    	if(element.hold > $scope.headLimit){
		    		element.sent = element.amount - $scope.headLimit;
		    		element.hold = $scope.headLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Head",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Head",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.headFlag = true;
		}

		$scope.onTailSend = function(){
			$scope.tailFlag = false;
		}

		$scope.onTailConfirm = function(){
			
			var divToPrint=document.getElementById("tail-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.tails.forEach(function(element){
		    	if(element.hold > $scope.tailLimit){
		    		element.sent = element.amount - $scope.tailLimit;
		    		element.hold = $scope.tailLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Tail",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Tail",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){

						},function(err){
						    
						});
		    		}
		    	}
		    })
		    $scope.tailFlag = true;
		}

		$scope.onHeadSpecialSend = function(){
			$scope.headSpecialFlag = false;
		}

		$scope.onHeadSpecialConfirm = function(){
			var divToPrint=document.getElementById("head-special-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.headSpecials.forEach(function(element){
		    	if(element.hold > $scope.headSpecialLimit){
		    		element.sent = element.amount - $scope.headSpecialLimit;
		    		element.hold = $scope.headSpecialLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Head Special",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Head Special",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.headSpecialFlag = true;
		}

		$scope.onTailSpecialSend = function(){
			$scope.tailSpecialFlag = false;
		}

		$scope.onTailSpecialConfirm = function(){
			var divToPrint=document.getElementById("tail-special-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.tailSpecials.forEach(function(element){
		    	if(element.hold > $scope.tailSpecialLimit){
		    		element.sent = element.amount - $scope.tailSpecialLimit;
		    		element.hold = $scope.tailSpecialLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Tail Special",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Tail Special",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.tailSpecialFlag = true;
		}

		$scope.onTopSend = function(){
			$scope.topFlag = false;
		}

		$scope.onTopConfirm = function(){
			var divToPrint=document.getElementById("top-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.tops.forEach(function(element){
		    	if(element.hold > $scope.topLimit){
		    		element.sent = element.amount - $scope.topLimit;
		    		element.hold = $scope.topLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Top",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Top",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.topFlag = true;
		}

		$scope.onBottomSend = function(){
			$scope.bottomFlag = false;
		}

		$scope.onBottomConfirm = function(){
			var divToPrint=document.getElementById("bottom-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.bottoms.forEach(function(element){
		    	if(element.hold > $scope.bottomLimit){
		    		element.sent = element.amount - $scope.bottomLimit;
		    		element.hold = $scope.bottomLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Bottom",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Bottom",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.bottomFlag = true;
		}

		$scope.onTopRunSend = function(){
			$scope.topRunFlag = false;
		}

		$scope.onTopRunConfirm = function(){
			var divToPrint=document.getElementById("top-run-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.topRuns.forEach(function(element){
		    	if(element.hold > $scope.topRunLimit){
		    		element.sent = element.amount - $scope.topRunLimit;
		    		element.hold = $scope.topRunLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Top Run",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Top Run",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.topRunFlag = true;
		}

		$scope.onBottomRunSend = function(){
			$scope.bottomRunFlag = false;
		}

		$scope.onBottomRunConfirm = function(){
			var divToPrint=document.getElementById("bottom-run-print");
		    newWin= window.open("");
		    newWin.document.write(divToPrint.outerHTML);
		    newWin.print();
		    newWin.close();
		    $scope.bottomRuns.forEach(function(element){
		    	if(element.hold > $scope.bottomRunLimit){
		    		element.sent = element.amount - $scope.bottomRunLimit;
		    		element.hold = $scope.bottomRunLimit;
		    		element.new = true;
		    		if(element.id == 0){
		    			var data = {
		    				"number_type": "Bottom Run",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id")
		    			}
		    			$http({
						    method:'post',
						    url:'/admin/report/addNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							var id = response.data.id;
							element.id = id;
						},function(err){
						    
						});
		    		}else{
		    			var data = {
		    				"number_type": "Bottom Run",
		    				"number": element.number,
		    				"sent": element.sent,
		    				"period_id": $('.period-select').val(),
		    				"org_id": $('.org-id').attr("org_id"),
		    				"id": element.id
		    			}
		    			 $http({
						    method:'post',
						    url:'/admin/report/updateNewSent',
						    dataType:"json",
						    data: data,
						    async: false,
						}).then(function(response){
							
						},function(err){
						    
						});
		    		}
		    	}
		    })
			$scope.bottomRunFlag = true;
		}
		function err_msg(msg){
	        var shortCutFunction = "error";
	        var title = "Error !";
	        toastr[shortCutFunction](msg, title);
	        $('#toast-container').addClass('animated shake');
	    }

		function notification_msg(msg){
	        var shortCutFunction = "success";
	        var title = "Notification!";
	        toastr[shortCutFunction](msg, title);
	        $('#toast-container').addClass('animated shake');
	    }
}]);

angular.element(function() {
	angular.bootstrap(document,[ 'myApp' ]);
});
