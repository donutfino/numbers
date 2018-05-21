<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Data Entry</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />        
        <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/styles/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/styles/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/assets/styles/custom.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo"> 
                    </div>
                    <!-- END LOGO -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="greetings">Hi, <span class="red"><?php echo $this->session->userdata('username'); ?></span>!</li>
                            <li><a href="/login/logout" class="logout">Log out</a></li>
                        </ul>                        
                    </div>
                </div>
                <!-- END HEADER INNER -->
            </div>
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-content margin-left-0">
                        <div class="input-field" ng-controller="InputController">
                            <h2>Data Entry</h2>
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="You can ask a SUPER ADMIN/GOD to add your 'user_id' into the 'admin_id' field in organization which you are going to work on as admin.">You have no organization to access. Please make sure there's an organization you are included as admin.</h3>
                            <?php }else{?>
                            <div class="row org-id" org_id="<?php echo $org_id; ?>">
                               <div class="row">
                                    <div class="col-md-2">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Peorid:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control inline-block period-select" onchange="getTotal()">
                                                            <?php foreach ($periods as $key => $period) :?>
                                                                <option value="<?=$period->period_id?>"><?=$period->period?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Agent:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control inline-block agent-select" onchange="getTotal()">
                                                            <?php foreach ($agents as $key => $agent) :?>
                                                                <option value="<?=$agent->agent_id?>"><?=$agent->agent_name?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>                                    
                                    </div>
                                    <div class="col-md-2">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Page:</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="center input-page form-control" value="1" oninput="getTotal()">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Page Total:</label>
                                                    <div class="col-md-6">
                                                        <input type="type" class="center form-control red" value="{{pageTotal}}" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Grand Total:</label>
                                                    <div class="col-md-3">
                                                        <input type="type" class="center form-control red" value="{{grandTotal}}" disabled="true">
                                                    </div>
                                                    <label class="col-md-1 control-label">of</label>
                                                    <div class="col-md-4">
                                                        <input type="type" class="center form-control red" value="{{credit}}" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="height-10"></div>
                            <div class="margin-left-30">
                                <div class="bordered head-table">
                                    <table class="table main table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Head</th>
                                            </tr>
                                            <tr>
                                              <th scope="col">Number</th>
                                              <th scope="col">Amount1</th>
                                              <th scope="col">Op</th>
                                              <th scope="col">Amount2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in heads">
                                                <td>{{item.number}}</td>
                                                <td>{{item.amount1}}</td>
                                                <td>{{item.operator}}</td>
                                                <td>{{item.amount2}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr class="empty">
                                                <td><input type="text" class="form-control head-number" ng-model="headNumber" ng-keypress="checkHeadNumber($event)"></td>
                                                <td><input type="text" class="form-control head-amount1" ng-model="headAmount1" ng-keypress="checkHeadAmount1($event)"></td>
                                                <td ng-bind="headOperator"></td>
                                                <td><input type="text" class="form-control head-amount2" ng-model="headAmount2" ng-keypress="checkHeadAmount2($event)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="blocked"></div>
                                <div class="bordered tail-table disabled">
                                    <table class="table main table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Tail</th>
                                            </tr>
                                            <tr>
                                              <th scope="col">Number</th>
                                              <th scope="col">Amount1</th>
                                              <th scope="col">Op</th>
                                              <th scope="col">Amount2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in tails">
                                                <td>{{item.number}}</td>
                                                <td>{{item.amount1}}</td>
                                                <td>{{item.operator}}</td>
                                                <td>{{item.amount2}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr class="empty">
                                                <td><input type="text" class="form-control tail-number" ng-model="tailNumber" ng-keypress="checkTailNumber($event)"></td>
                                                <td><input type="text" class="form-control tail-amount1" ng-model="tailAmount1" ng-keypress="checkTailAmount1($event)"></td>
                                                <td ng-bind="tailOperator"></td>
                                                <td><input type="text" class="form-control tail-amount2" ng-model="tailAmount2" ng-keypress="checkTailAmount2($event)"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="blocked"></div>
                                <div class="bordered head-tail-table disabled">
                                    <table class="table main table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Head Tail</th>
                                            </tr>
                                            <tr>
                                              <th scope="col">Number</th>
                                              <th scope="col">Amount1</th>
                                              <th scope="col">Op</th>
                                              <th scope="col">Amount2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in headTails">
                                                <td>{{item.number}}</td>
                                                <td>{{item.amount1}}</td>
                                                <td>{{item.operator}}</td>
                                                <td>{{item.amount2}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr class="empty">
                                                <td><input type="text" class="form-control head-tail-number" ng-model="headTailNumber" ng-keypress="checkHeadTailNumber($event)"></td>
                                                <td><input type="text" class="form-control head-tail-amount1" ng-model="headTailAmount1" ng-keypress="checkHeadTailAmount1($event)"></td>
                                                <td ng-bind="headTailOperator"></td>
                                                <td><input type="text" class="form-control head-tail-amount2" ng-model="headTailAmount2" ng-keypress="checkHeadTailAmount2($event)"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="blocked"></div>
                                <div class="bordered top-table disabled">
                                    <table class="table main table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Top</th>
                                            </tr>
                                            <tr>
                                              <th scope="col">Number</th>
                                              <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in tops">
                                                <td>{{item.number}}</td>
                                                <td>{{item.amount}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr class="empty">
                                                <td><input type="text" class="form-control top-number" ng-model="topNumber" ng-keypress="checkTopNumber($event)"></td>
                                                <td><input type="text" class="form-control top-amount" ng-model="topAmount" ng-keypress="checkTopAmount($event)"></td>                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="blocked"></div>
                                <div class="bordered bottom-table disabled">
                                    <table class="table main table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Bottom</th>
                                            </tr>
                                            <tr>
                                              <th scope="col">Number</th>
                                              <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in bottoms">
                                                <td>{{item.number}}</td>
                                                <td>{{item.amount}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr class="empty">
                                                <td><input type="text" class="form-control bottom-number" ng-model="bottomNumber" ng-keypress="checkBottomNumber($event)"></td>
                                                <td><input type="text" class="form-control bottom-amount" ng-model="bottomAmount" ng-keypress="checkBottomAmount($event)"></td>                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="blocked"></div>
                                <div class="bordered top-bottom-table disabled">
                                    <table class="table main table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Top Bottom</th>
                                            </tr>
                                            <tr>
                                              <th scope="col">Number</th>
                                              <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in topBottoms">
                                                <td>{{item.number}}</td>
                                                <td>{{item.amount}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr class="empty">
                                                <td><input type="text" class="form-control top-bottom-number" ng-model="topBottomNumber" ng-keypress="checkTopBottomNumber($event)"></td>
                                                <td><input type="text" class="form-control top-bottom-amount" ng-model="topBottomAmount" ng-keypress="checkTopBottomAmount($event)"></td>                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> 2018 &copy; All rights reserved
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
        <script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
        <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="/assets/scripts/layout.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/assets/scripts/angular.min.js"></script>
        <script src="/assets/scripts/keyIn.js" type="text/javascript"></script>
    </body>
</html>