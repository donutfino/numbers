<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>กรอกข้อมูล</title>
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
        <link rel="shortcut icon" href="/assets/img/favicon.ico" /> </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed" onload="onLoading()">
        <div class="page-wrapper" ng-controller="ReportController">
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
                            <li class="greetings">สวัสดี, <span><?php echo $this->session->userdata('username'); ?></span>!</li>
                        </ul>                        
                    </div>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">                    
                    <div class="page-sidebar navbar-collapse collapse">                        
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/keyIn" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">กรอกข้อมูล</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">รายงาน</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/admin/reports/threeDigits" class="nav-link">
                                            <span class="title">รายงานเลข 3 ตัว</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="/admin/reports/twoDigits" class="nav-link">
                                            <span class="title">รายงานเลข 2 ตัว</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/reports/log" class="nav-link">
                                            <span class="title">ประวัติ</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">การตั้งค่า</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/admin/settings/numberType" class="nav-link">
                                            <span class="title">ประเภทตัวเลข</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/organization" class="nav-link">
                                            <span class="title">เจ้ามือ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/userManagement" class="nav-link">
                                            <span class="title">การจัดการผู้ใช้งาน</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/agentManagement" class="nav-link">
                                            <span class="title">จัดการหัวหน่วย</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/superAgentManagement" class="nav-link">
                                            <span class="title">การจัดการเจ้ามือ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/periodManagement" class="nav-link">
                                            <span class="title">การจัดการงวด</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/clearPeriodData" class="nav-link">
                                            <span class="title">ลบข้อมูลงวด</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="/login/logout" class="logout nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">ออกจากระบบ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-content-wrapper">
                    <div class="page-content width-1340">
                        <div id="loader"></div>
                        <div id="main-page" class="input-field" style="display:none;">
                            <h2>รายงานเลข 2 ตัว</h2>
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="คุณสามาถขอเพิ่มบัญชีผู้ใช้งานจากหัวน้าแอดมินหรือเจ้าของเว็ปไซต์เพื่อเปลี่ยนจากผู้ใช้งานเป็นแอดมิน">คุณไม่สามารถเข้าถึงได้ โปรดยืนยันว่าคุณเป็นแอดมิน</h3>
                            <?php }else{?>
                            <div class="row org-id" org_id="<?php echo $org_id; ?>">
                               <div class="row">
                                    <div class="col-md-3">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">งวด:</label>
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
                                <div class="inline-block width-330">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onTopSend()" ng-show="topFlag">ส่งยอดรวม</button>                                      
                                    </div>
                                    <div ng-hide="topFlag">
                                        <div class="pull-left">
                                            <button class="btn btn-success confirm-btn" ng-click="onTopConfirm()">ยืนยัน / ปริ้นท์</button>
                                        </div>
                                        <div class="pull-right">
                                            <button class="btn btn-danger cancel-btn" ng-click="onTopCancel()">ยกเลิก</button>
                                        </div>
                                    </div>
                                    <div class="bordered top-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="topSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="topFlag">
                                            <thead class="display-block">
                                                <tr>
                                                    <th colspan="4">บน(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="padding-22" sortable-column="number">เลข</th>
                                                  <th scope="col" class="padding-22" sortable-column="amount">รวม</th>
                                                  <th scope="col" class="padding-25" sortable-column="sent">ส่ง</th>
                                                  <th scope="col" class="padding-25" sortable-column="hold">ถือ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="vertical-scroll" scroll-glue>
                                                <tr ng-repeat="item in tops | orderBy:'-hold' | sortTable: topSortObject" ng-class="{'high-light': item.hold > topLimit}">
                                                    <td class="left-align width-82">{{item.number}}</td>
                                                    <td class="right-align width-82">{{formatAmount(item.amount)}}</td>
                                                    <td class="right-align width-82" ng-class="{'new-sent': item.new}">{{formatAmount(item.sent)}}</td>
                                                    <td class="right-align width-65" ng-class="{'new-sent': item.new}">{{formatAmount(item.hold)}}</td>
                                                </tr>                                                
                                            </tbody>
                                            <tbody class="border-top-none">
                                                <tr>
                                                    <td class="border-top center-align width-82">รวม</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(topAmountTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(topSentTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(topHoldTotal)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">สุทธิ</td>
                                                    <td class="right-align width-82">{{formatAmount(topNet)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จ่าย</td>
                                                    <td class="high-light-weak right-align width-82">{{formatAmount(topRate)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จำกัด</td>
                                                    <td class="high-light-weak right-align width-82"><a data-toggle="modal" data-target="#editTopLimitModal">{{formatAmount(topLimit)}}</a></td>
                                                    <td class="center-align width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table main table-bordered table-hover" sortable-table="topNewSentSortObject" ng-hide="topFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="{{agents.length + 3}}">บน(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="width-110" sortable-column="number">เลข</th>
                                                  <td scope="col" class="width-110" ng-repeat = "agent in agents">{{agent.name}}</td>
                                                  <th scope="col" class="width-110">เกิน</th>
                                                  <th scope="col" class="width-110">ถือ</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in tops | orderBy:'-(amount-sent)' | sortTable: topNewSentSortObject" ng-if="item.hold > topLimit">
                                                    <td class="left-align width-110">{{item.number}}</td>
                                                    <td class="right-align width-110" ng-repeat = "agent in agents" ng-class="{'all-sent':getAgentExceed(item.amount, 'Top') > 0 }">{{getAgentSentFormat(item.amount, $index, "Top")}}</td>
                                                    <td class="right-align width-110">{{getAgentExceedFormat(item.amount, "Top")}}</td>
                                                    <td class="right-align width-110">{{formatAmount(topLimit)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="blocked"></div>
                                <div class="inline-block width-330">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onBottomSend()" ng-show="bottomFlag">ส่งยอดรวม</button>
                                    </div>
                                    <div ng-hide="bottomFlag">
                                        <div class="pull-left">
                                            <button class="btn btn-success confirm-btn" ng-click="onBottomConfirm()">ยืนยัน / ปริ้นท์</button>
                                        </div>
                                        <div class="pull-right">
                                            <button class="btn btn-danger cancel-btn" ng-click="onBottomCancel()">ยกเลิก</button>
                                        </div>
                                    </div>
                                    <div class="bordered bottom-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="bottomSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="bottomFlag">
                                            <thead class="display-block">
                                                <tr>
                                                    <th colspan="4">ล่าง(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="padding-22" sortable-column="number">เลข</th>
                                                  <th scope="col" class="padding-22" sortable-column="amount">รวม</th>
                                                  <th scope="col" class="padding-25" sortable-column="sent">ส่ง</th>
                                                  <th scope="col" class="padding-25" sortable-column="hold">ถือ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="vertical-scroll" scroll-glue>
                                                <tr ng-repeat="item in bottoms | orderBy:'-hold' | sortTable: bottomSortObject" ng-class="{'high-light': item.hold > bottomLimit}">
                                                    <td class="left-align width-82">{{item.number}}</td>
                                                    <td class="right-align width-82">{{formatAmount(item.amount)}}</td>
                                                    <td class="right-align width-82" ng-class="{'new-sent': item.new}">{{formatAmount(item.sent)}}</td>
                                                    <td class="right-align width-65" ng-class="{'new-sent': item.new}">{{formatAmount(item.hold)}}</td>
                                                </tr>                                                
                                            </tbody>
                                            <tbody class="border-top-none">
                                                <tr>
                                                    <td class="border-top center-align width-82">รวม</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(bottomAmountTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(bottomSentTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(bottomHoldTotal)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">สุทธิ</td>
                                                    <td class="right-align width-82">{{formatAmount(bottomNet)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จ่าย</td>
                                                    <td class="high-light-weak right-align width-82">{{formatAmount(bottomRate)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จำกัด</td>
                                                    <td class="high-light-weak right-align width-82"><a data-toggle="modal" data-target="#editBottomLimitModal">{{formatAmount(bottomLimit)}}</a></td>
                                                    <td class="center-align width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table main table-bordered table-hover" sortable-table="bottomNewSentSortObject" ng-hide="bottomFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="{{agents.length + 3}}">ล่าง(00-99)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="width-110" sortable-column="number">เลข</th>
                                                  <td scope="col" class="width-110" ng-repeat = "agent in agents">{{agent.name}}</td>
                                                  <th scope="col" class="width-110">เกิน</th>
                                                  <th scope="col" class="width-110">ถือ</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in bottoms | orderBy:'-(amount-sent)' | sortTable: bottomNewSentSortObject" ng-if="item.hold > bottomLimit">
                                                    <td class="left-align width-110">{{item.number}}</td>
                                                    <td class="right-align width-110" ng-repeat = "agent in agents" ng-class="{'all-sent':getAgentExceed(item.amount, 'Bottom') > 0 }">{{getAgentSentFormat(item.amount, $index, "Bottom")}}</td>
                                                    <td class="right-align width-110">{{getAgentExceedFormat(item.amount, "Bottom")}}</td>
                                                    <td class="right-align width-110">{{formatAmount(bottomLimit)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="blocked"></div>
                                <div class="inline-block width-330">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onTopRunSend()" ng-show="topRunFlag">ส่งยอดรวม</button>
                                    </div>
                                    <div ng-hide="topRunFlag">
                                        <div class="pull-left">
                                            <button class="btn btn-success confirm-btn" ng-click="onTopRunConfirm()">ยืนยัน / ปริ้นท์</button>
                                        </div>
                                        <div class="pull-right">
                                            <button class="btn btn-danger cancel-btn" ng-click="onTopRunCancel()">ยกเลิก</button>
                                        </div>
                                    </div>
                                    <div class="bordered top-run-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="topRunSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="topRunFlag">
                                            <thead class="display-block">
                                                <tr>
                                                    <th colspan="4">วิ่งบน(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="padding-22" sortable-column="number">เลข</th>
                                                  <th scope="col" class="padding-22" sortable-column="amount">รวม</th>
                                                  <th scope="col" class="padding-25" sortable-column="sent">ส่ง</th>
                                                  <th scope="col" class="padding-25" sortable-column="hold">ถือ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="vertical-scroll" scroll-glue>
                                                <tr ng-repeat="item in topRuns | orderBy:'-hold' | sortTable: topRunSortObject" ng-class="{'high-light': item.hold > topRunLimit}">
                                                    <td class="left-align width-82">{{item.number}}</td>
                                                    <td class="right-align width-82">{{formatAmount(item.amount)}}</td>
                                                    <td class="right-align width-82" ng-class="{'new-sent': item.new}">{{formatAmount(item.sent)}}</td>
                                                    <td class="right-align width-65" ng-class="{'new-sent': item.new}">{{formatAmount(item.hold)}}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="border-top-none">
                                                <tr>
                                                    <td class="border-top center-align width-82">รวม</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(topRunAmountTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(topRunSentTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(topRunHoldTotal)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">สุทธิ</td>
                                                    <td class="right-align width-82">{{formatAmount(topRunNet)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จ่าย</td>
                                                    <td class="high-light-weak right-align width-82">{{formatAmount(topRunRate)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จำกัด</td>
                                                    <td class="high-light-weak right-align width-82"><a data-toggle="modal" data-target="#editTopRunLimitModal">{{formatAmount(topRunLimit)}}</a></td>
                                                    <td class="center-align width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table main table-bordered table-hover" sortable-table="topRunNewSentSortObject" ng-hide="topRunFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="{{agents.length + 3}}">วิ่งบน(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="width-110" sortable-column="number">เลข</th>
                                                  <td scope="col" class="width-110" ng-repeat = "agent in agents">{{agent.name}}</td>
                                                  <th scope="col" class="width-110">เกิน</th>
                                                  <th scope="col" class="width-110">ถือ</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in topRuns | orderBy:'-(amount-sent)' | sortTable: topRunNewSentSortObject" ng-if="item.hold > topRunLimit">
                                                    <td class="left-align width-110">{{item.number}}</td>
                                                    <td class="right-align width-110" ng-repeat = "agent in agents" ng-class="{'all-sent':getAgentExceed(item.amount, 'Top Run') > 0 }">{{getAgentSentFormat(item.amount, $index, "Top Run")}}</td>
                                                    <td class="right-align width-110">{{getAgentExceedFormat(item.amount, "Top Run")}}</td>
                                                    <td class="right-align width-110">{{formatAmount(topRunLimit)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="blocked"></div>
                                <div class="inline-block width-330">
                                    <div class="pull-right">
                                        <button class="btn btn-warning send-btn" ng-click="onBottomRunSend()" ng-show="bottomRunFlag">ส่งยอดรวม</button>
                                    </div>
                                    <div ng-hide="bottomRunFlag">
                                        <div class="pull-left">
                                            <button class="btn btn-success confirm-btn" ng-click="onBottomRunConfirm()">ยืนยัน / ปริ้นท์</button>
                                        </div>
                                        <div class="pull-right">
                                            <button class="btn btn-danger cancel-btn" ng-click="onBottomRunCancel()">ยกเลิก</button>
                                        </div>
                                    </div>
                                    <div class="bordered bottom-run-table">                                        
                                        <table class="table main table-bordered table-hover" sortable-table="bottomRunSortObject" sortable-table-options="{ multipleColumns: true }" ng-show="bottomRunFlag">
                                            <thead class="display-block">
                                                <tr>
                                                    <th colspan="4">วิ่งล่าง(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="padding-22" sortable-column="number">เลข</th>
                                                  <th scope="col" class="padding-22" sortable-column="amount">รวม</th>
                                                  <th scope="col" class="padding-25" sortable-column="sent">ส่ง</th>
                                                  <th scope="col" class="padding-25" sortable-column="hold">ถือ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="vertical-scroll" scroll-glue>
                                                <tr ng-repeat="item in bottomRuns | orderBy:'-hold' | sortTable: bottomRunSortObject" ng-class="{'high-light': item.hold > bottomRunLimit}">
                                                    <td class="left-align width-82">{{item.number}}</td>
                                                    <td class="right-align width-82">{{formatAmount(item.amount)}}</td>
                                                    <td class="right-align width-82" ng-class="{'new-sent': item.new}">{{formatAmount(item.sent)}}</td>
                                                    <td class="right-align width-65" ng-class="{'new-sent': item.new}">{{formatAmount(item.hold)}}</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="border-top-none">
                                                <tr>
                                                    <td class="border-top center-align width-82">รวม</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(bottomRunAmountTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(bottomRunSentTotal)}}</td>
                                                    <td class="border-top right-align width-82">{{formatAmount(bottomRunHoldTotal)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">สุทธิ</td>
                                                    <td class="right-align width-82">{{formatAmount(bottomRunNet)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จ่าย</td>
                                                    <td class="high-light-weak right-align width-82">{{formatAmount(bottomRunRate)}}</td>
                                                    <td class="width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                                <tr>
                                                    <td class="center-align width-82">จำกัด</td>
                                                    <td class="high-light-weak right-align width-82"><a data-toggle="modal" data-target="#editBottomRunLimitModal">{{formatAmount(bottomRunLimit)}}</a></td>
                                                    <td class="center-align width-82"></td>
                                                    <td class="width-82"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table main table-bordered table-hover" sortable-table="bottomRunNewSentSortObject" ng-hide="bottomRunFlag">
                                            <thead>
                                                <tr>
                                                    <th colspan="{{agents.length + 3}}">วิ่งล่าง(0-9)</th>
                                                </tr>
                                                <tr>
                                                  <th scope="col" class="width-110" sortable-column="number">เลข</th>
                                                  <td scope="col" class="width-110" ng-repeat = "agent in agents">{{agent.name}}</td>
                                                  <th scope="col" class="width-110">เกิน</th>
                                                  <th scope="col" class="width-110">ถือ</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in bottomRuns | orderBy:'-(amount-sent)' | sortTable: bottomRunNewSentSortObject" ng-if="item.hold > bottomRunLimit">
                                                    <td class="left-align width-110">{{item.number}}</td>
                                                    <td class="right-align width-110" ng-repeat = "agent in agents" ng-class="{'all-sent':getAgentExceed(item.amount, 'Bottom Run') > 0 }">{{getAgentSentFormat(item.amount, $index, "Bottom Run")}}</td>
                                                    <td class="right-align width-110">{{getAgentExceedFormat(item.amount, "Bottom Run")}}</td>
                                                    <td class="right-align width-110">{{formatAmount(bottomRunLimit)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>                            
                            <?php }?>
                        </div>
                        <div id="top-print">
                            <div id="hidden_div" style="display: none;">
                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">บน</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>
                                    <h2 style="text-align: center;">Total</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in tops | orderBy:'-(amount-sent)'" ng-if="item.hold > topLimit" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{formatAmount(item.amount-item.sent-topLimit)}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{formatAmount(topTotalNewSent)}} </span></div>
                                    </div>
                                </div>

                                <div ng-repeat="agent in agents" ng-init="agentNumber = $index" style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">บน</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">{{agent.name}}</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in tops | orderBy:'-(amount-sent)'" ng-if="(item.hold > topLimit) && (getAgentSent(item.amount, agentNumber, 'Top') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentSentFormat(item.amount, agentNumber, "Top")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(agentNumber, "Top")}} </span></div>
                                    </div>                                    
                                </div>

                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">บน</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">เกิน</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in tops | orderBy:'-(amount-sent)'" ng-if="(item.hold > topLimit) && (getAgentExceed(item.amount, 'Top') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentExceedFormat(item.amount, "Top")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat("Top")}} </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bottom-print">
                            <div id="hidden_div" style="display: none;">
                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">ล่าง</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>
                                    <h2 style="text-align: center;">Total</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in bottoms | orderBy:'-(amount-sent)'" ng-if="item.hold > bottomLimit" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{formatAmount(item.amount-item.sent-bottomLimit)}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{formatAmount(bottomTotalNewSent)}} </span></div>
                                    </div>
                                </div>

                                <div ng-repeat="agent in agents" ng-init="agentNumber = $index" style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">ล่าง</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">{{agent.name}}</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in bottoms | orderBy:'-(amount-sent)'" ng-if="(item.hold > bottomLimit) && (getAgentSent(item.amount, agentNumber, 'Bottom') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentSentFormat(item.amount, agentNumber, "Bottom")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(agentNumber, "Bottom")}} </span></div>
                                    </div>                                    
                                </div>

                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">ล่าง</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">เกิน</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in bottoms | orderBy:'-(amount-sent)'" ng-if="(item.hold > bottomLimit) && (getAgentExceed(item.amount, 'Bottom') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentExceedFormat(item.amount, "Bottom")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat("Bottom")}} </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="top-run-print">
                            <div id="hidden_div" style="display: none;">
                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">วิ่งบน</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>
                                    <h2 style="text-align: center;">Total</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in topRuns | orderBy:'-(amount-sent)'" ng-if="item.hold > topRunLimit" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{formatAmount(item.amount-item.sent-topRunLimit)}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{formatAmount(topRunTotalNewSent)}} </span></div>
                                    </div>
                                </div>

                                <div ng-repeat="agent in agents" ng-init="agentNumber = $index" style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">วิ่งบน</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">{{agent.name}}</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in topRuns | orderBy:'-(amount-sent)'" ng-if="(item.hold > topRunLimit) && (getAgentSent(item.amount, agentNumber, 'Top Run') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentSentFormat(item.amount, agentNumber, "Top Run")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(agentNumber, "Top Run")}} </span></div>
                                    </div>                                    
                                </div>

                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">วิ่งบน</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">เกิน</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in topRuns | orderBy:'-(amount-sent)'" ng-if="(item.hold > topRunLimit) && (getAgentExceed(item.amount, 'Top Run') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentExceedFormat(item.amount, "Top Run")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat("Top Run")}} </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bottom-run-print">
                            <div id="hidden_div" style="display: none;">
                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">วิ่งล่าง</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>
                                    <h2 style="text-align: center;">Total</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in bottomRuns | orderBy:'-(amount-sent)'" ng-if="item.hold > bottomRunLimit" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{formatAmount(item.amount-item.sent-bottomRunLimit)}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{formatAmount(bottomRunTotalNewSent)}} </span></div>
                                    </div>
                                </div>

                                <div ng-repeat="agent in agents" ng-init="agentNumber = $index" style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">วิ่งล่าง</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">{{agent.name}}</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in bottomRuns | orderBy:'-(amount-sent)'" ng-if="(item.hold > bottomRunLimit) && (getAgentSent(item.amount, agentNumber, 'Bottom Run') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentSentFormat(item.amount, agentNumber, "Bottom Run")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(agentNumber, "Bottom Run")}} </span></div>
                                    </div>                                    
                                </div>

                                <div style="display: block; page-break-before: always;">
                                    <div style="height: 40px;">
                                        <h2 style="text-align: center;">วิ่งล่าง</h2>
                                        <h2 style="float: right; margin-top: -45px;">{{period}}</h2>
                                    </div>                                    
                                    <h2 style="text-align: center;">เกิน</h2>
                                    <div style="margin:20px 0px 10px 0px; border-top: solid 1px #000;"></div>
                                    <ul style="min-height:78vh;list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                        <li ng-repeat="item in bottomRuns | orderBy:'-(amount-sent)'" ng-if="(item.hold > bottomRunLimit) && (getAgentExceed(item.amount, 'Bottom Run') > 0)" style="padding-bottom: 12px;">
                                            <span>{{item.number}}</span>
                                            <span> = </span>
                                            <span>{{getAgentExceedFormat(item.amount, "Bottom Run")}}</span> 
                                        </li>
                                    </ul>
                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="width: 25%; display: inline-block !important;"></div>
                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat("Bottom Run")}} </span></div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modals">
                    <div id="editTopLimitModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">แอดมิน แก้ไข</h3>
                          </div>
                          <div class="modal-body">
                            <div class="content">
                                <form class="edit-limit-form" method="post">
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">จำกัด</label>
                                        <div class="input-icon">
                                            <i class="fa fa-level-up"></i>
                                            <input class="form-control placeholder-no-fix center-align" type="number" min="0" placeholder="จำกัด" name="limit" value="{{topLimit}}" /> </div>
                                    </div>
                                    
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">เจ้ามือ</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="เจ้ามือ" name="org_id" readonly value="<?php echo $org_id;?>" /> </div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">ประเภท</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="ประเภท" name="type" readonly value="Top" /> </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="close_modal btn btn-danger pull-left" data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn green pull-right"> บันทึก </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="editBottomLimitModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">แอดมิน แก้ไข</h3>
                          </div>
                          <div class="modal-body">
                            <div class="content">
                                <form class="edit-limit-form" method="post">
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">จำกัด</label>
                                        <div class="input-icon">
                                            <i class="fa fa-level-up"></i>
                                            <input class="form-control placeholder-no-fix center-align" type="number" min="0" placeholder="จำกัด" name="limit" value="{{bottomLimit}}" /> </div>
                                    </div>
                                    
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">เจ้ามือ</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="เจ้ามือ" name="org_id" readonly value="<?php echo $org_id;?>" /> </div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">ประเภท</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="ประเภท" name="type" readonly value="Bottom" /> </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="close_modal btn btn-danger pull-left" data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn green pull-right"> บันทึก </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="editTopRunLimitModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">แอดมิน แก้ไข</h3>
                          </div>
                          <div class="modal-body">
                            <div class="content">
                                <form class="edit-limit-form" method="post">
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">จำกัด</label>
                                        <div class="input-icon">
                                            <i class="fa fa-level-up"></i>
                                            <input class="form-control placeholder-no-fix center-align" type="number" min="0" placeholder="จำกัด" name="limit" value="{{topRunLimit}}" /> </div>
                                    </div>
                                    
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">เจ้ามือ</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="เจ้ามือ" name="org_id" readonly value="<?php echo $org_id;?>" /> </div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">ประเภท</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="ประเภท" name="type" readonly value="Top Run" /> </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="close_modal btn btn-danger pull-left" data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn green pull-right"> บันทึก </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="editBottomRunLimitModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">แอดมิน แก้ไข</h3>
                          </div>
                          <div class="modal-body">
                            <div class="content">
                                <form class="edit-limit-form" method="post">
                                    <div class="form-group">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">จำกัด</label>
                                        <div class="input-icon">
                                            <i class="fa fa-level-up"></i>
                                            <input class="form-control placeholder-no-fix center-align" type="number" min="0" placeholder="จำกัด" name="limit" value="{{bottomRunLimit}}" /> </div>
                                    </div>
                                    
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">เจ้ามือ</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="เจ้ามือ" name="org_id" readonly value="<?php echo $org_id;?>" /> </div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                        <label class="control-label visible-ie8 visible-ie9">ประเภท</label>
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="ประเภท" name="type" readonly value="Bottom Run" /> </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="close_modal btn btn-danger pull-left" data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn green pull-right"> บันทึก </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date('Y');?> &copy; All rights reserved
                </div>
                <div class="scroll-to-top">
                    <i class="fa fa-arrow-up"></i>
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
        <script type="text/javascript">
            <?php
                $toast =  $this->session->flashdata('toast');
                
                if ($toast != null && $toast['state'] == true) {
            ?>
                var shortCutFunction = "success";
                var msg = "<?php echo $toast['msg'] ?>";
                var title = "แจ้งเตือน";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated rubberBand');

            <?php } else if (($toast != null) && ($toast['state'] == false)) { ?>

                var shortCutFunction = "error";
                var msg = "<?php echo $toast['msg'] ?>";
                var title = "เกิดข้อผิดพลาด";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated shake');
                
            <?php } ?>
        </script>
    </body>
</html>