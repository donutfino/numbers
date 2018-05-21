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

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" onload="onLoading()">
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">                        
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>

                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="greetings">Hi, <span class="red"><?php echo $this->session->userdata('username'); ?></span>!</li>
                            <li><a href="/login/logout" class="logout">Log out</a></li>
                        </ul>                        
                    </div>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">                    
                    <div class="page-sidebar navbar-collapse collapse">                        
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/keyIn" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Key In</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="/admin/report" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">Settings</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/admin/settings/numberType" class="nav-link ">
                                            <span class="title">Number Type</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/organization" class="nav-link ">
                                            <span class="title">Organization</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/userManagement" class="nav-link ">
                                            <span class="title">User Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/agentManagement" class="nav-link ">
                                            <span class="title">Agent Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/periodManagement" class="nav-link ">
                                            <span class="title">Period Management</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-content-wrapper" ng-controller="ReportController">
                    <div class="page-content width-1300">
                        <div id="loader"></div>
                        <div id="main-page" class="input-field" style="display:none;">
                            <h2>Report</h2>
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="You can ask a SUPER ADMIN/GOD to add your 'user_id' into the 'admin_id' field in organization which you are going to work on as admin.">You have no organization to access. Please make sure there's an organization you are included as admin.</h3>
                            <?php }else{?>
                            <div class="row org-id" org_id="<?php echo $org_id; ?>">
                               <div class="row">
                                    <div class="col-md-3">                                    
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
                                </div>
                            </div>
                            
                            <div class="height-10"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onHeadSend()" ng-show="headFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onHeadConfirm()" ng-hide="headFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered head-table">
                                        <table class="table main table-bordered table-hover" sortable-table="headSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="headFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Head(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in heads | sortTable: headSortObject" ng-class="{'high-light': item.hold > headLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{headAmountTotal}}</td>
                                                    <td class="border-top">{{headSentTotal}}</td>
                                                    <td class="border-top">{{headHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{headNet}}</td>
                                                    <td>{{headSent}}</td>
                                                    <td>{{headHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{headRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{headLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="head-print" class="table main table-bordered table-hover" sortable-table="headNewSentSortObject" ng-hide="headFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Head(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in heads | sortTable: headNewSentSortObject" ng-if="item.hold > headLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-headLimit}}</td>
                                                    <td>{{headLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onTailSend()" ng-show="tailFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onTailConfirm()" ng-hide="tailFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered tail-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="tailSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="tailFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Tail(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tails | sortTable: tailSortObject" ng-class="{'high-light': item.hold > tailLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{tailAmountTotal}}</td>
                                                    <td class="border-top">{{tailSentTotal}}</td>
                                                    <td class="border-top">{{tailHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{tailNet}}</td>
                                                    <td>{{tailSent}}</td>
                                                    <td>{{tailHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{tailRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{tailLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="tail-print" class="table main table-bordered table-hover" sortable-table="tailNewSentSortObject" ng-hide="tailFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Tail(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tails | sortTable: tailNewSentSortObject" ng-if="item.hold > tailLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-tailLimit}}</td>
                                                    <td>{{tailLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onHeadSpecialSend()" ng-show="headSpecialFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onHeadSpecialConfirm()" ng-hide="headSpecialFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered head-special-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="headSpecialSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="headSpecialFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Head Special(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in headSpecials | sortTable: headSpecialSortObject" ng-class="{'high-light': item.hold > headSpecialLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>                                                   
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{headSpecialAmountTotal}}</td>
                                                    <td class="border-top">{{headSpecialSentTotal}}</td>
                                                    <td class="border-top">{{headSpecialHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{headSpecialNet}}</td>
                                                    <td>{{headSpecialSent}}</td>
                                                    <td>{{headSpecialHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{headSpecialRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{headSpecialLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="head-special-print" class="table main table-bordered table-hover" sortable-table="headSpecialNewSentSortObject" ng-hide="headSpecialFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Head Special(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in headSpecials | sortTable: headSpecialNewSentSortObject" ng-if="item.hold > headSpecialLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-headSpecialLimit}}</td>
                                                    <td>{{headSpecialLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onTailSpecialSend()" ng-show="tailSpecialFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onTailSpecialConfirm()" ng-hide="tailSpecialFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered tail-special-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="tailSpecialSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="tailSpecialFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Tail Special(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tailSpecials | sortTable: tailSpecialSortObject" ng-class="{'high-light': item.hold > tailSpecialLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{tailSpecialAmountTotal}}</td>
                                                    <td class="border-top">{{tailSpecialSentTotal}}</td>
                                                    <td class="border-top">{{tailSpecialHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{tailSpecialNet}}</td>
                                                    <td>{{tailSpecialSent}}</td>
                                                    <td>{{tailSpecialHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{tailSpecialRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{tailSpecialLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="tail-special-print" class="table main table-bordered table-hover" sortable-table="tailSpecialNewSentSortObject" ng-hide="tailSpecialFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Tail Special(000-999)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tailSpecials | sortTable: tailSpecialNewSentSortObject" ng-if="item.hold > tailSpecialLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-tailSpecialLimit}}</td>
                                                    <td>{{tailSpecialLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="height-30"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onTopSend()" ng-show="topFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onTopConfirm()" ng-hide="topFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered top-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="topSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="topFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Top(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tops | sortTable: topSortObject" ng-class="{'high-light': item.hold > topLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{topAmountTotal}}</td>
                                                    <td class="border-top">{{topSentTotal}}</td>
                                                    <td class="border-top">{{topHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{topNet}}</td>
                                                    <td>{{topSent}}</td>
                                                    <td>{{topHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{topRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{topLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="top-print" class="table main table-bordered table-hover" sortable-table="topNewSentSortObject" ng-hide="topFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Top(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tops | sortTable: topNewSentSortObject" ng-if="item.hold > topLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-topLimit}}</td>
                                                    <td>{{topLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onBottomSend()" ng-show="bottomFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onBottomConfirm()" ng-hide="bottomFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered bottom-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="bottomSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="bottomFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Bottom(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in bottoms | sortTable: bottomSortObject" ng-class="{'high-light': item.hold > bottomLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{bottomAmountTotal}}</td>
                                                    <td class="border-top">{{bottomSentTotal}}</td>
                                                    <td class="border-top">{{bottomHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{bottomNet}}</td>
                                                    <td>{{bottomSent}}</td>
                                                    <td>{{bottomHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{bottomRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{bottomLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="bottom-print" class="table main table-bordered table-hover" sortable-table="bottomNewSentSortObject" ng-hide="bottomFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Bottom(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in bottoms | sortTable: bottomNewSentSortObject" ng-if="item.hold > bottomLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-bottomLimit}}</td>
                                                    <td>{{bottomLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onTopRunSend()" ng-show="topRunFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onTopRunConfirm()" ng-hide="topRunFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered top-run-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="topRunSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="topRunFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Top Run(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in topRuns | sortTable: topRunSortObject" ng-class="{'high-light': item.hold > topRunLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{topRunAmountTotal}}</td>
                                                    <td class="border-top">{{topRunSentTotal}}</td>
                                                    <td class="border-top">{{topRunHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{topRunNet}}</td>
                                                    <td>{{topRunSent}}</td>
                                                    <td>{{topRunHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{topRunRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{topRunLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="top-run-print" class="table main table-bordered table-hover" sortable-table="topRunNewSentSortObject" ng-hide="topRunFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Top Run(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in topRuns | sortTable: topRunNewSentSortObject" ng-if="item.hold > topRunLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-topRunLimit}}</td>
                                                    <td>{{topRunLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onBottomRunSend()" ng-show="bottomRunFlag">Send Amount</button>
                                        <button class="btn btn-success confirm-btn" ng-click="onBottomRunConfirm()" ng-hide="bottomRunFlag">Confirm / Print</button>
                                    </div>
                                    <div class="bordered bottom-run-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="bottomRunSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="bottomRunFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Bottom Run(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col" sortable-column="amount">Amount</th>
                                                  <th scope="col" sortable-column="sent">Sent</th>
                                                  <th scope="col" sortable-column="hold">Hold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in bottomRuns | sortTable: bottomRunSortObject" ng-class="{'high-light': item.hold > bottomRunLimit}">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.sent}}</td>
                                                    <td ng-class="{'new-sent': item.new}">{{item.hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-top">Total</td>
                                                    <td class="border-top">{{bottomRunAmountTotal}}</td>
                                                    <td class="border-top">{{bottomRunSentTotal}}</td>
                                                    <td class="border-top">{{bottomRunHoldTotal}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Net</td>
                                                    <td>{{bottomRunNet}}</td>
                                                    <td>{{bottomRunSent}}</td>
                                                    <td>{{bottomRunHold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Rate</td>
                                                    <td class="high-light-weak">{{bottomRunRate}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Limit</td>
                                                    <td class="high-light-weak">{{bottomRunLimit}}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table id="bottom-run-print" class="table main table-bordered table-hover" sortable-table="bottomRunNewSentSortObject" ng-hide="bottomRunFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Bottom Run(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" sortable-column="number">Number</th>
                                                  <th scope="col">New Sent</th>
                                                  <th scope="col">Hold</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in bottomRuns | sortTable: bottomRunNewSentSortObject" ng-if="item.hold > bottomRunLimit">
                                                    <td>{{item.number}}</td>
                                                    <td>{{item.amount-item.sent-bottomRunLimit}}</td>
                                                    <td>{{bottomRunLimit}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
        <script src="/assets/scripts/admin/report.js" type="text/javascript"></script>
        <script src="/assets/scripts/admin/dataTables.js" type="text/javascript"></script>
        <script type="text/javascript">
            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("main-page").style.display = "block";
            }

            var myVar;

            function onLoading() {
                myVar = setTimeout(showPage, 1000);
            }
        </script>
    </body>
</html>