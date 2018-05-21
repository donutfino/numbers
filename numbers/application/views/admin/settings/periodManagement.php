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
                            <li class="nav-item">
                                <a href="/admin/report" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Report</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
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
                                    <li class="nav-item active">
                                        <a href="/admin/settings/periodManagement" class="nav-link ">
                                            <span class="title">Period Management</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="org-field">
                            <h2>Period Management</h2>
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="You can ask a SUPER ADMIN/GOD to add your 'user_id' into the 'admin_id' field in organization which you are going to work on as admin.">You have no organization to access. Please make sure there's an organization you are included as admin.</h3>
                            <?php }else{?>
                            <div class="period-table">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_period">
                                    <thead>
                                        <tr>
                                            <th> Period </th>
                                            <th> Top Result </th>
                                            <th> Bottom Result </th>
                                            <th> Total </th>
                                            <th> Net </th>
                                            <th> Pay </th>
                                            <th> P/L </th>
                                            <th> Staus </th>
                                            <th> Edit </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($periods as $key => $period) :?>
                                            <tr class="available" period_id="<?=$period->period_id?>">
                                                <td><?=$period->period?></td>
                                                <td><?=$period->top_result?></td>
                                                <td><?=$period->bottom_result?></td>
                                                <td><?=$period->total?></td>
                                                <td><?=$period->net?></td>
                                                <td><?=$period->pay?></td>
                                                <td><?=$period->p_l?></td>
                                                <?php if($period->status == 0){?>
                                                <td>Closed</td>
                                                <?php }else{?>
                                                <td>Open</td>
                                                <?php }?>
                                                <td><a class="edit"><i class="fa fa-pencil"></i></a></td>                                                
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                
                                <button type="button" class="add-user btn btn-success" data-toggle="modal" data-target="#add_period_modal">Add New Period</button>
                                <div id="add_period_modal" class="modal fade" role="dialog">
                                  <div class="modal-dialog modal-sm">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title">Admin - create period</h3>
                                      </div>
                                      <div class="modal-body">
                                        <div class="content">
                                            <!-- BEGIN REGISTRATION FORM -->
                                            <form class="register-form" method="post">
                                                <div class="form-group">
                                                    <label class="control-label visible-ie8 visible-ie9">Period</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar"></i>
                                                        <input class="form-control placeholder-no-fix" type="date" placeholder="Period" name="period" /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">Top Result</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-level-up"></i>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Top Result" name="top_result" /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">Bottom Result</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-level-down"></i>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Bottom Result" name="bottom_result" /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">Status</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-openid"></i>
                                                        <select class="form-control" name="status">
                                                            <option value="1">Open</option>
                                                            <option value="0">Closed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                    <label class="control-label visible-ie8 visible-ie9">Org Id</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-envelope"></i>
                                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Org Id" name="org_id" readonly value=<?php echo $org_id;?> /> </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="button" class="close_modal btn btn-danger" data-dismiss="modal">Close</button>                                                                                                                   
                                                    <button type="submit" class="btn green pull-right"> Add </button>
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
                var title = "Notification";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated rubberBand');

            <?php } else if (($toast != null) && ($toast['state'] == false)) { ?>

                var shortCutFunction = "error";
                var msg = "<?php echo $toast['msg'] ?>";
                var title = "Error !";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated shake');
                
            <?php } ?>
        </script>
    </body>
</html>