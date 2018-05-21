angular.module('myApp', []).controller('InputController',
	[ '$scope', '$timeout', '$filter', '$http', function($scope, $timeout, $filter, $http) {

		var allHeadData = [
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"}
		];
		$scope.heads = allHeadData.slice(0, 10); $scope.headNumber = ""; $scope.headOperator = ""; $scope.headAmount1 = ""; $scope.headAmount2 = "";	$scope.headPageLength = 3;

		var allTailData = [
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"}
		];
		$scope.tails = allTailData.slice(0, 10); $scope.tailNumber = ""; $scope.tailOperator = ""; $scope.tailAmount1 = ""; $scope.tailAmount2 = "";	$scope.tailPageLength = 3;

		var allHeadTailData = [
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"},
			{number: "", amount1: "", operator: "", amount2: "", id: "0"}
		];
		$scope.headTails = allHeadTailData.slice(0, 10); $scope.headTailNumber = ""; $scope.headTailOperator = ""; $scope.headTailAmount1 = ""; $scope.headTailAmount2 = "";	$scope.headTailPageLength = 3;

		var allTopData = [
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"}
		];
		$scope.tops = allTopData.slice(0, 10); $scope.topNumber = ""; $scope.topAmount = "";	$scope.topPageLength = 2;
		
		var allBottomData = [
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"}
		];
		$scope.bottoms = allBottomData.slice(0, 10); $scope.bottomNumber = ""; $scope.bottomAmount = "";	$scope.bottomPageLength = 2;

		var allTopBottomData = [
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"},
			{number: "", amount: "", id: "0"}
		];		
		$scope.topBottoms = allTopBottomData.slice(0, 10); $scope.topBottomNumber = ""; $scope.topBottomAmount = "";	$scope.topBottomPageLength = 2;
		
		$('.tail-table input').attr({"disabled": "disabled"});
		$('.head-tail-table input').attr({"disabled": "disabled"});
		$('.top-table input').attr({"disabled": "disabled"});
		$('.bottom-table input').attr({"disabled": "disabled"});
		$('.top-bottom-table input').attr({"disabled": "disabled"});

		$scope.getTotalPage = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val()
			}
			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getTotalPage',
			    dataType:"json",
			    data: data,
			}).then(function(response){
			       $scope.pageTotal = response.data;
			},function(err){
			       
			});
		}
		$scope.getTotalGrand = function(){
			var data = {
				agent_id: $('.agent-select').val(),
				period_id: $('.period-select').val()
			}
			$http({
		        method:'post',
		        url:'/admin/keyIn/getTotalGrand',
		        dataType:"json",
		        data: data,
			}).then(function(response){
			       $scope.grandTotal = response.data;
			},function(err){
			       
			});
		}
		$scope.getCredit = function(){
			var data = {
				agent_id: $('.agent-select').val()
			}
			$http({
			       method:'post',
			       url:'/admin/keyIn/getCredit',
			       dataType:"json",
			       data: data,
			}).then(function(response){
			       $scope.credit = response.data;
			},function(err){
			       
			});
		}
		$scope.getHeadData = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getHeadData',
			    dataType:"json",
			    data: data,
			}).then(function(response){
				allHeadData = [
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"}
				];
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.amount1 == 0){
		        		var newElement = {number: element.number, amount1: "", operator: element.operator, amount2: element.amount2, id: element.input_id};
		        		allHeadData.push(newElement);
		        	}else if(element.amount2 == 0){
		        		var newElement = {number: element.number, amount1: element.amount1, operator: element.operator, amount2: "", id: element.input_id};
		        		allHeadData.push(newElement);
		        	}else{
		        		var newElement = {number: element.number, amount1: element.amount1, operator: element.operator, amount2: element.amount2, id: element.input_id};
		        		allHeadData.push(newElement);
		        	}
		        })
		        showHeadPage();
			        
			},function(err){
			        
			});
		}
		$scope.getTailData = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getTailData',
			    dataType:"json",
			    data: data,
			}).then(function(response){
			    allTailData = [
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"}
				];
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.amount1 == 0){
		        		var newElement = {number: element.number, amount1: "", operator: element.operator, amount2: element.amount2, id: element.input_id};
		        		allTailData.push(newElement);
		        	}else if(element.amount2 == 0){
		        		var newElement = {number: element.number, amount1: element.amount1, operator: element.operator, amount2: "", id: element.input_id};
		        		allTailData.push(newElement);
		        	}else{
		        		var newElement = {number: element.number, amount1: element.amount1, operator: element.operator, amount2: element.amount2, id: element.input_id};
		        		allTailData.push(newElement);
		        	}
		        })
		        showTailPage();
			},function(err){
			        
			});
		}
		$scope.getHeadTailData = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getHeadTailData',
			    dataType:"json",
			    data: data,
			}).then(function(response){
			    allHeadTailData = [
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"},
					{number: "", amount1: "", operator: "", amount2: "", id: "0"}
				];
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	if(element.amount1 == 0){
		        		var newElement = {number: element.number, amount1: "", operator: element.operator, amount2: element.amount2, id: element.input_id};
		        		allHeadTailData.push(newElement);
		        	}else if(element.amount2 == 0){
		        		var newElement = {number: element.number, amount1: element.amount1, operator: element.operator, amount2: "", id: element.input_id};
		        		allHeadTailData.push(newElement);
		        	}else{
		        		var newElement = {number: element.number, amount1: element.amount1, operator: element.operator, amount2: element.amount2, id: element.input_id};
		        		allHeadTailData.push(newElement);
		        	}
		        })
		        showHeadTailPage();
			},function(err){
			        
			});
		}
		$scope.getTopData = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getTopData',
			    dataType:"json",
			    data: data,
			}).then(function(response){
				allTopData = [
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"}
				];
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	var newElement = {number: element.number, amount: element.amount1, id: element.input_id};
		       		allTopData.push(newElement);
		        })
		        showTopPage();
			},function(err){
			        
			});
		}
		$scope.getBottomData = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getBottomData',
			    dataType:"json",
			    data: data,
			}).then(function(response){
				allBottomData = [
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"}
				];
		        var tmp = response.data;
		        tmp.forEach(function(element){
		        	var newElement = {number: element.number, amount: element.amount1, id: element.input_id};
		       		allBottomData.push(newElement);
		        })
		        showBottomPage();
			},function(err){
			        
			});
		}
		$scope.getTopBottomData = function(){
			var data = {
				"page": $('.input-page').val(),
				"agent_id": $('.agent-select').val(),
				"period_id": $('.period-select').val(),
				"org_id": $('.org-id').attr("org_id")
			}
			
            $http({
			    method:'post',
			    url:'/admin/keyIn/getTopBottomData',
			    dataType:"json",
			    data: data,
			}).then(function(response){
				allTopData = [
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"},
					{number: "", amount: "", id: "0"}
				];
		        var tmp = response.data;
		        tmp.forEach(function(element){
		       		var newElement = {number: element.number, amount: element.amount1, id: element.input_id};
		       		allTopBottomData.push(newElement);
		        })
		        showTopBottomPage();
			},function(err){
			        
			});
		}

		getTotal = function(){
			$scope.getTotalPage();
			$scope.getTotalGrand();
			$scope.getCredit();
			$scope.getHeadData();
			$scope.getTailData();
			$scope.getHeadTailData();
			$scope.getTopData();
			$scope.getBottomData();
			$scope.getTopBottomData();
		}

		getTotal();

		checkDigit = function(keyCode){
       		if (keyCode < 48 || keyCode > 57) {
	         	return false;
       		}
       		return true;
       		
		}
		//Start JS Code For Head Table
		showHeadPage = function(){
			var length = allHeadData.length;
			if(length > 10){
				$scope.heads = allHeadData.slice(Math.max(length - 10, 1));
			}	
		}

		insertHead = function(keyCode){
			if($scope.headNumber.length == $scope.headPageLength){
				if(($scope.headAmount1 != "") || ($scope.headAmount2 != "")){

					if((($scope.headAmount1 != "") && ($scope.headAmount2 != "") && ($scope.headOperator == "")) || (($scope.headAmount1 == "") && ($scope.headAmount2 != "") && ($scope.headOperator == ""))|| (($scope.headAmount2 == "") && ($scope.headOperator !== ""))){

					}else{
						var data = {
							number: $scope.headNumber,
							amount1: $scope.headAmount1,
							operator: $scope.headOperator,
							amount2: $scope.headAmount2,
							page: $('.input-page').val(),
							org_id: $('.org-id').attr("org_id"),
							period_id: $('.period-select').val(),
							agent_id: $('.agent-select').val()
						}
						$.ajax({
			                url : '/admin/keyIn/insertHead',
			                type : 'post',
			                data : data,
			                async: false,
			                success : function(response) {
			                    if(response > 0){
			                    	var item = {number: $scope.headNumber, amount1: $scope.headAmount1, operator: $scope.headOperator, amount2: $scope.headAmount2, id: response};
									getTotal();
									$scope.headNumber = "";
									$scope.headOperator = "";
									$scope.headAmount1 = "";
									$scope.headAmount2 = "";
									$("input.head-number").focus();
									if(keyCode == 47){
										$('.head-table input').attr({"disabled": "disabled"});
										$('.head-table').addClass("disabled");
										$('.tail-table input').attr({"disabled": false});
										$('.tail-table').removeClass("disabled");
										$('input.tail-number').focus();
									}
									var msg = "Data inserted into Head successfully";
									notification_msg(msg);
			                    } else {
			                    	var msg = "Failed to insert data into Head";
									err_msg(msg);
			                    }
			                }
			            });						
					}						
				} else {
					last_row = allHeadData[allHeadData.length - 1];					
					$scope.headAmount1 = last_row['amount1'];
					$scope.headOperator = last_row['operator'];
					$scope.headAmount2 = last_row['amount2'];
				}
			}
		}
		$scope.checkHeadNumber = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			if($scope.headNumber != ""){
				
				if($scope.headNumber.length > $scope.headPageLength-1) {
	       			e.preventDefault();
	       		};
	       		if(e.keyCode == 13){
	       			if($scope.headNumber.length != $scope.headPageLength){
	       				e.preventDefault();
	       			} else {
	       				$("input.head-amount1").focus();
	       			}
	       		}
			} else {
				if(e.keyCode == 45){
					last_row = allHeadData[allHeadData.length - 1];
					deleteHead(last_row['id']);
				} else if(e.keyCode == 47){
					if(($scope.headAmount1 == "") && ($scope.headOperator == "") && ($scope.headAmount2 == "")){
						$('.head-table input').attr({"disabled": "disabled"});
						$('.head-table').addClass("disabled");
						$('.tail-table input').attr({"disabled": false});
						$('.tail-table').removeClass("disabled");
						$('input.tail-number').focus();
					}
				}
			}
		}

		$scope.checkHeadAmount1 = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertHead(e.keyCode);
			} else if((e.keyCode == 46) || (e.keyCode == 42)){
				$scope.headOperator = String.fromCharCode(e.keyCode);
				$("input.head-amount2").focus();
			}
		}	

		$scope.checkHeadAmount2 = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertHead(e.keyCode);
			}  
		}
		
		deleteHead = function(id){
			if(confirm("Do you really want to delete this row?")){
				$.ajax({
	                url : '/admin/keyIn/inputDelete',
	                type : 'post',
	                data : {input_id: id},
	                async: false,
	                success : function(response) {
	                    if(response){
	                    	deleted_row = $filter('filter')(allHeadData, {'id': id});
	                    	getTotal();
	                    	$("input.head-number").focus();
	                    	var msg = "Data is deleted successfully";
							notification_msg(msg);
	                    } else {
	                    	var msg = "You can't delete this row unexpectedly";
							err_msg(msg);
	                    }
	                }
	            });
			}
		}
		//End JS Code For Head Page
		
		//Start JS Code For Tail Table
		showTailPage = function(){
			var length = allTailData.length;
			if(length > 10){
				$scope.tails = allTailData.slice(Math.max(length - 10, 1));
			}
		}

		insertTail = function(keyCode){
			if($scope.tailNumber.length == $scope.tailPageLength){
				if(($scope.tailAmount1 != "") || ($scope.tailAmount2 != "")){

					if((($scope.tailAmount1 != "") && ($scope.tailAmount2 != "") && ($scope.tailOperator == "")) || (($scope.tailAmount1 == "") && ($scope.tailAmount2 != "") && ($scope.tailOperator == ""))){

					}else{
						var data = {
							number: $scope.tailNumber,
							amount1: $scope.tailAmount1,
							operator: $scope.tailOperator,
							amount2: $scope.tailAmount2,
							page: $('.input-page').val(),
							org_id: $('.org-id').attr("org_id"),
							period_id: $('.period-select').val(),
							agent_id: $('.agent-select').val()
						}
						$.ajax({
			                url : '/admin/keyIn/insertTail',
			                type : 'post',
			                data : data,
			                async: false,
			                success : function(response) {
			                    if(response > 0){
			                    	var item = {number: $scope.tailNumber, amount1: $scope.tailAmount1, operator: $scope.tailOperator, amount2: $scope.tailAmount2, id: response};
									getTotal();
									$scope.tailNumber = "";
									$scope.tailOperator = "";
									$scope.tailAmount1 = "";
									$scope.tailAmount2 = "";
									$("input.tail-number").focus();
									if(keyCode == 47){
										$('.tail-table input').attr({"disabled": "disabled"});
										$('.tail-table').addClass("disabled");
										$('.head-tail-table input').attr({"disabled": false});
										$('.head-tail-table').removeClass("disabled");
										$('input.head-tail-number').focus();
									}
									var msg = "Data inserted into Tail successfully";
									notification_msg(msg);
			                    } else {
			                    	var msg = "Failed to insert data into Tail";
									err_msg(msg);
			                    }
			                }
			            });
					}				
				} else {
					last_row = allTailData[allTailData.length - 1];					
					$scope.tailAmount1 = last_row['amount1'];
					$scope.tailOperator = last_row['operator'];
					$scope.tailAmount2 = last_row['amount2'];
				}
			}
		}

		$scope.checkTailNumber = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if($scope.tailNumber != ""){
				
				if($scope.tailNumber.length > $scope.tailPageLength-1) {
	       			e.preventDefault();
	       		};
	       		if(e.keyCode == 13){
	       			if($scope.tailNumber.length != $scope.tailPageLength){
	       				e.preventDefault();
	       			} else {
	       				$("input.tail-amount1").focus();
	       			}
	       		}
			} else {
				if(e.keyCode == 45){
					last_row = allTailData[allTailData.length - 1];
					deleteTail(last_row['id']);
				}else if(e.keyCode == 47){
					if(($scope.tailAmount1 == "") && ($scope.tailOperator == "") && ($scope.tailAmount2 == "")){
						$('.tail-table input').attr({"disabled": "disabled"});
						$('.tail-table').addClass("disabled");
						$('.head-tail-table input').attr({"disabled": false});
						$('.head-tail-table').removeClass("disabled");
						$('input.head-tail-number').focus();
					}
				}
			}
		}

		$scope.checkTailAmount1 = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertTail(e.keyCode);
			}  else if((e.keyCode == 46) || (e.keyCode == 42)){
				$scope.tailOperator = String.fromCharCode(e.keyCode);
				$("input.tail-amount2").focus();
			}
		}	

		$scope.checkTailAmount2 = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertTail(e.keyCode);
			}  
		}

		deleteTail = function(id){
			if(confirm("Do you really want to delete this row?")){
				$.ajax({
	                url : '/admin/keyIn/inputDelete',
	                type : 'post',
	                data : {input_id: id},
	                async: false,
	                success : function(response) {
	                    if(response){
	                    	deleted_row = $filter('filter')(allTailData, {'id': id});
	                    	getTotal();
	                    	$("input.tail-number").focus();
	                    	var msg = "Data is deleted successfully";
							notification_msg(msg);
	                    } else {
	                    	var msg = "You can't delete this row unexpectedly";
							err_msg(msg);
	                    }
	                }
	            });
			}
		}
		//End JS code For Tail Table

		//Start JS Code For HeadTail Table
		showHeadTailPage = function(){
			var length = allHeadTailData.length;
			if(length > 10){
				$scope.headTails = allHeadTailData.slice(Math.max(length - 10, 1));
			}				
		}

		insertHeadTail = function(keyCode){
			if($scope.headTailNumber.length == $scope.headTailPageLength){
				if(($scope.headTailAmount1 != "") || ($scope.headTailAmount2 != "")){

					if((($scope.headTailAmount1 != "") && ($scope.headTailAmount2 != "") && ($scope.headTailOperator == "")) || (($scope.headTailAmount1 == "") && ($scope.headTailAmount2 != "") && ($scope.headTailOperator == ""))){

					}else{
						var data = {
							number: $scope.headTailNumber,
							amount1: $scope.headTailAmount1,
							operator: $scope.headTailOperator,
							amount2: $scope.headTailAmount2,
							page: $('.input-page').val(),
							org_id: $('.org-id').attr("org_id"),
							period_id: $('.period-select').val(),
							agent_id: $('.agent-select').val()
						}
						$.ajax({
			                url : '/admin/keyIn/insertHeadTail',
			                type : 'post',
			                data : data,
			                async: false,
			                success : function(response) {
			                    if(response > 0){
			                    	var item = {number: $scope.headTailNumber, amount1: $scope.headTailAmount1, operator: $scope.headTailOperator, amount2: $scope.headTailAmount2, id: response};
									getTotal();
									$scope.headTailNumber = "";
									$scope.headTailOperator = "";
									$scope.headTailAmount1 = "";
									$scope.headTailAmount2 = "";
									$("input.head-tail-number").focus();
									if(keyCode == 47){
										$('.head-tail-table input').attr({"disabled": "disabled"});
										$('.head-tail-table').addClass("disabled");
										$('.top-table input').attr({"disabled": false});
										$('.top-table').removeClass("disabled");
										$('input.top-number').focus();
									}
									var msg = "Data inserted into Head Tail successfully";
									notification_msg(msg);
			                    } else {
			                    	var msg = "Failed to insert data into Head Tail";
									err_msg(msg);
			                    }
			                }
			            });
					}						
				} else {
					last_row = allHeadTailData[allHeadTailData.length - 1];					
					$scope.headTailAmount1 = last_row['amount1'];
					$scope.headTailOperator = last_row['operator'];
					$scope.headTailAmount2 = last_row['amount2'];
				}
			}
		}

		$scope.checkHeadTailNumber = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if($scope.headTailNumber != ""){
				
				if($scope.headTailNumber.length > $scope.headTailPageLength-1) {
	       			e.preventDefault();
	       		};
	       		if(e.keyCode == 13){
	       			if($scope.headTailNumber.length != $scope.headTailPageLength){
	       				e.preventDefault();
	       			} else {
	       				$("input.head-tail-amount1").focus();
	       			}
	       		}
			} else {
				if(e.keyCode == 45){
					last_row = allHeadTailData[allHeadTailData.length - 1];
					deleteHeadTail(last_row['id']);
				}else if(e.keyCode == 47){
					if(($scope.headTailAmount1 == "") && ($scope.headTailOperator == "") && ($scope.headTailAmount2 == "")){
						$('.head-tail-table input').attr({"disabled": "disabled"});
						$('.head-tail-table').addClass("disabled");
						$('.top-table input').attr({"disabled": false});
						$('.top-table').removeClass("disabled");
						$('input.top-number').focus();
					}
				}
			}
		}

		$scope.checkHeadTailAmount1 = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertHeadTail(e.keyCode);
			}  else if((e.keyCode == 46) || (e.keyCode == 42)){
				$scope.headTailOperator = String.fromCharCode(e.keyCode);
				$("input.head-tail-amount2").focus();
			}
		}	

		$scope.checkHeadTailAmount2 = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertHeadTail(e.keyCode);
			}   
		}

		deleteHeadTail = function(id){
			if(confirm("Do you really want to delete this row?")){
				$.ajax({
	                url : '/admin/keyIn/inputDelete',
	                type : 'post',
	                data : {input_id: id},
	                async: false,
	                success : function(response) {
	                    if(response){
	                    	deleted_row = $filter('filter')(allHeadTailData, {'id': id});
	                    	getTotal();
	                    	$("input.head-tail-number").focus();
	                    	var msg = "Data is deleted successfully";
							notification_msg(msg);
	                    } else {
	                    	var msg = "You can't delete this row unexpectedly";
							err_msg(msg);
	                    }
	                }
	            });
			}
		}
		//End JS code For HeadTail Table

		//Start JS code For Top Table
		showTopPage = function(){
			var length = allTopData.length;
			if(length > 10){
				$scope.tops = allTopData.slice(Math.max(length - 10, 1));
			}
		}

		insertTop = function(keyCode){
			if(($scope.topNumber.length > 0) && ($scope.topNumber.length < $scope.topPageLength + 1)){
				if($scope.topAmount != ""){
					var data = {
						number: $scope.topNumber,
						amount: $scope.topAmount,
						page: $('.input-page').val(),
						org_id: $('.org-id').attr("org_id"),
						period_id: $('.period-select').val(),
						agent_id: $('.agent-select').val()
					}
					$.ajax({
		                url : '/admin/keyIn/insertTop',
		                type : 'post',
		                data : data,
		                async: false,
		                success : function(response) {
		                    if(response > 0){
		                    	var item = {number: $scope.topNumber, amount: $scope.topAmount, id: response};
								getTotal();
								$scope.topNumber = "";								
								$scope.topAmount = "";
								$("input.top-number").focus();
								if(keyCode == 47){
									$('.top-table input').attr({"disabled": "disabled"});
									$('.top-table').addClass("disabled");
									$('.bottom-table input').attr({"disabled": false});
									$('.bottom-table').removeClass("disabled");
									$('input.bottom-number').focus();
								}
								var msg = "Data inserted into Top successfully";
								notification_msg(msg);
		                    } else {
		                    	var msg = "Failed to insert data into Top";
								err_msg(msg);
		                    }
		                }
		            });					
				} else {
					last_row = allTopData[allTopData.length - 1];					
					$scope.topAmount = last_row['amount'];
				}
			}
		}

		$scope.checkTopNumber = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if($scope.topNumber != ""){
				
				if($scope.topNumber.length > $scope.topPageLength-1) {
	       			e.preventDefault();
	       		};
	       		if(e.keyCode == 13){
	       			if($scope.topNumber.length == 0){
	       				e.preventDefault();
	       			} else {
	       				$("input.top-amount").focus();
	       			}
	       		}
			} else {
				if(e.keyCode == 45){
					last_row = allTopData[allTopData.length - 1];
					deleteTop(last_row['id']);
				}else if(e.keyCode == 47){
					if($scope.topAmount == ""){
						$('.top-table input').attr({"disabled": "disabled"});
						$('.top-table').addClass("disabled");
						$('.bottom-table input').attr({"disabled": false});
						$('.bottom-table').removeClass("disabled");
						$('input.bottom-number').focus();
					}
				}
			}
		}

		$scope.checkTopAmount = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertTop(e.keyCode);
			}
		}

		deleteTop = function(id){
			if(confirm("Do you really want to delete this row?")){
				$.ajax({
	                url : '/admin/keyIn/inputDelete',
	                type : 'post',
	                data : {input_id: id},
	                async: false,
	                success : function(response) {
	                    if(response){
	                    	deleted_row = $filter('filter')(allTopData, {'id': id});
	                    	getTotal();
	                    	$("input.top-number").focus();
	                    	var msg = "Data is deleted successfully";
							notification_msg(msg);
	                    } else {
	                    	var msg = "You can't delete this row unexpectedly";
							err_msg(msg);
	                    }
	                }
	            });
			}
		}
		//End JS code For Top Table

		//Start JS code For Top Table
		showBottomPage = function(){
			var length = allBottomData.length;
			if(length > 10){
				$scope.bottoms = allBottomData.slice(Math.max(length - 10, 1));
			}
		}

		insertBottom = function(keyCode){
			if(($scope.bottomNumber.length > 0) && ($scope.bottomNumber.length < $scope.bottomPageLength + 1)){
				if($scope.bottomAmount != ""){
					var data = {
						number: $scope.bottomNumber,
						amount: $scope.bottomAmount,
						page: $('.input-page').val(),
						org_id: $('.org-id').attr("org_id"),
						period_id: $('.period-select').val(),
						agent_id: $('.agent-select').val()
					}
					$.ajax({
		                url : '/admin/keyIn/insertBottom',
		                type : 'post',
		                data : data,
		                async: false,
		                success : function(response) {
		                    if(response > 0){
		                    	var item = {number: $scope.bottomNumber, amount: $scope.bottomAmount, id: response};
								getTotal();
								$scope.bottomNumber = "";								
								$scope.bottomAmount = "";
								$("input.bottom-number").focus();
								if(keyCode == 47){
									$('.bottom-table input').attr({"disabled": "disabled"});
									$('.bottom-table').addClass("disabled");
									$('.top-bottom-table input').attr({"disabled": false});
									$('.top-bottom-table').removeClass("disabled");
									$('input.top-bottom-number').focus();
								}
								var msg = "Data inserted into Bottom successfully";
								notification_msg(msg);
		                    } else {
		                    	var msg = "Failed to insert data into Bottom";
								err_msg(msg);
		                    }
		                }
		            });					
				} else {
					last_row = allBottomData[allBottomData.length - 1];					
					$scope.bottomAmount = last_row['amount'];
				}
			}
		}

		$scope.checkBottomNumber = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if($scope.bottomNumber != ""){
				
				if($scope.bottomNumber.length > $scope.bottomPageLength-1) {
	       			e.preventDefault();
	       		};
	       		if(e.keyCode == 13){
	       			if($scope.bottomNumber.length == 0){
	       				e.preventDefault();
	       			} else {
	       				$("input.bottom-amount").focus();
	       			}
	       		}
			} else {
				if(e.keyCode == 45){
					last_row = allBottomData[allBottomData.length - 1];
					deleteBottom(last_row['id']);
				}else if(e.keyCode == 47){
					if($scope.bottomAmount == ""){
						$('.bottom-table input').attr({"disabled": "disabled"});
						$('.bottom-table').addClass("disabled");
						$('.top-bottom-table input').attr({"disabled": false});
						$('.top-bottom-table').removeClass("disabled");
						$('input.top-bottom-number').focus();
					}
				}
			}
		}

		$scope.checkBottomAmount = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertBottom(e.keyCode);
			}
		}

		deleteBottom = function(id){
			if(confirm("Do you really want to delete this row?")){
				$.ajax({
	                url : '/admin/keyIn/inputDelete',
	                type : 'post',
	                data : {input_id: id},
	                async: false,
	                success : function(response) {
	                    if(response){
	                    	deleted_row = $filter('filter')(allBottomData, {'id': id});
	                    	getTotal();
	                    	$("input.bottom-number").focus();
	                    	var msg = "Data is deleted successfully";
							notification_msg(msg);
	                    } else {
	                    	var msg = "You can't delete this row unexpectedly";
							err_msg(msg);
	                    }
	                }
	            });
			}
		}
		//End JS code For Top Table

		//Start JS code For Top Bottom Table
		showTopBottomPage = function(){
			var length = allTopBottomData.length;
			if(length > 10){
				$scope.topBottoms = allTopBottomData.slice(Math.max(length - 10, 1));
			}
		}

		insertTopBottom = function(keyCode){
			if(($scope.topBottomNumber.length > 0) && ($scope.topBottomNumber.length < $scope.topBottomPageLength + 1)){
				if($scope.topBottomAmount != ""){
					var data = {
						number: $scope.topBottomNumber,
						amount: $scope.topBottomAmount,
						page: $('.input-page').val(),
						org_id: $('.org-id').attr("org_id"),
						period_id: $('.period-select').val(),
						agent_id: $('.agent-select').val()
					}
					$.ajax({
		                url : '/admin/keyIn/insertTopBottom',
		                type : 'post',
		                data : data,
		                async: false,
		                success : function(response) {
		                    if(response > 0){
		                    	var item = {number: $scope.topBottomNumber, amount: $scope.topBottomAmount, id: response};
								getTotal();
								$scope.topBottomNumber = "";								
								$scope.topBottomAmount = "";
								$("input.top-bottom-number").focus();
								if(keyCode == 47){
									$('.top-bottom-table input').attr({"disabled": "disabled"});
									$('.top-bottom-table').addClass("disabled");
									$('.head-table input').attr({"disabled": false});
									$('.head-table').removeClass("disabled");
									$('input.head-number').focus();
								}
								var msg = "Data inserted into Top Bottom successfully";
								notification_msg(msg);
		                    } else {
		                    	var msg = "Failed to insert data into Top Bottom";
								err_msg(msg);
		                    }
		                }
		            });					
				} else {
					last_row = allTopBottomData[allTopBottomData.length - 1];					
					$scope.topBottomAmount = last_row['amount'];
				}
			}
		}

		$scope.checkTopBottomNumber = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if($scope.topBottomNumber != ""){
				
				if($scope.topBottomNumber.length > $scope.topBottomPageLength-1) {
	       			e.preventDefault();
	       		};
	       		if(e.keyCode == 13){
	       			if($scope.topBottomNumber.length == 0){
	       				e.preventDefault();
	       			} else {
	       				$("input.top-bottom-amount").focus();
	       			}
	       		}
			} else {
				if(e.keyCode == 45){
					last_row = allTopBottomData[allTopBottomData.length - 1];
					deleteTopBottom(last_row['id']);
				}else if(e.keyCode == 47){
					if($scope.topBottomAmount == ""){
						$('.top-bottom-table input').attr({"disabled": "disabled"});
						$('.top-bottom-table').addClass("disabled");
						$('.head-table input').attr({"disabled": false});
						$('.head-table').removeClass("disabled");
						$('input.head-number').focus();
					}
				}
			}
		}

		$scope.checkTopBottomAmount = function(e){
			var checked = checkDigit(e.keyCode);
			if(checked == false) e.preventDefault();
			
			if((e.keyCode == 13) || (e.keyCode == 47)){
				insertTopBottom(e.keyCode);
			}
		}

		deleteTopBottom = function(id){
			if(confirm("Do you really want to delete this row?")){
				$.ajax({
	                url : '/admin/keyIn/inputDelete',
	                type : 'post',
	                data : {input_id: id},
	                async: false,
	                success : function(response) {
	                    if(response){
	                    	deleted_row = $filter('filter')(allTopBottomData, {'id': id});
	                    	getTotal();
	                    	$("input.top-bottom-number").focus();
	                    	var msg = "Data is deleted successfully";
							notification_msg(msg);
	                    } else {
	                    	var msg = "You can't delete this row unexpectedly";
							err_msg(msg);
	                    }
	                }
	            });
			}
		}
		//End JS code For Top Bottom Table

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
