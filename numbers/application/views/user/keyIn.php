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

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" onload="onLoading()">
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
                            <li class="greetings">สวัสดี, <span><?php echo $this->session->userdata('username'); ?></span>!</li>
                            <li><a href="/login/logout" class="logout">ออกจากระบบ</a></li>
                        </ul>                        
                    </div>
                </div>
                <!-- END HEADER INNER -->
            </div>
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-content width-1320 margin-left-15">
                        <div id="loader"></div>
                        <div id="main-page" class="input-field" ng-controller="InputController">
                            <div class="row margin-bottom-30">
                                <div class="col-md-6">
                                    <h2>กรอกข้อมูล</h2>
                                </div>
                                <?php if($org_id != -1){?>
                                <div class="col-md-6 margin-top-25">
                                    <button class="btn btn-info pull-right" ng-click="deleteAllDataUser()">ลบข้อมูล</button>
                                </div>
                                <?php }?>
                            </div>
                            <?php if($org_id == -1){?>
                            <h3 class="alert">คุณไม่สามารถเข้าถึงได้ โปรดยืนยันว่าคุณเป็นผู้ใช้งาน</h3>
                            <?php }else{?>
                            <div class="row org-id" org_id="<?php echo $org_id; ?>">
                               <div class="row">
                                    <div class="col-md-2">                                    
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
                                    <div class="col-md-2">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">หัวหน่วย:</label>
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
                                                    <label class="col-md-5 control-label">หน้า:</label>
                                                    <div class="col-md-7">
                                                        <input type="number" min="1" class="right-align input-page form-control" value="1" oninput="getTotal()" ng-keypress="checkInputPage($event)">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">รวมหน้า:</label>
                                                    <div class="col-md-6">
                                                        <input type="type" class="right-align form-control red" value="{{formatAmount(pageTotal)}}" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">                                    
                                        <form class="form-horizontal" role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">รวมทั้งหมด:</label>
                                                    <div class="col-md-4">
                                                        <input type="type" class="right-align form-control red" value="{{formatAmount(grandTotal)}}" disabled="true">
                                                    </div>
                                                    <label class="col-md-1 control-label">ของ</label>
                                                    <div class="col-md-4">
                                                        <input type="type" class="right-align form-control red" value="{{formatAmount(credit)}}" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="height-10"></div>
                            <div class="bordered head-table">
                                <table class="table main table-bordered">
                                    <thead class="display-block">
                                        <tr>
                                            <th colspan="4">หัว</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" class="width-78" style="padding-right: 12px; padding-left: 12px;">เลข</th>
                                          <th scope="col" class="width-78">บาท</th>
                                          <th scope="col" class="width-37">*</th>
                                          <th scope="col" class="width-78">บาท</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vertical-scroll" scroll-glue>
                                        <tr ng-repeat="item in heads" ng-dblclick="deleteHead(item.id)">
                                            <td class="left-align width-78">{{item.number}}</td>
                                            <td class="right-align width-78">{{formatAmount(item.amount1)}}</td>
                                            <td class="center-align width-37">{{item.operator}}</td>
                                            <td class="right-align width-60">{{formatAmount(item.amount2)}}</td>
                                        </tr>                                                                                
                                    </tbody>
                                    <tbody class="border-top-none">
                                        <tr>
                                        </tr>
                                        <tr class="empty head-highlight">
                                            <td class="width-78"><input type="text" class="form-control head-number left-align" ng-model="headNumber" ng-keypress="checkHeadNumber($event)"></td>
                                            <td class="width-78"><input type="text" class="form-control head-amount1 right-align" ng-model="headAmount1" ng-keypress="checkHeadAmount1($event)"></td>
                                            <td class="center-align width-37" ng-bind="headOperator"></td>
                                            <td><input type="text" class="form-control head-amount2 right-align" ng-model="headAmount2" ng-keypress="checkHeadAmount2($event)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="blocked"></div>
                            <div class="bordered tail-table disabled">
                                <table class="table main table-bordered">
                                    <thead class="display-block">
                                        <tr>
                                            <th colspan="4">ท้าย</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" class="width-78" style="padding-right: 12px; padding-left: 12px;">เลข</th>
                                          <th scope="col" class="width-78">บาท</th>
                                          <th scope="col" class="width-37">*</th>
                                          <th scope="col" class="width-78">บาท</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vertical-scroll" scroll-glue>
                                        <tr ng-repeat="item in tails" ng-dblclick="deleteTail(item.id)">
                                            <td class="left-align width-78">{{item.number}}</td>
                                            <td class="right-align width-78">{{formatAmount(item.amount1)}}</td>
                                            <td class="center-align width-37">{{item.operator}}</td>
                                            <td class="right-align width-60">{{formatAmount(item.amount2)}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="border-top-none">
                                        <tr>
                                        </tr>
                                        <tr class="empty">
                                            <td class="width-78"><input type="text" class="form-control tail-number left-align" ng-model="tailNumber" ng-keypress="checkTailNumber($event)"></td>
                                            <td class="width-78"><input type="text" class="form-control tail-amount1 right-align" ng-model="tailAmount1" ng-keypress="checkTailAmount1($event)"></td>
                                            <td class="center-align width-37" ng-bind="tailOperator"></td>
                                            <td><input type="text" class="form-control tail-amount2 right-align" ng-model="tailAmount2" ng-keypress="checkTailAmount2($event)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="blocked"></div>
                            <div class="bordered head-tail-table disabled">
                                <table class="table main table-bordered">
                                    <thead class="display-block">
                                        <tr>
                                            <th colspan="4">หัวท้าย</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" class="width-78" style="padding-right: 12px; padding-left: 12px;">เลข</th>
                                          <th scope="col" class="width-78">บาท</th>
                                          <th scope="col" class="width-37">*</th>
                                          <th scope="col" class="width-78">บาท</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vertical-scroll" scroll-glue>
                                        <tr ng-repeat="item in headTails" ng-dblclick="deleteHeadTail(item.id)">
                                            <td class="left-align width-78">{{item.number}}</td>
                                            <td class="right-align width-78">{{formatAmount(item.amount1)}}</td>
                                            <td class="center-align width-37">{{item.operator}}</td>
                                            <td class="right-align width-60">{{formatAmount(item.amount2)}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="border-top-none">
                                        <tr>
                                        </tr>
                                        <tr class="empty">
                                            <td class="width-78"><input type="text" class="form-control head-tail-number left-align" ng-model="headTailNumber" ng-keypress="checkHeadTailNumber($event)"></td>
                                            <td class="width-78"><input type="text" class="form-control head-tail-amount1 right-align" ng-model="headTailAmount1" ng-keypress="checkHeadTailAmount1($event)"></td>
                                            <td class="center-align width-37" ng-bind="headTailOperator"></td>
                                            <td><input type="text" class="form-control head-tail-amount2 right-align" ng-model="headTailAmount2" ng-keypress="checkHeadTailAmount2($event)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="blocked"></div>
                            <div class="bordered top-table disabled">
                                <table class="table main table-bordered">
                                    <thead class="display-block">
                                        <tr>
                                            <th colspan="2">บน</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" class="width-78">เลข</th>
                                          <th scope="col" class="width-78">รวม</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vertical-scroll" scroll-glue>
                                        <tr ng-repeat="item in tops" ng-dblclick="deleteTop(item.id)">
                                            <td class="left-align width-78">{{item.number}}</td>
                                            <td class="right-align width-60">{{formatAmount(item.amount)}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="border-top-none">
                                        <tr>
                                        </tr>
                                        <tr class="empty">
                                            <td><input type="text" class="form-control top-number left-align" ng-model="topNumber" ng-keypress="checkTopNumber($event)"></td>
                                            <td><input type="text" class="form-control top-amount right-align" ng-model="topAmount" ng-keypress="checkTopAmount($event)"></td>                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="blocked"></div>
                            <div class="bordered bottom-table disabled">
                                <table class="table main table-bordered">
                                    <thead class="display-block">
                                        <tr>
                                            <th colspan="2">ล่าง</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" class="width-78">เลข</th>
                                          <th scope="col" class="width-78">รวม</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vertical-scroll" scroll-glue>
                                        <tr ng-repeat="item in bottoms" ng-dblclick="deleteBottom(item.id)">
                                            <td class="left-align width-78">{{item.number}}</td>
                                            <td class="right-align width-60">{{formatAmount(item.amount)}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="border-top-none">
                                        <tr>
                                        </tr>
                                        <tr class="empty">
                                            <td><input type="text" class="form-control bottom-number left-align" ng-model="bottomNumber" ng-keypress="checkBottomNumber($event)"></td>
                                            <td><input type="text" class="form-control bottom-amount right-align" ng-model="bottomAmount" ng-keypress="checkBottomAmount($event)"></td>                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="blocked"></div>
                            <div class="bordered top-bottom-table disabled">
                                <table class="table main table-bordered">
                                    <thead class="display-block">
                                        <tr>
                                            <th colspan="2">บน ล่าง</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" class="width-78">เลข</th>
                                          <th scope="col" class="width-78">รวม</th>
                                        </tr>
                                    </thead>
                                    <tbody class="vertical-scroll" scroll-glue>
                                        <tr ng-repeat="item in topBottoms" ng-dblclick="deleteTopBottom(item.id)">
                                            <td class="left-align width-78">{{item.number}}</td>
                                            <td class="right-align width-60">{{formatAmount(item.amount)}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="border-top-none">
                                        <tr>
                                        </tr>
                                        <tr class="empty">
                                            <td><input type="text" class="form-control top-bottom-number left-align" ng-model="topBottomNumber" ng-keypress="checkTopBottomNumber($event)"></td>
                                            <td><input type="text" class="form-control top-bottom-amount right-align" ng-model="topBottomAmount" ng-keypress="checkTopBottomAmount($event)"></td>                                            
                                        </tr>
                                    </tbody>
                                </table>
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
        <script type="text/javascript" src="/assets/scripts/scrollglue.js"></script>
        <script src="/assets/scripts/keyIn.js" type="text/javascript"></script>
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