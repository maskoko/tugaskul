<?php
  /**
   * Header
   *
   * @package SIM PPPPTK BMTI
   * @author a2ngsa
   * @copyright 2012
   * @version $Id: header.php, v1.00 2011-11-10 10:12:05 gewa Exp $
   */
  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
      
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>:: <?php echo $core->company;?> - Admin ::</title>
    <script language="javascript" type="text/javascript">
        var SITEURL = "<?php echo SITEURL; ?>";
    </script>
    
    <meta name="author" content="a2ngsa" />
    <meta name="description" content="SIM Diklat PPPPTK BMTI Bandung" />
    <meta name="keywords" content="SIM Diklat, PPPPTK BMTI, Bandung" />
    <meta name="application-name" content="SIM Diklat PPPPTK BMTI Bandung" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->

    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Text -->
    
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!-- Core stylesheets do not remove -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="css/icons.css" rel="stylesheet" type="text/css" />

    <!-- Plugin stylesheets -->
    <link href="plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
    <link href="plugins/forms/validate/validate.css" type="text/css" rel="stylesheet" />
    
    <!-- Main stylesheets -->
    <link href="css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="css/custom.css" rel="stylesheet" type="text/css" /> 
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

    <script type="text/javascript">
        //adding load class to body and hide page
        document.documentElement.className += 'loadstate';
    </script>

    <!-- Le javascript
    ================================================== -->      
    <!-- Important plugins put in all pages -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        
    </head>
      
    <body>

    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="../index.php">SIM Diklat.<span class="slogan">PPPPTK BMTI Bandung</span></a>
                <div class="nav-no-collapse">
                    <ul class="nav">
                        <li><a href="index.php"><span class="icon16 icomoon-icon-screen-2"></span> Home</a></li>
                    </ul>
                  
                    <ul class="nav pull-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="../images/avatar.png" alt="Avatar" class="image"/>
                                <span class="txt"><?php echo $user->username;?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>
                                            <a href="index.php?do=users&amp;action=edit&amp;id=<?php echo $user->uid;?>"><span class="icon16 icomoon-icon-user-3"></span>Edit User Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="logout.php"><span class="icon16 icomoon-icon-exit"></span> Logout</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->

    <div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        <!--Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>                    
                    <li><a href="index.php" title="Home" class="tip"><span class="icon24 icomoon-icon-home"></span></a></li>
                    <li><a href="index.php?do=config" title="Konfigurasi Web" class="tip" <?php echo '',(!$user->isProfileModuleExists(1, 'R')) ? 'hidden' : ''; ?>><span class="icon24 icomoon-icon-cog-2"></span></a></li>
                    <li><a href="index.php?do=backup" title="Backup Database" class="tip" <?php echo '',(!$user->isProfileModuleExists(1, 'R')) ? 'hidden' : ''; ?>><span class="icon24 icomoon-icon-database"></span></a></li>                    
                    <li><a href="index.php?do=users" title="User Login" class="tip" <?php echo '',(!$user->isProfileModuleExists(2, 'R')) ? 'hidden' : ''; ?>><span class="icon24 icomoon-icon-users"></span></a></li>                  
                </ul>
            </div><!-- End search -->            

            <div class="sidenav">

                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->


                <div class="mainnav">
                    <!-- <?php //$row = Core::getRowById("user_profiles", Filter::$id); ?> -->
                    <!-- <input type="text" class="span8 required" name="profilename" id="profilename" value=""/> -->
                <!--     <?php echo $user->username;?> -->
                    <ul>
                    
                        <li>
                            <a href="#" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-list-view-2"></span>Rujukan</a>
                            <!-- <span class="notification blue">8</span> -->
                            <ul class="sub">
                                <li><a href="index.php?do=rujukan_propinsi" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?> ><span class="icon16 icomoon-icon-arrow-right-2"></span>Propinsi</a></li>
                                <li><a href="index.php?do=rujukan_kota" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Kota/Kabupaten</a></li>
                                <li><a href="index.php?do=rujukan_departemen" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Departemen</a></li>
                                <li><a href="index.php?do=rujukan_bsk" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Bidang Keahlian</a></li>
                                <li><a href="index.php?do=rujukan_psk" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Program Keahlian</a></li>
                                <li><a href="index.php?do=rujukan_kk" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Kompetensi Keahlian</a></li>
                                <li><a href="index.php?do=rujukan_sekolah_jenis" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Jenis Sekolah</a></li>
                                <li><a href="index.php?do=rujukan_golongan" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Golongan</a></li>
                                <li><a href="index.php?do=rujukan_kategori" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Kategori</a></li>
                                <li><a href="index.php?do=rujukan_materi" <?php echo '',(!$user->isProfileModuleExists(3, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Materi</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?do=sekolah" <?php echo '',(!$user->isProfileModuleExists(5, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-home-8"></span>Sekolah</a></li>
                        <li><a href="index.php?do=ptk" <?php echo '',(!$user->isProfileModuleExists(4, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-user-4"></span>GTK</a></li>
                        <li><a href="index.php?do=lembaga" <?php echo '',(!$user->isProfileModuleExists(7, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-cog-2"></span>Lembaga</a></li>
                        <li><a href="index.php?do=staff" <?php echo '',(!$user->isProfileModuleExists(6, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-user-2"></span>Staff</a></li>
                        <li>
                            <a href="#" <?php echo '',(!$user->isProfileModuleExists(8, 'R') && !$user->isProfileModuleExists(9, 'R') && !$user->isProfileModuleExists(10, 'R') && !$user->isProfileModuleExists(11, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-graduation"></span>Diklat</a>
                            <!-- <span class="notification blue">4</span> -->
                            <ul class="sub">
                                <li><a href="index.php?do=diklat" <?php echo '',(!$user->isProfileModuleExists(8, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2" ></span>Katalog Diklat</a></li>
                                <li><a href="index.php?do=diklat_jadwal" <?php echo '',(!$user->isProfileModuleExists(9, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Jadwal Diklat</a></li>
                                <li><a href="index.php?do=diklat_calonpeserta" <?php echo '',(!$user->isProfileModuleExists(10, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Calon Peserta Diklat</a></li>
                                <li><a href="index.php?do=diklat_peserta" <?php echo '',(!$user->isProfileModuleExists(11, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Peserta Diklat</a></li>
                            </ul>
                        </li>
                        <!-- TNA Online -->
<!--                         <li>
                            <a href="#"><span class="icon16 icomoon-icon-equalizer-2"></span>TNA Online<span class="notification green">4</span></a>
                            <ul class="sub">
                                <li><a href="index.php?do=tna_kd"><span class="icon16 icomoon-icon-arrow-right-2"></span>Kompetensi Dasar</a></li>
                                <li><a href="index.php?do=tna_ptk"><span class="icon16 icomoon-icon-arrow-right-2"></span>Hasil TNA Online</a></li>
                                <li><a href="index.php?do=tna_ptk_kk"><span class="icon16 icomoon-icon-arrow-right-2"></span>Hasil TNA Online PTK</a></li>
                                <li><a href="index.php?do=chart_tna_ptk"><span class="icon16 icomoon-icon-arrow-right-2"></span>Grafik TNA Online</a></li>
                            </ul>
                        </li> -->
                        
                        <!-- Penyelenggaraan -->
                        <li>
                            <a href="#" <?php echo '',(!$user->isProfileModuleExists(12, 'R') && !$user->isProfileModuleExists(13, 'R') && !$user->isProfileModuleExists(14, 'R') && !$user->isProfileModuleExists(15, 'R') && !$user->isProfileModuleExists(16, 'R') && !$user->isProfileModuleExists(17, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-calendar"></span>Penyelenggaraan</a>
                            <!-- <span class="notification red">6</span> -->
                            <ul class="sub">
                                <li><a href="index.php?do=pn_gedung" <?php echo '',(!$user->isProfileModuleExists(12, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Gedung &amp; Kamar</a></li>
                                <li><a href="index.php?do=pn_diklat_mata_tatar" <?php echo '',(!$user->isProfileModuleExists(13, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Mata Tatar Diklat</a></li>
                                <li><a href="index.php?do=pn_diklat_agenda" <?php echo '',(!$user->isProfileModuleExists(14, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Agenda Diklat</a></li>
                                <li><a href="index.php?do=pn_diklat_absen" <?php echo '',(!$user->isProfileModuleExists(15, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Absensi Peserta</a></li>
                                <li><a href="index.php?do=pn_diklat_nilai" <?php echo '',(!$user->isProfileModuleExists(16, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Nilai Diklat</a></li>
                                <li><a href="index.php?do=pn_diklat_sertifikat" <?php echo '',(!$user->isProfileModuleExists(17, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-arrow-right-2"></span>Sertifikat &amp; Validasi</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#" <?php echo '',(!$user->isProfileModuleExists(18, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-file"></span>Laporan</a>
                            <!-- <span class="notification blue">9</span> -->
                            <ul class="sub">
                                <li><a href="index.php?do=report_sekolah"><span class="icon16 icomoon-icon-arrow-right-2"></span>Data Sekolah</a></li>
                                <li><a href="index.php?do=report_ptk"><span class="icon16 icomoon-icon-arrow-right-2"></span>Data GTK</a></li>

                                <li><a href="index.php?do=report_lembaga"><span class="icon16 icomoon-icon-arrow-right-2"></span>Data Lembaga</a></li>
                                <li><a href="index.php?do=report_staff"><span class="icon16 icomoon-icon-arrow-right-2"></span>Data Staff</a></li>

                                <li><a href="index.php?do=report_ptk_diklatminat"><span class="icon16 icomoon-icon-arrow-right-2"></span>Data Minat Diklat GTK</a></li>
                                <li><a href="index.php?do=report_diklat"><span class="icon16 icomoon-icon-arrow-right-2"></span>Data Katalog Diklat</a></li>
                                <li><a href="index.php?do=report_diklat_jadwal"><span class="icon16 icomoon-icon-arrow-right-2"></span>Jadwal Diklat</a></li>
                                <li><a href="index.php?do=report_diklat_calonpeserta"><span class="icon16 icomoon-icon-arrow-right-2"></span>Calon Peserta Diklat</a></li>
                                <li><a href="index.php?do=report_diklat_peserta"><span class="icon16 icomoon-icon-arrow-right-2"></span>Peserta Diklat</a></li>
                                <li><a href="index.php?do=report_registrasi_peserta"><span class="icon16 icomoon-icon-arrow-right-2"></span>Registrasi Peserta</a></li>
                            </ul>
                        </li>
                
                        <li>
                            <a href="#" <?php echo '',(!$user->isProfileModuleExists(19, 'R')) ? 'hidden' : ''; ?>><span class="icon16 icomoon-icon-chart"></span>Grafik</a>
                            <!-- <span class="notification blue">3</span> -->
                            <ul class="sub">
                                <li><a href="index.php?do=chart_ptk_sekolah_peserta"><span class="icon16 icomoon-icon-arrow-right-2"></span>GTK/Sekolah/Peserta</a></li>
                                <li><a href="index.php?do=chart_ptk_ijazah"><span class="icon16 icomoon-icon-arrow-right-2"></span>Tingkat Pendidikan GTK</a></li>
                                <li><a href="index.php?do=chart_diklat_peserta"><span class="icon16 icomoon-icon-arrow-right-2"></span>Calon & Peserta Diklat</a></li>
                            </ul>
                        </li>
                                                                                                
                    </ul>
                </div>
            </div><!-- End sidenav -->
            
        </div><!-- End #sidebar -->
        