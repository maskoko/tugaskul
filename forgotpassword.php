<?php
  /**
   * Index
   *
   * @package SIM PPPPTK BMTI
   * @author a2ngsa
   * @copyright 2012
   * @version $Id: index.php, v1.00 2011-07-10 10:12:05 gewa Exp $
   */
  define("_VALID_PHP", true);
  require_once("init.php");
  
  if ($user->logged_in)
      redirect_to("account.php");
	  	    
  if (isset($_POST['doForgotPasswd']))
      $user->forgotPasswd($_POST['email']);

  if (isset($_GET['tokenkey']))
      $tokenkey = $_GET['tokenkey'];

  if (isset($_POST['tokenkey']) && isset($_POST['newpasswd']) && isset($_POST['retypenewpasswd']))
      $user->processForgotPasswd($_POST['tokenkey'], $_POST['newpasswd'], $_POST['retypenewpasswd']);

?>

<?php include("header_public.php");?>

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Fasilitas Lupa Password</h3>                    
                    
                </div><!-- End .heading-->

                <!-- Build page from here: -->
                <div class="row-fluid">
                    <div class="span12">

                        <div class="box">

                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-info"></span>
                                    <span>Data User :</span>
                                </h4>
                            </div>
                            
                            <div class="content">
                                
                                <?php 

                                  if (!isset($tokenkey)): 

                                    if (isset($_GET["userid"]) && isset($_GET["sent"]) && $_GET["sent"] == 1):
                                ?>

                                    <div id="msgholder"><div class="alert alert-info">
                                      <h4 class="alert-heading">Langkah selanjutnya untuk mengganti password sudah dikirim ke E-Mail anda.</h4>
                                    </div></div>

                                <?php else: ?>
                                  <div id="msgholder"><?php print Filter::$showMsg;?></div>                                  

                                    <form class="form-horizontal" action="" id="forgotForm" method="post" >

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="email">E-Mail Anda:</label>
                                                    <input class="span8 required" id="email" type="text" name="email" value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-info right" id="submitBtn"><span class="icon16 icomoon-icon-enter white"></span> Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input name="doForgotPasswd" type="hidden" value="1" />

                                    </form>

                                  <?php
                                        endif;
                                      else: 
                                          if ($user->getUser_TokenActive($tokenkey)) :
                                  ?>

                                    <div id="msgholder"><?php print Filter::$showMsg;?></div>                                  

                                    <form class="form-horizontal" action="" id="forgotForm" method="post" >

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="newpasswd">Password Baru:</label>
                                                    <input class="span8 required" id="newpasswd" type="password" name="newpasswd" value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="retypenewpasswd">Ketik Ulang Password:</label>
                                                    <input class="span8 required" id="retypenewpasswd" type="password" name="retypenewpasswd" value=""/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-info right" id="submitBtn"><span class="icon16 icomoon-icon-enter white"></span> Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input name="tokenkey" type="hidden" value="<?php echo $tokenkey; ?>" />

                                    </form>

                                  <?php 
                                      else:
                                        if (isset($_GET["executed"]) && $_GET["executed"] == 1):  
                                  ?>
                                    <div id="msgholder"><div class="alert alert-info">                                      
                                      <h4 class="alert-heading">Password berhasil diganti.</h4>
                                    </div></div>
                                  <?php else: ?>
                                    <div id="msgholder"><div class="alert">
                                      <h4 class="alert-heading">Token tidak valid!</h4>
                                    </div></div>
                                  <?php
                                      endif;
                                      endif;
                                      endif; ?>
                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span12 -->
                </div><!-- End .row-fluid -->
                
                <!--End page -->
                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
        
    </div><!-- End #wrapper -->
        
    <!-- Charts plugins -->
    <script type="text/javascript" src="plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
    
    <!-- Misc plugins -->
    <script type="text/javascript" src="plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="plugins/misc/totop/jquery.ui.totop.min.js"></script> 

    <!-- Search plugin -->
    <script type="text/javascript" src="plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="plugins/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="plugins/misc/search/tipuesearch.js"></script>

    <!-- Form plugins -->
    <script type="text/javascript" src="plugins/forms/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="plugins/forms/uniform/jquery.uniform.min.js"></script>    
            
    <!-- Fix plugins -->
    <script type="text/javascript" src="plugins/fix/ios-fix/ios-orientationchange-fix.js"></script>

    <!-- Table plugins -->
    <script type="text/javascript" src="plugins/tables/responsive-tables/responsive-tables.js"></script><!-- Make tables responsive -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script> 
    <script type="text/javascript" src="plugins/fix/touch-punch/jquery.ui.touch-punch.min.js"></script><!-- Unable touch for JQueryUI -->
	
    <!-- Init plugins -->
    <script type="text/javascript" src="js/main.js"></script><!-- Core js functions -->
	
<?php include("footer_public.php");?>
