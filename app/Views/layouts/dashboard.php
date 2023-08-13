<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Apr 2023 14:27:54 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?= csrf_meta() ?>
    <title>Finance</title>
    <link rel="icon" href="<?= base_url() ?>assets/img/logo.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/morris/morris.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/metisMenu.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style1.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/invoice.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/colors/default.css" id="colorSkinCSS">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="crm_body_bg">



    <nav style="border-right: 2px solid #8000ff;" class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="index.html"><img src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <img src="<?= base_url() ?>assets/img/menu-icon/1.svg" alt="">
                    <span>Products</span>
                </a>
                <ul>
                    <li><?= anchor("admin/product", "Manage Product", ['class' => 'active']) ?></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/2.svg" alt="">
                    <span>Category</span>
                </a>
                <ul>
                    <li><a class="active" href="index.html">Manage Category</a></li>

                </ul>

            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/3.svg" alt="">
                    <span>Sub-Category</span>
                </a>
                <ul>
                <li><?= anchor("admin/subcategory", "Manage Subcategory", ['class' => 'active']) ?></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/4.svg" alt="">
                    <span>Users</span>
                </a>
                <ul>
                    <li><a class="active" href="index.html">Manage User</a></li>

                </ul>
            </li>
            <li  class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/5.svg" alt="">
                    <span>Orders</span>
                </a>
                <ul>
                <li><?= anchor("admin/order", "Manage Orders", ['class' => 'active']) ?></li>

                </ul>
            </li>
            <li  class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/5.svg" alt="">
                    <span>Purches</span>
                </a>
                <ul>
                <li><?= anchor("admin/purches", "Manage Purches", ['class' => 'active']) ?></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/6.svg" alt="">
                    <span>Manufacturers</span>
                </a>
                <ul>

                    <li><a href="chart_box_1.html">Manage Manufacturers</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="<?= base_url() ?>assets/img/menu-icon/7.svg" alt="">
                    <span>Charts</span>
                </a>
                <ul>
                    <li><a href="chartjs.html">ChartJS</a></li>
                    <li><a href="apex_chart.html">Apex Charts</a></li>
                    <li><a href="chart_sparkline.html">chart sparkline</a></li>
                </ul>
            </li>
        </ul>
    </nav>


    <section  class="main_content dashboard_part">

        <div class="container-fluid g-0">
            <div class="row ">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button type="submit"> <img src="<?= base_url() ?>assets/img/icon/icon_search.svg" alt=""> </button>
                                </form>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a href="#"> <img src="<?= base_url() ?>assets/img/icon/bell.svg" alt=""> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="<?= base_url() ?>assets/img/icon/msg.svg" alt=""> </a>
                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="<?= base_url() ?>assets/img/wp2.png" alt="#">
                                <div class="profile_info_iner">
                                    <p>Welcome Admin!</p>
                                    <h5>Travor James</h5>
                                    <div class="profile_info_details">
                                        <a href="#">My Profile <i class="ti-user"></i></a>
                                        <a href="#">Settings <i class="ti-settings"></i></a>
                                        <?= anchor("logout", "Logout", ["class" => "ti-shift-left"]) ?> <i></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->renderSection('content') ?>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="footer_iner text-center">
                            <p>2023 ©  - Designed by<a href="#"> Ishrat Zahan</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="<?= base_url() ?>assets/js/jquery1-3.4.1.min.js"></script>

    <script src="<?= base_url() ?>assets/js/popper1.min.js"></script>

    <script src="<?= base_url() ?>assets/js/bootstrap1.min.js"></script>

    <script src="<?= base_url() ?>assets/js/metisMenu.js"></script>

    <script src="<?= base_url() ?>assets/vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/chartlist/Chart.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/count_up/jquery.counterup.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/swiper_slider/js/swiper.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/gijgo/gijgo.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatable/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/js/chart.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/progressbar/jquery.barfiller.js"></script>

    <script src="<?= base_url() ?>assets/vendors/tagsinput/tagsinput.js"></script>

    <script src="<?= base_url() ?>assets/vendors/text_editor/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>assets/vendors/apex_chart/apexcharts.js"></script>

    <script src="<?= base_url() ?>assets/js/custom.js"></script>

<!--     <script src="<?= base_url() ?>assets/js/active_chart.js"></script>
    <script src="<?= base_url() ?>assets/vendors/apex_chart/radial_active.js"></script>
    <script src="<?= base_url() ?>assets/vendors/apex_chart/stackbar.js"></script>
    <script src="<?= base_url() ?>assets/vendors/apex_chart/area_chart.js"></script>
    <script src="<?= base_url() ?>assets/vendors/apex_chart/bar_active_1.js"></script>
    <script src="<?= base_url() ?>assets/vendors/chartjs/chartjs_active.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            // Show busy cursor when AJAX starts
  $(document).ajaxStart(function() {
    $('body').css('cursor', 'progress');
  });

  // Reset cursor when AJAX ends
  $(document).ajaxStop(function() {
    $('body').css('cursor', 'default');
  });
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="X-CSRF-TOKEN"]').attr('content')
            }
        });
        
        </script>
   
    <?= $this->renderSection('script') ?>

</body>

<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Apr 2023 14:28:19 GMT -->

</html>