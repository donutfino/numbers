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
        <div class="page-wrapper" ng-controller="LogController">
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
                                    <li class="nav-item">
                                        <a href="/admin/reports/twoDigits" class="nav-link">
                                            <span class="title">รายงานเลข 2 ตัว</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
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
                    <div class="page-content width-1300">
                        <div id="loader"></div>
                        <div id="main-page" class="input-field" style="display:none;">
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="คุณสามาถขอเพิ่มบัญชีผู้ใช้งานจากหัวน้าแอดมินหรือเจ้าของเว็ปไซต์เพื่อเปลี่ยนจากผู้ใช้งานเป็นแอดมิน">คุณไม่สามารถเข้าถึงได้ โปรดยืนยันว่าคุณเป็นแอดมิน</h3>
                            <?php }else{?>
                            <div class="row org-id" org_id="<?php echo $org_id; ?>">
                                <div class="portlet light">
                                    <h2>ประวัติ</h2>
                                    <div class="portlet-body">
                                        <ul class="nav nav-tabs">
                                            <li ng-repeat="period in periods" ng-class="{'active': $index == 0}">
                                                <a href="#{{'tab_1_'+$index}}" data-toggle="tab"> {{period.period}} </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade in" ng-repeat="period in periods" ng-class="{'active': $index == 0}" id="{{'tab_1_'+$index}}">
                                                <div class="portlet box yellow">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gift"></i>{{period.period}}</div>
                                                    </div>                                    
                                                    <div class="portlet-body" style="display: block;">
                                                        <div class="panel-group accordion" id="accordion3">
                                                            <div ng-repeat="depth in depths" ng-if="depth.period_id == period.period_id">
                                                                <div ng-if="depth.depth != '0'">
                                                                    <div class="panel panel-default" ng-repeat="order in orders" ng-if="positive(order, depth.depth)">                                                                
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#{{'collapse_'+period.period_id+'_'+$index}}" aria-expanded="false">{{order}}</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="{{'collapse_'+period.period_id+'_'+$index}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                            <div class="panel-body">
                                                                                <div class="head" ng-if = "getExistance(period.period_id, order, 'Head') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">หัว</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Head")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in heads | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Head", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in heads | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Head') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Head")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Head")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in heads | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Head') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Head")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Head")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>                                                                                
                                                                                <div class="tail" ng-if = "getExistance(period.period_id, order, 'Tail') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">ท้าย</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Tail")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in tails | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Tail", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in tails | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Tail') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Tail")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Tail")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in tails | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Tail') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Tail")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Tail")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                                <div class="headspecial" ng-if = "getExistance(period.period_id, order, 'Head Special') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">โต๊ดหัว</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Head Special")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in headSpecials | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Head Special", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in headSpecials | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Head Special') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Head Special")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Head Special")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in headSpecials | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Head') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Head Special")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Head Special")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                                <div class="tailspecial" ng-if = "getExistance(period.period_id, order, 'Tail Special') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">โต๊ดท้าย</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Tail Special")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in tailSpecials | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Tail Special", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in tailSpecials | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Tail Special') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Tail Special")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Tail Special")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in tailSpecials | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Tail Special') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Tail Special")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Tail Special")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                                <div class="top" ng-if = "getExistance(period.period_id, order, 'Top') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">บน</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Top")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in tops | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Top", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in tops | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Top') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Top")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Top")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in tops | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Top') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Top")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Top")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                                <div class="bottom" ng-if = "getExistance(period.period_id, order, 'Bottom') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">ล่าง</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Bottom")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in bottoms | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Bottom", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in bottoms | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Bottom') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Bottom")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Bottom")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in bottoms | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Bottom') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Bottom")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Bottom")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                                <div class="toprun" ng-if = "getExistance(period.period_id, order, 'Top Run') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">วิ่งบน</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Top Run")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in topRuns | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Top Run", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in topRuns | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Top Run') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Top Run")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Top Run")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in topRuns | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Top Run') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Top Run")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Top Run")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                                <div class="bottomrun" ng-if = "getExistance(period.period_id, order, 'Bottom Run') > 0">                                                                    
                                                                                    <div style="height: 40px;">
                                                                                        <h2 style="float: left;">วิ่งล่าง</h2>
                                                                                        <h2 style="float: right;">{{getSendTime(period.period_id, order, "Bottom Run")}}</h2>
                                                                                    </div>
                                                                                    <h2 style="text-align: center;">Total</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in bottomRuns | orderBy:'-(new_sent)'" ng-if="(item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{formatAmount(item.new_sent)}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalNewSentFormat(period.period_id, "Bottom Run", order)}} </span></div>
                                                                                    </div>

                                                                                    <div ng-repeat="agent in agents" ng-init="agentNumber = $index">
                                                                                        <h2 style="text-align: center;">{{agent.name}}</h2>
                                                                                        
                                                                                        <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                            <li ng-repeat="item in bottomRuns | orderBy:'-(new_sent)'" ng-if="(getAgentSent(item.amount-item.hold, agentNumber, 'Bottom Run') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                                <span>{{item.number}}</span>
                                                                                                <span> = </span>
                                                                                                <span>{{getAgentSentFormat(item.amount-item.hold, agentNumber, "Bottom Run")}}</span> 
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="width: 25%; display: inline-block !important;"></div>
                                                                                            <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalAgentSentFormat(period.period_id, order, agentNumber, "Bottom Run")}} </span></div>
                                                                                        </div>                                    
                                                                                    </div>

                                                                                    <h2 style="text-align: center;">เกิน</h2>
                                                                                    
                                                                                    <ul style="list-style-type: none;font-family:TAHOMA;font-size:24px;-webkit-columns: 4;-moz-columns: 4;columns: 4;-moz-column-fill: auto;column-fill: auto;">
                                                                                        <li ng-repeat="item in bottomRuns | orderBy:'-(new_sent)'" ng-if="(getAgentExceed(item.amount-item.hold, 'Bottom Run') > 0) && (item.period_id == period.period_id) && (item.depth == order)" style="padding-bottom: 12px;">
                                                                                            <span>{{item.number}}</span>
                                                                                            <span> = </span>
                                                                                            <span>{{getAgentExceedFormat(item.amount-item.hold, "Bottom Run")}}</span> 
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div style="margin-top:10px; border-top: solid 1px #000; border-bottom: solid 1px #000;">
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="width: 25%; display: inline-block !important;"></div>
                                                                                        <div style="font-family:TAHOMA;font-size:24px;width: 20%; display: inline-block !important; padding:5px 0px 4px 0px;"><span style="padding:5px; border-right:1px solid #000;">รวม</span><span style="padding-left: 10px">{{getTotalExceedFormat(period.period_id, order, "Bottom Run")}} </span></div>
                                                                                    </div>
                                                                                    <div style="margin:20px 0px 10px 0px; border-top: solid 3px #3598dc;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div ng-if="depth.depth == '0'">
                                                                    <h3 class="center-align">No History</h3>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                           
                            <?php }?>
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
        <script src="/assets/scripts/admin/log.js" type="text/javascript"></script>
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