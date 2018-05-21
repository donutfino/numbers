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
                                    <li class="nav-item active">
                                        <a href="/admin/settings/numberType" class="nav-link ">
                                            <span class="title">Number Type</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="/admin/settings/organization" class="nav-link ">
                                            <span class="title">Organization</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="/admin/settings/userManagement" class="nav-link ">
                                            <span class="title">User Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="/admin/settings/agentManagement" class="nav-link ">
                                            <span class="title">Agent Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
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
                        <div class="input-field">
                            <h2>Number Type Settings</h2>
                            <?php if($org_id == -1){?>
                            <h3 class="alert" data-toggle="tooltip" data-placement="bottom" title="You can ask a SUPER ADMIN/GOD to add your 'user_id' into the 'admin_id' field in organization which you are going to work on as admin.">You have no organization to access. Please make sure there's an organization you are included as admin.</h3>
                            <?php }else{?>
                            <div class="number-type-table">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_number">
                                    <thead>
                                        <tr>
                                          <th scope="col">Type</th>
                                          <th scope="col">Digit</th>
                                          <th scope="col">Rate</th>
                                          <th scope="col">Default Limit</th>
                                          <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($number_types as $key => $value) :?>
                                            <tr class="available" number_type_id="<?=$value->number_type_id?>">
                                                <td><?=$value->type?></td>
                                                <td><?=$value->digit?></td>
                                                <td><?=$value->rate?></td>
                                                <td><?=$value->default_limit?></td>
                                                <td><a class="edit"><i class="fa fa-pencil"></i></a></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php if($set_default_flag == true){?>
                                <button type="button" class="set-default btn btn-success" org_id="<?php echo $org_id;?>">Set By Default</button>
                                <?php };?>
                            </div>
                            <?php };?>                                  
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
        <script src="/assets/scripts/admin/numberType.js" type="text/javascript"></script>
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