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

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
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
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
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
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">รายงาน</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/admin/reports/threeDigits" class="nav-link ">
                                            <span class="title">รายงานเลข 3 ตัว</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/reports/twoDigits" class="nav-link ">
                                            <span class="title">รายงานเลข 2 ตัว</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item start active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">การตั้งค่า</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/admin/settings/numberType" class="nav-link ">
                                            <span class="title">ประเภทตัวเลข</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/organization" class="nav-link ">
                                            <span class="title">เจ้ามือ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/userManagement" class="nav-link ">
                                            <span class="title">การจัดการผู้ใช้งาน</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/settings/agentManagement" class="nav-link ">
                                            <span class="title">จัดการหัวหน่วย</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a href="/admin/settings/periodManagement" class="nav-link ">
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
                    <div class="page-content">
                        <div class="org-field">
                            <h2>การจัดการงวด</h2>
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="คุณสามาถขอเพิ่มบัญชีผู้ใช้งานจากหัวน้าแอดมินหรือเจ้าของเว็ปไซต์เพื่อเปลี่ยนจากผู้ใช้งานเป็นแอดมิน">คุณไม่สามารถเข้าถึงได้ โปรดยืนยันว่าคุณเป็นแอดมิน</h3>
                            <?php }else{?>
                            <div class="period-table center-align" org_id="<?php echo $org_id;?>">
                                <table class="table table-striped table-bordered" id="sample_editable_period">
                                    <thead>
                                        <tr>
                                            <th> งวด </th>
                                            <th> รางวัลที่ 1 </th>
                                            <th> เลขท้าย 2 ตัว </th>
                                            <th> รวม </th>
                                            <th> สุทธิ </th>
                                            <th> จ่าย </th>
                                            <th> P/L </th>
                                            <th> สถานะ </th>
                                            <th> แก้ไข </th>
                                            <th> ยอดรวมหัวหน่วย </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($periods as $key => $period) :?>
                                            <tr class="available" period_id="<?=$period->period_id?>">
                                                <td><?=$period->period?></td>
                                                <td><?=$period->top_result?></td>
                                                <td><?=$period->bottom_result?></td>                                                
                                                <?php if($period->status == 0){?>
                                                <td class="high-light right-align"><?=$period->total?></td>
                                                <td class="high-light right-align"><?=$period->net?></td>
                                                <td class="high-light right-align"><?=$period->pay?></td>
                                                <td class="high-light right-align"><?=$period->p_l?></td>
                                                <td class="period-status">ปิด</td>
                                                <?php }else{?>
                                                <td class="right-align"><?=$period->total?></td>
                                                <td class="right-align"><?=$period->net?></td>
                                                <td class="right-align"><?=$period->pay?></td>
                                                <td class="right-align"><?=$period->p_l?></td>
                                                <td class="period-status">เปิด</td>
                                                <?php }?>
                                                <td><a class="edit"><i class="fa fa-pencil"></i></a></td>
                                                <td><a class="view-amount" period_id="<?=$period->period_id?>"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_period_modal">เพิ่มงวดใหม่</button>
                                <div id="add_period_modal" class="modal fade" role="dialog">
                                  <div class="modal-dialog modal-sm">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">แอดมิน-สร้างงวด</h3>
                                      </div>
                                      <div class="modal-body">
                                        <div class="content">
                                            <!-- BEGIN REGISTRATION FORM -->
                                            <form class="register-form" method="post">
                                                <div class="form-group">
                                                    <label class="control-label visible-ie8 visible-ie9">งวด</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input class="form-control placeholder-no-fix" type="date" placeholder="งวด" name="period" /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">รางวัลที่ 1</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-level-up"></i>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="รางวัลที่ 1" name="top_result" /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">เลขท้าย 2 ตัว</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-level-down"></i>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="เลขท้าย 2 ตัว" name="bottom_result" /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">สถานะ</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-openid"></i>
                                                        <select class="form-control" name="status">
                                                            <option value="1">เปิด</option>
                                                            <option value="0">ปิด</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">เจ้ามือ</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-envelope"></i>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="เจ้ามือ" name="org_id" readonly value=<?php echo $org_id;?> /> </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="button" class="close_modal btn btn-danger pull-left" data-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn green pull-right"> เพิ่ม </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END REGISTRATION FORM -->
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
                <div class="page-footer-inner"> 2018 &copy; All rights reserved
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <div id="agent_amount_modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ยอดรวมของหัวหน่วยแต่ละคน</h3>
              </div>
              <div class="modal-body">
                <div class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>รางวัลที่ 1</h4>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="underline modal-topresult"></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>2 ตัวล่าง</h4>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="underline modal-bottomresult"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="agent-head">
                            
                        </thead>
                        <tbody class="amounts">

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="pull-right col-md-3">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>จ่าย</h4>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="underline modal-pay"></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>รับ</h4>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="underline modal-amount"></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>P/L</h4>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="underline modal-pl"></h4>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
              </div>
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
        <script src="/assets/scripts/admin/periodManagement.js" type="text/javascript"></script>
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