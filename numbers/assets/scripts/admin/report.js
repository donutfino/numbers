angular.module('myApp', [ 'shagstrom.angular-sortable-table' ]).controller('ReportController',
	[ '$scope', '$timeout', '$filter', '$http', function($scope, $timeout, $filter, $http) {

		$('[data-toggle="tooltip"]').tooltip();
		$scope.agents = []; $scope.depth = 0;
		$scope.allHeads = []; $scope.allTails = []; $scope.allHeadSpecials = []; $scope.allTailSpecials = [];
		var headSents = []; tailSents = []; headSpecialSents = []; tailSpecialSents = [];
		$scope.heads = []; $scope.tails = []; $scope.headSpecials = []; $scope.tailSpecials = [];
		$scope.headFlag = true; $scope.tailFlag = true; $scope.headSpecialFlag = true; $scope.tailSpecialFlag = true;
		
		$scope.allTops = []; $scope.allBottoms = []; $scope.allTopRuns = []; $scope.allBottomRuns = [];
		var topSents = []; bottomSents = []; topRunSents = []; bottomRunSents = [];
		$scope.tops = []; $scope.bottoms = []; $scope.topRuns = []; $scope.bottomRuns = [];
		$scope.topFlag = true; $scope.bottomFlag = true; $scope.topRunFlag = true; $scope.bottomRunFlag = true;

		var commission = 30;

		getHeadSent = function(){
			var data = {
				"type": "Head",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}

			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allHeads.findIndex( record => record.number === element.number );
					$scope.allHeads[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}
		getTailSent = function(){
			var data = {
				"type": "Tail",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTails.findIndex( record => record.number === element.number );
					$scope.allTails[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}
		getHeadSpecialSent = function(){
			var data = {
				"type": "Head Special",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allHeadSpecials.findIndex( record => record.number === element.number );
					$scope.allHeadSpecials[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}
		getTailSpecialSent = function(){
			var data = {
				"type": "Tail Special",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTailSpecials.findIndex( record => record.number === element.number );
					$scope.allTailSpecials[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}

		getTopSent = function(){
			var data = {
				"type": "Top",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTops.findIndex( record => record.number === element.number );
					$scope.allTops[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}
		getBottomSent = function(){
			var data = {
				"type": "Bottom",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allBottoms.findIndex( record => record.number === element.number );
					$scope.allBottoms[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}
		getTopRunSent = function(){
			var data = {
				"type": "Top Run",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allTopRuns.findIndex( record => record.number === element.number );
					$scope.allTopRuns[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}
		getBottomRunSent = function(){
			var data = {
				"type": "Bottom Run",
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getSent',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				temp = response.data;
				temp.forEach(function(element){
					let index = $scope.allBottomRuns.findIndex( record => record.number === element.number );
					$scope.allBottomRuns[index].sent += parseInt(element.new_sent);
				})

			},function(err){
			    
			});
		}

		formatData = function(){
			$scope.allHeads = []; $scope.allTails = []; $scope.allHeadSpecials = []; $scope.allTailSpecials = [];
			var headSents = []; tailSents = []; headSpecialSents = []; tailSpecialSents = [];
			$scope.heads = []; $scope.tails = []; $scope.headSpecials = []; $scope.tailSpecials = [];
			$scope.headFlag = true; $scope.tailFlag = true; $scope.headSpecialFlag = true; $scope.tailSpecialFlag = true;
			
			$scope.allTops = []; $scope.allBottoms = []; $scope.allTopRuns = []; $scope.allBottomRuns = [];
			var topSents = []; bottomSents = []; topRunSents = []; bottomRunSents = [];
			$scope.tops = []; $scope.bottoms = []; $scope.topRuns = []; $scope.bottomRuns = [];
			$scope.topFlag = true; $scope.bottomFlag = true; $scope.topRunFlag = true; $scope.bottomRunFlag = true;

			var commission = 30;

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

		$scope.getLimitAndHold = function(){
			var data = {
				"org_id": $('.org-id').attr("org_id")
			}
			$http({
			    method:'post',
			    url:'/admin/reports/threeDigits/getLimitAndHoldByOrg',
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
					    url:'/admin/reports/threeDigits/getLimitAndHoldByDefault',
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
						
					},function(err){
					        
					});
				}
				$scope.getHeadData();
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

		getTotal = function(){
			$scope.period = $('.period-select').find('option:selected').text();
			getAgents();
			$scope.getLimitAndHold();
			formatData();
		}

		getTotal();

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
			    url:'/admin/reports/threeDigits/getHeadData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		let i = $scope.allHeads.findIndex( record => record.number === element.number );
						$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		let i = $scope.allHeads.findIndex( record => record.number === element.number );
		        		$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;

		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;

		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeads.findIndex( record => record.number === shuffle_number );
		        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeadSpecials.findIndex( record => record.number === shuffle_number );
		        				$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;

		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeads.findIndex( record => record.number === shuffle_number );
		        				$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeadSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
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
			    url:'/admin/reports/threeDigits/getTailData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		let i = $scope.allTails.findIndex( record => record.number === element.number );
		        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		let i = $scope.allTails.findIndex( record => record.number === element.number );
		        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        		
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;
		        		
		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTails.findIndex( record => record.number === shuffle_number );
				        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTailSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;
		        		
		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTails.findIndex( record => record.number === shuffle_number );
				        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTailSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
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
			    url:'/admin/reports/threeDigits/getHeadTailData',
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
		        		let i = $scope.allHeads.findIndex( record => record.number === element.number );
		        		$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		let i = $scope.allHeads.findIndex( record => record.number === element.number );
		        		$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount1);
		        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        		
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;

		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeads.findIndex( record => record.number === shuffle_number );
				        		$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeadSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;
		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeads.findIndex( record => record.number === shuffle_number );
				        		$scope.allHeads[i].amount = $scope.allHeads[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeads[i].hold = $scope.allHeads[i].amount - $scope.allHeads[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allHeadSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allHeadSpecials[i].amount = $scope.allHeadSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allHeadSpecials[i].hold = $scope.allHeadSpecials[i].amount - $scope.allHeadSpecials[i].sent;
		        			})
		        		}
		        	}
		        });
				
				var tmp = tail_tmp;
				tmp.forEach(function(element){
		        	if((element.amount1 != 0) && (element.operator == "") && (element.amount2 == 0)){
		        		let i = $scope.allTails.findIndex( record => record.number === element.number );
		        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        	} else if((element.amount1 != 0) && (element.operator != "") && (element.amount2 != 0)){
		        		let i = $scope.allTails.findIndex( record => record.number === element.number );
		        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount1);
		        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        		
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;
		        		
		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTails.findIndex( record => record.number === shuffle_number );
				        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTailSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
		        			})
		        		}
		        	} else if((element.amount1 == 0) && (element.operator != "") && (element.amount2 != 0)){
		        		shuffle_numbers = shuffle(element.number);
		        		var split_num = shuffle_numbers.length;
		        		if(element.operator == "."){		        			
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTails.findIndex( record => record.number === shuffle_number );
				        		$scope.allTails[i].amount = $scope.allTails[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTails[i].hold = $scope.allTails[i].amount - $scope.allTails[i].sent;
		        			})
		        		} else if (element.operator == "*"){
		        			shuffle_numbers.forEach(function(shuffle_number){
		        				let i = $scope.allTailSpecials.findIndex( record => record.number === shuffle_number );
				        		$scope.allTailSpecials[i].amount = $scope.allTailSpecials[i].amount + parseInt(element.amount2/split_num);
				        		$scope.allTailSpecials[i].hold = $scope.allTailSpecials[i].amount - $scope.allTailSpecials[i].sent;
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
			    url:'/admin/reports/twoDigits/getTopData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		let i = $scope.allTops.findIndex( record => record.number === element.number );
		        		$scope.allTops[i].amount = $scope.allTops[i].amount + parseInt(element.amount1);
		        		$scope.allTops[i].hold = $scope.allTops[i].amount - $scope.allTops[i].sent;
		        	} else if(element.number.length == 1){
		        		let i = $scope.allTopRuns.findIndex( record => record.number === element.number );
		        		$scope.allTopRuns[i].amount = $scope.allTopRuns[i].amount + parseInt(element.amount1);
		        		$scope.allTopRuns[i].hold = $scope.allTopRuns[i].amount - $scope.allTopRuns[i].sent;
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
			    url:'/admin/reports/twoDigits/getBottomData',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){

		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		let i = $scope.allBottoms.findIndex( record => record.number === element.number );
		        		$scope.allBottoms[i].amount = $scope.allBottoms[i].amount + parseInt(element.amount1);
		        		$scope.allBottoms[i].hold = $scope.allBottoms[i].amount - $scope.allBottoms[i].sent;
		        	} else if(element.number.length == 1){
		        		let i = $scope.allBottomRuns.findIndex( record => record.number === element.number );
		        		$scope.allBottomRuns[i].amount = $scope.allBottomRuns[i].amount + parseInt(element.amount1);
		        		$scope.allBottomRuns[i].hold = $scope.allBottomRuns[i].amount - $scope.allBottomRuns[i].sent;
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
			    url:'/admin/reports/twoDigits/getTopBottomData',
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
		        		let i = $scope.allTops.findIndex( record => record.number === element.number );
		        		$scope.allTops[i].amount = $scope.allTops[i].amount + parseInt(element.amount1);
		        		$scope.allTops[i].hold = $scope.allTops[i].amount - $scope.allTops[i].sent;
		        	} else if(element.number.length == 1){
		        		let i = $scope.allTopRuns.findIndex( record => record.number === element.number );
		        		$scope.allTopRuns[i].amount = $scope.allTopRuns[i].amount + parseInt(element.amount1);
		        		$scope.allTopRuns[i].hold = $scope.allTopRuns[i].amount - $scope.allTopRuns[i].sent;
		        	}
		        })

		        var tmp = bottom_temp;
		        tmp.forEach(function(element){
		        	if(element.number.length == 2){
		        		let i = $scope.allBottoms.findIndex( record => record.number === element.number );
		        		$scope.allBottoms[i].amount = $scope.allBottoms[i].amount + parseInt(element.amount1);
		        		$scope.allBottoms[i].hold = $scope.allBottoms[i].amount - $scope.allBottoms[i].sent;
		        	} else if(element.number.length == 1){
		        		let i = $scope.allBottomRuns.findIndex( record => record.number === element.number );
		        		$scope.allBottomRuns[i].amount = $scope.allBottomRuns[i].amount + parseInt(element.amount1);
		        		$scope.allBottomRuns[i].hold = $scope.allBottomRuns[i].amount - $scope.allBottomRuns[i].sent;
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

				if($scope.topLimit == 0){
					$scope.topLimit = parseInt($scope.topNet/$scope.topRate);
				}
				if($scope.bottomLimit == 0){
					$scope.bottomLimit = parseInt($scope.bottomNet/$scope.bottomRate);
				}
				if($scope.topRunLimit == 0){
					$scope.topRunLimit = parseInt($scope.topRunNet/$scope.topRunRate);
				}
				if($scope.bottomRunLimit == 0){
					$scope.bottomRunLimit = parseInt($scope.bottomRunNet/$scope.bottomRunRate);
				}
				updatePeriod();
			},function(err){
			        
			});
		}

		$scope.onHeadSend = function(){
			$scope.headFlag = false;
		}
		$scope.onHeadCancel = function(){
			$scope.headFlag = true;
		}
		$scope.onHeadConfirm = function(){			
		    $scope.headTotalNewSent = 0;
		    $scope.heads.forEach(function(element){
		    	if(element.hold > $scope.headLimit){
		    		$scope.headTotalNewSent += element.amount - $scope.headLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("head-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Head",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.heads.forEach(function(element){
				    	if(element.hold > $scope.headLimit){
				    		var new_sent = element.amount - $scope.headLimit - element.sent;
				    		element.sent = element.amount - $scope.headLimit;
				    		element.hold = parseInt($scope.headLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Head",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.headAmountTotal = 0; $scope.headSentTotal = 0; $scope.headHoldTotal = 0;
				    for( var i = 0; i < $scope.heads.length; i++){
						$scope.headAmountTotal += $scope.heads[i].amount;
						$scope.headSentTotal += $scope.heads[i].sent;
						$scope.headHoldTotal += $scope.heads[i].hold;
					}
					$scope.headFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onTailSend = function(){
			$scope.tailFlag = false;
		}
		$scope.onTailCancel = function(){
			$scope.tailFlag = true;
		}
		$scope.onTailConfirm = function(){
			$scope.tailTotalNewSent = 0;
		    $scope.tails.forEach(function(element){
		    	if(element.hold > $scope.tailLimit){
		    		$scope.tailTotalNewSent += element.amount - $scope.tailLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("tail-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Tail",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.tails.forEach(function(element){
				    	if(element.hold > $scope.tailLimit){
				    		var new_sent = element.amount - $scope.tailLimit - element.sent;
				    		element.sent = element.amount - $scope.tailLimit;
				    		element.hold = parseInt($scope.tailLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Tail",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.tailAmountTotal = 0; $scope.tailSentTotal = 0; $scope.tailHoldTotal = 0;
				    for( var i = 0; i < $scope.tails.length; i++){
						$scope.tailAmountTotal += $scope.tails[i].amount;
						$scope.tailSentTotal += $scope.tails[i].sent;
						$scope.tailHoldTotal += $scope.tails[i].hold;
					}
					$scope.tailFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onHeadSpecialSend = function(){
			$scope.headSpecialFlag = false;
		}
		$scope.onHeadSpecialCancel = function(){
			$scope.headSpecialFlag = true;
		}

		$scope.onHeadSpecialConfirm = function(){
			$scope.headSpecialTotalNewSent = 0;
		    $scope.headSpecials.forEach(function(element){
		    	if(element.hold > $scope.headSpecialLimit){
		    		$scope.headSpecialTotalNewSent += element.amount - $scope.headSpecialLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("head-special-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Head Special",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.headSpecials.forEach(function(element){
				    	if(element.hold > $scope.headSpecialLimit){
				    		var new_sent = element.amount - $scope.headSpecialLimit - element.sent;
				    		element.sent = element.amount - $scope.headSpecialLimit;
				    		element.hold = parseInt($scope.headSpecialLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Head Special",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.headSpecialAmountTotal = 0; $scope.headSpecialSentTotal = 0; $scope.headSpecialHoldTotal = 0;
				    for( var i = 0; i < $scope.headSpecials.length; i++){
						$scope.headSpecialAmountTotal += $scope.headSpecials[i].amount;
						$scope.headSpecialSentTotal += $scope.headSpecials[i].sent;
						$scope.headSpecialHoldTotal += $scope.headSpecials[i].hold;
					}
					$scope.headSpecialFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onTailSpecialSend = function(){
			$scope.tailSpecialFlag = false;
		}

		$scope.onTailSpecialCancel = function(){
			$scope.tailSpecialFlag = true;
		}

		$scope.onTailSpecialConfirm = function(){
			$scope.tailSpecialTotalNewSent = 0;
		    $scope.tailSpecials.forEach(function(element){
		    	if(element.hold > $scope.tailSpecialLimit){
		    		$scope.tailSpecialTotalNewSent += element.amount - $scope.tailSpecialLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("tail-special-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Tail Special",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.tailSpecials.forEach(function(element){
				    	if(element.hold > $scope.tailSpecialLimit){
				    		var new_sent = element.amount - $scope.tailSpecialLimit - element.sent;
				    		element.sent = element.amount - $scope.tailSpecialLimit;
				    		element.hold = parseInt($scope.tailSpecialLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Tail Special",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.tailSpecialAmountTotal = 0; $scope.tailSpecialSentTotal = 0; $scope.tailSpecialHoldTotal = 0;
				    for( var i = 0; i < $scope.tailSpecials.length; i++){
						$scope.tailSpecialAmountTotal += $scope.tailSpecials[i].amount;
						$scope.tailSpecialSentTotal += $scope.tailSpecials[i].sent;
						$scope.tailSpecialHoldTotal += $scope.tailSpecials[i].hold;
					}
					$scope.tailSpecialFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onTopSend = function(){
			$scope.topFlag = false;
		}
		$scope.onTopCancel = function(){
			$scope.topFlag = true;
		}

		$scope.onTopConfirm = function(){
			$scope.topTotalNewSent = 0;
		    $scope.tops.forEach(function(element){
		    	if(element.hold > $scope.topLimit){
		    		$scope.topTotalNewSent += element.amount - $scope.topLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("top-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Top",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.tops.forEach(function(element){
				    	if(element.hold > $scope.topLimit){
				    		var new_sent = element.amount - $scope.topLimit - element.sent;
				    		element.sent = element.amount - $scope.topLimit;
				    		element.hold = parseInt($scope.topLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Top",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.topAmountTotal = 0; $scope.topSentTotal = 0; $scope.topHoldTotal = 0;
				    for( var i = 0; i < $scope.tops.length; i++){
						$scope.topAmountTotal += $scope.tops[i].amount;
						$scope.topSentTotal += $scope.tops[i].sent;
						$scope.topHoldTotal += $scope.tops[i].hold;
					}
					$scope.topFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onBottomSend = function(){
			$scope.bottomFlag = false;
		}
		$scope.onBottomCancel = function(){
			$scope.bottomFlag = true;
		}

		$scope.onBottomConfirm = function(){
			$scope.bottomTotalNewSent = 0;
		    $scope.bottoms.forEach(function(element){
		    	if(element.hold > $scope.bottomLimit){
		    		$scope.bottomTotalNewSent += element.amount - $scope.bottomLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("bottom-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Bottom",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.bottoms.forEach(function(element){
				    	if(element.hold > $scope.bottomLimit){
				    		var new_sent = element.amount - $scope.bottomLimit - element.sent;
				    		element.sent = element.amount - $scope.bottomLimit;
				    		element.hold = parseInt($scope.bottomLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Bottom",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.bottomAmountTotal = 0; $scope.bottomSentTotal = 0; $scope.bottomHoldTotal = 0;
				    for( var i = 0; i < $scope.bottoms.length; i++){
						$scope.bottomAmountTotal += $scope.bottoms[i].amount;
						$scope.bottomSentTotal += $scope.bottoms[i].sent;
						$scope.bottomHoldTotal += $scope.bottoms[i].hold;
					}
					$scope.bottomFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onTopRunSend = function(){
			$scope.topRunFlag = false;
		}
		$scope.onTopRunCancel = function(){
			$scope.topRunFlag = true;
		}

		$scope.onTopRunConfirm = function(){
			$scope.topRunTotalNewSent = 0;
		    $scope.topRuns.forEach(function(element){
		    	if(element.hold > $scope.topRunLimit){
		    		$scope.topRunTotalNewSent += element.amount - $scope.topRunLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("top-run-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Top Run",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.topRuns.forEach(function(element){
				    	if(element.hold > $scope.topRunLimit){
				    		var new_sent = element.amount - $scope.topRunLimit - element.sent;
				    		element.sent = element.amount - $scope.topRunLimit;
				    		element.hold = parseInt($scope.topRunLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Top Run",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.topRunAmountTotal = 0; $scope.topRunSentTotal = 0; $scope.topRunHoldTotal = 0;
				    for( var i = 0; i < $scope.topRuns.length; i++){
						$scope.topRunAmountTotal += $scope.topRuns[i].amount;
						$scope.topRunSentTotal += $scope.topRuns[i].sent;
						$scope.topRunHoldTotal += $scope.topRuns[i].hold;
					}
					$scope.topRunFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		$scope.onBottomRunSend = function(){
			$scope.bottomRunFlag = false;
		}
		$scope.onBottomRunCancel = function(){
			$scope.bottomRunFlag = true;
		}

		$scope.onBottomRunConfirm = function(){
			$scope.bottomRunTotalNewSent = 0;
		    $scope.bottomRuns.forEach(function(element){
		    	if(element.hold > $scope.bottomRunLimit){
		    		$scope.bottomRunTotalNewSent += element.amount - $scope.bottomRunLimit;
		    	}
		    });
		    setTimeout(function(){
		    	var divToPrint=document.getElementById("bottom-run-print");
			    newWin= window.open("");
			    newWin.document.write(divToPrint.innerHTML);
			    newWin.document.getElementById("hidden_div").style.display='block';
			    newWin.print();
		    	newWin.close();
		    	var data = {
    				"type": "Bottom Run",
    				"period_id": $('.period-select').val(),
    				"org_id": $('.org-id').attr("org_id")
    			}
		    	$http({
				    method:'post',
				    url:'/admin/reports/threeDigits/getDepth',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){
					$scope.depth = parseInt(response.data) + 1;
					var datetime = new Date();
					$scope.bottomRuns.forEach(function(element){
				    	if(element.hold > $scope.bottomRunLimit){
				    		var new_sent = element.amount - $scope.bottomRunLimit - element.sent;
				    		element.sent = element.amount - $scope.bottomRunLimit;
				    		element.hold = parseInt($scope.bottomRunLimit);
				    		element.new = true;

			    			var data = {
			    				"type": "Bottom Run",
			    				"number": element.number,
			    				"amount": element.amount,
			    				"new_sent": new_sent,
			    				"hold": element.hold,			    				
			    				"depth": $scope.depth,
			    				"time": datetime,
			    				"period_id": $('.period-select').val(),
			    				"org_id": $('.org-id').attr("org_id")
			    			}
			    			$http({
							    method:'post',
							    url:'/admin/reports/threeDigits/addNewSent',
							    dataType:"json",
							    data: data,
							    async: false,
							}).then(function(response){
							},function(err){
							    
							});
				    	}
				    })
				    $scope.bottomRunAmountTotal = 0; $scope.bottomRunSentTotal = 0; $scope.bottomRunHoldTotal = 0;
				    for( var i = 0; i < $scope.bottomRuns.length; i++){
						$scope.bottomRunAmountTotal += $scope.bottomRuns[i].amount;
						$scope.bottomRunSentTotal += $scope.bottomRuns[i].sent;
						$scope.bottomRunHoldTotal += $scope.bottomRuns[i].hold;
					}
					$scope.bottomRunFlag = true;
					updatePeriod();
				},function(err){
				    
				});			    
		    }, 200);
		}

		function updatePeriod(){
			var top_result = 0, bottom_result = 0;
			var data = {
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}

			$http({
			    method:'post',
			    url:'/admin/settings/periodManagement/getPeriod',
			    dataType:"json",
			    data: data,
			    async: false,
			}).then(function(response){
				var payment = 0, totalAmount = 0, totalNet = 0, p_l = 0;
				var headPay = 0, tailPay = 0, headSpecialPay = 0, tailSpecialPay = 0;
				var topPay = 0, bottomPay = 0, topRunPay = 0, bottomRunPay = 0;
				top_result = response.data[0]['top_result'];
				bottom_result = response.data[0]['bottom_result'];
				
				headPay +=$scope.heads[$scope.heads.findIndex( record => record.number ===  top_result.slice(0, 3))].hold * $scope.headRate;
				tailPay += $scope.tails[$scope.tails.findIndex( record => record.number ===  top_result.slice(3, 6))].hold * $scope.tailRate;
				headSpecialPay += $scope.headSpecials[$scope.headSpecials.findIndex( record => record.number ===  top_result.slice(0, 3))].hold * $scope.headSpecialRate;
				tailSpecialPay += $scope.tailSpecials[$scope.tailSpecials.findIndex( record => record.number ===  top_result.slice(3, 6))].hold * $scope.tailSpecialRate;
				topPay += $scope.tops[$scope.tops.findIndex( record => record.number ===  top_result.slice(4, 6))].hold * $scope.topRate;
				bottomPay += $scope.bottoms[$scope.bottoms.findIndex( record => record.number ===  bottom_result)].hold * $scope.bottomRate;
				topRunPay += $scope.topRuns[$scope.topRuns.findIndex( record => record.number ===  top_result.slice(4, 5))].hold * $scope.topRunRate;
				topRunPay += $scope.topRuns[$scope.topRuns.findIndex( record => record.number ===  top_result.slice(5, 6))].hold * $scope.topRunRate;
				bottomRunPay += $scope.bottomRuns[$scope.bottomRuns.findIndex( record => record.number ===  bottom_result.slice(0, 1))].hold * $scope.bottomRunRate;
				bottomRunPay += $scope.bottomRuns[$scope.bottomRuns.findIndex( record => record.number ===  bottom_result.slice(1, 2))].hold * $scope.bottomRunRate;

				payment = headPay + tailPay + headSpecialPay + tailSpecialPay + topPay + bottomPay + topRunPay + bottomRunPay;
				totalAmount = $scope.headAmountTotal + $scope.tailAmountTotal + $scope.headSpecialAmountTotal + $scope.tailSpecialAmountTotal+
							$scope.topAmountTotal + $scope.bottomAmountTotal + $scope.topRunAmountTotal + $scope.bottomRunAmountTotal;
				totalNet = parseInt(totalAmount * (1 - commission/100));
				p_l = totalNet - payment;

				var data = {
					"period_id": $('.period-select').val(),
					"total" : totalAmount,
					"net": totalNet,
					"pay": payment,
					"p_l": p_l,
					"head": $scope.headRate,
					"tail": $scope.tailRate,
					"headSpecial": $scope.headSpecialRate,
					"tailSpecial": $scope.tailSpecialRate,
					"top": $scope.topRate,
					"bottom": $scope.bottomRate,
					"topRun": $scope.topRunRate,
					"bottomRun": $scope.bottomRunRate
				}

				$http({
				    method:'post',
				    url:'/admin/settings/periodManagement/updatePeriodInfo',
				    dataType:"json",
				    data: data,
				    async: false,
				}).then(function(response){

				},function(err){
				    
				});
			},function(err){
			    
			});
		}
		
		$('.edit-limit-form').submit(function(e) {
	        e.preventDefault();        
	        $('#toast-container').remove();
	        
	        $.ajax({
	            url : '/admin/settings/numberType/updateLimit',
	            type : 'post',
	            data : $(this).serialize(),
	            success : function(response) { 

	                if (response.state == false) {
	                } else {
	                    window.location.reload();
	                }
	            }
	        });
	    });

		$scope.getAgentSent = function(amount, id, type){
			switch (type) {
			    case "Head":
			        var tempLimit = $scope.headLimit;
			        var tempType = "headLimit";
			        break;
			    case "Tail":
			        var tempLimit = $scope.tailLimit;
			        var tempType = "tailLimit";
			        break;
			    case "Head Special":
			        var tempLimit = $scope.headSpecialLimit;
			        var tempType = "headSpecialLimit";
			        break;
			    case "Tail Special":
			        var tempLimit = $scope.tailSpecialLimit;
			        var tempType = "tailSpecialLimit";
			        break;
			    case "Top":
			        var tempLimit = $scope.topLimit;
			        var tempType = "topLimit";
			        break;
			    case "Bottom":
			        var tempLimit = $scope.bottomLimit;
			        var tempType = "bottomLimit";
			        break;
			    case "Top Run":
			        var tempLimit = $scope.topRunLimit;
			        var tempType = "topRunLimit";
			        break;
			    case "Bottom Run":
			        var tempLimit = $scope.bottomRunLimit;
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
			if(temp1 >= amount - tempLimit){
				res = 0;
			} else if(temp2 <= amount - tempLimit){
				res = $scope.agents[id][tempType];
			} else {
				res = amount - tempLimit - temp1;
			}
			return parseInt(res);
		}
		$scope.getAgentSentFormat = function(amount, id, type){
			var res = $scope.getAgentSent(amount, id, type);
			return $scope.formatAmount(res);
		}
		$scope.getAgentExceed = function(amount, type){
			switch (type) {
			    case "Head":
			        var tempLimit = $scope.headLimit;
			        break;
			    case "Tail":
			        var tempLimit = $scope.tailLimit;
			        break;
			    case "Head Special":
			        var tempLimit = $scope.headSpecialLimit;
			        break;
			    case "Tail Special":
			        var tempLimit = $scope.tailSpecialLimit;
			        break;
			    case "Top":
			        var tempLimit = $scope.topLimit;
			        break;
			    case "Bottom":
			        var tempLimit = $scope.bottomLimit;
			        break;
			    case "Top Run":
			        var tempLimit = $scope.topRunLimit;
			        break;
			    case "Bottom Run":
			        var tempLimit = $scope.bottomRunLimit;  
			}
			var temp = 0;
			for(i=0; i < $scope.agents.length; i++){
				temp += $scope.getAgentSent(amount, i, type);
			}
			return amount - temp - tempLimit;
		}
		$scope.getAgentExceedFormat = function(amount, type){
			var res = $scope.getAgentExceed(amount, type);
			return $scope.formatAmount(res);
		}
		$scope.getTotalAgentSent = function(id, type){
			var res = 0;
			switch (type) {
			    case "Head":
			        for( var i = 0; i < $scope.heads.length; i++){
						if($scope.heads[i].hold > $scope.headLimit){
							res += $scope.getAgentSent($scope.heads[i].amount, id, type);
						}
					}
			        break;
			    case "Tail":
			        for( var i = 0; i < $scope.tails.length; i++){
						if($scope.tails[i].hold > $scope.tailLimit){
							res += $scope.getAgentSent($scope.tails[i].amount, id, type);
						}
					}
			        break;
			    case "Head Special":
			        for( var i = 0; i < $scope.headSpecials.length; i++){
						if($scope.headSpecials[i].hold > $scope.headSpecialLimit){
							res += $scope.getAgentSent($scope.headSpecials[i].amount, id, type);
						}
					}
			        break;
			    case "Tail Special":
			        for( var i = 0; i < $scope.tailSpecials.length; i++){
						if($scope.tailSpecials[i].hold > $scope.tailSpecialLimit){
							res += $scope.getAgentSent($scope.tailSpecials[i].amount, id, type);
						}
					}
			        break;
			    case "Top":
			        for( var i = 0; i < $scope.tops.length; i++){
						if($scope.tops[i].hold > $scope.topLimit){
							res += $scope.getAgentSent($scope.tops[i].amount, id, type);
						}
					}
			        break;
			    case "Bottom":
			        for( var i = 0; i < $scope.bottoms.length; i++){
						if($scope.bottoms[i].hold > $scope.bottomLimit){
							res += $scope.getAgentSent($scope.bottoms[i].amount, id, type);
						}
					}
			        break;
			    case "Top Run":
			        for( var i = 0; i < $scope.topRuns.length; i++){
						if($scope.topRuns[i].hold > $scope.topRunLimit){
							res += $scope.getAgentSent($scope.topRuns[i].amount, id, type);
						}
					}
			        break;
			    case "Bottom Run":
			        for( var i = 0; i < $scope.bottomRuns.length; i++){
						if($scope.bottomRuns[i].hold > $scope.bottomRunLimit){
							res += $scope.getAgentSent($scope.bottomRuns[i].amount, id, type);
						}
					}
			}
			return res;
		}
		$scope.getTotalAgentSentFormat = function(id, type){
			var res = $scope.getTotalAgentSent(id, type);
			return $scope.formatAmount(res);
		}
		$scope.getTotalExceed = function(type){
			var res = 0;
			switch (type) {
			    case "Head":
			        for( var i = 0; i < $scope.heads.length; i++){
						if($scope.heads[i].hold > $scope.headLimit){
							res += $scope.getAgentExceed($scope.heads[i].amount, type);
						}
					}
			        break;
			    case "Tail":
			        for( var i = 0; i < $scope.tails.length; i++){
						if($scope.tails[i].hold > $scope.tailLimit){
							res += $scope.getAgentExceed($scope.tails[i].amount, type);
						}
					}
			        break;
			    case "Head Special":
			        for( var i = 0; i < $scope.headSpecials.length; i++){
						if($scope.headSpecials[i].hold > $scope.headSpecialLimit){
							res += $scope.getAgentExceed($scope.headSpecials[i].amount, type);
						}
					}
			        break;
			    case "Tail Special":
			        for( var i = 0; i < $scope.tailSpecials.length; i++){
						if($scope.tailSpecials[i].hold > $scope.tailSpecialLimit){
							res += $scope.getAgentExceed($scope.tailSpecials[i].amount, type);
						}
					}
			        break;
			    case "Top":
			        for( var i = 0; i < $scope.tops.length; i++){
						if($scope.tops[i].hold > $scope.topLimit){
							res += $scope.getAgentExceed($scope.tops[i].amount, type);
						}
					}
			        break;
			    case "Bottom":
			        for( var i = 0; i < $scope.bottoms.length; i++){
						if($scope.bottoms[i].hold > $scope.bottomLimit){
							res += $scope.getAgentExceed($scope.bottoms[i].amount, type);
						}
					}
			        break;
			    case "Top Run":
			        for( var i = 0; i < $scope.topRuns.length; i++){
						if($scope.topRuns[i].hold > $scope.topRunLimit){
							res += $scope.getAgentExceed($scope.topRuns[i].amount, type);
						}
					}
			        break;
			    case "Bottom Run":
			        for( var i = 0; i < $scope.bottomRuns.length; i++){
						if($scope.bottomRuns[i].hold > $scope.bottomRunLimit){
							res += $scope.getAgentExceed($scope.bottomRuns[i].amount, type);
						}
					}
			}
			return res;
		}
		$scope.getTotalExceedFormat = function(type){
			var res = $scope.getTotalExceed(type);
			return $scope.formatAmount(res);
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