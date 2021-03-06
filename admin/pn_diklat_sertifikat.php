<?php
  /**
   * Main
   *
   * @package SIM PPPPTK BMTI
   * @author a2ngsa
   * @copyright 2012
   * @version $Id: pn_diklat_sertifikat.php (admin), v1.00 2011-06-05 10:12:05 gewa Exp $
   */
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
	  
  
?>

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">
                    <h3>Sertifikat dan Validasi Data Peserta Diklat</h3>                    
                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <div class="row-fluid">
                    <div class="span12">

<?php switch(Filter::$action): case "edit": ?>

	<?php include ("pn_diklat_sertifikat_edit.php"); ?>

<?php break; ?>

<?php case "validasi": ?>

	<?php include ("pn_diklat_sertifikat_validasi.php"); ?>

<?php break; ?>

    <!------------------------ list ----------------------------------------------->
	

<?php default: ?>


	<?php
        
            if(isset(Filter::$get['jadwalid']))
                $jadwalid = Filter::$get['jadwalid'];
            else
                $jadwalid = 0;

            if(isset($_COOKIE['jadwal_tgl_dari']))
                $jadwal_tgl_dari = $_COOKIE['jadwal_tgl_dari'];
            else {
                $year = date('Y');
                $tgl_dari = mktime(0, 0, 0, 1, 1,  $year - 2);
                $jadwal_tgl_dari = date('d/m/Y', $tgl_dari);                    
            }

            if(isset($_COOKIE['jadwal_tgl_sampai'])) { 
                $jadwal_tgl_sampai = $_COOKIE['jadwal_tgl_sampai'];
            } else {                                        
                if(isset($_COOKIE['jadwal_tgl_dari'])) { 
                    $jadwal_tgl_sampai = $_COOKIE['jadwal_tgl_dari'];
                } else {
                    $year = date('Y');
                    $tgl_sampai = mktime(0, 0, 0, 12, 31,  $year);
                    $jadwal_tgl_sampai = date('d/m/Y', $tgl_sampai);
                }
            }
                
	?>
		
                        <div class="box">

                            <div class="title">
                                <h4>
                                    <span>Filter: (<?php echo $jadwal_tgl_dari . ' s.d ' . $jadwal_tgl_sampai; ?>)</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            
                            <div class="content">
                                <form class="form-horizontal" method="get" action="">
                                <fieldset>
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span2" for="checkboxes">Jadwal Diklat:</label>
                                                <div class="span4 controls">
                                                    <?php 
                                                    
                                                        $jadwal_tgl_dari = setToSQLdate($jadwal_tgl_dari);
                                                        $jadwal_tgl_sampai = setToSQLdate($jadwal_tgl_sampai);
                                                        $jadwal = $content->getDiklat_JadwalList($jadwal_tgl_dari, $jadwal_tgl_sampai);
                                                        
                                                    ?>
                                                    <select name="jadwalid" onchange="window.location='index.php?do=pn_diklat_sertifikat&amp;jadwalid='+this[this.selectedIndex].value+''" style="width:100%;" placeholder="Select...">
                                                        <option value="0"><?php echo lang('SELECT');?></option>
                                                        <?php if ($jadwal):?>
                                                            <?php foreach ($jadwal as $prow):?>
                                                                <option value="<?php echo $prow->id;?>" <?php if($prow->id == $jadwalid)echo 'selected="selected"';?>><?php echo $prow->nama_diklat;?></option>
                                                            <?php endforeach;?>
                                                            <?php unset($prow);?>
                                                        <?php endif;?>						
                                                    </select>														
                                                </div>
                                            </div>
                                        </div>
                                    </div>		
                                </fieldset>
                                </form>								
                            </div>

                        </div><!-- End filter .box -->

                    </div><!-- End .span12 -->
                </div><!-- End .row-fluid -->  
                        
                <div class="row-fluid">
                    <div class="span12">
                        
                        <div id="msgholder"></div>
                         
                        <div class="box">

                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-file"></span>
                                    <span>Peserta Diklat</span>                                       

                                    <div class="right">
                                        <a href="controller_report.php?action=createReportDiklat_Sertitifat_Validasi<?php echo '&amp;jadwalid='.$jadwalid;?>" class="tip" title="Export Data Validasi"><span class="icon16 icomoon-icon-file-excel"></span></a>
                                    </div>

                                </h4>                                
                            </div>
                            
                            <div class="content">
                
                                <?php $rows = $content->getDiklat_Sertifikat($jadwalid);?>                                
                                
                                <table class="responsive table table-striped table-bordered table-sorting table-condensed">

                                    <thead>
                                        <tr>
                                            <th width="70">NUPTK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Sekolah</th>
                                            <th>Propinsi</th>
                                            <th>Kota</th>
                                            <th width="30">Status</th>
                                            <th width="100">No. Sertifikat</th>
                                            <th  style="<?php if(!$user->isProfileModuleExists('17', 'U')){echo 'display:none;';}?>" width="70">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php if(!$rows):?>
                                        <tr>
                                            <td colspan="8"><?php echo Filter::msgInfo(lang('NO_DATA'), false);?></td>
                                        </tr>

                                    <?php else:?>
                                    <?php foreach ($rows as $row):?>

                                        <tr>
                                            <td align="center"><?php echo $row->nuptk;?></td>
                                            <td style="text-align: left;"><?php echo $row->nama_lengkap;?></td>
                                            <td style="text-align: left;"><?php echo $row->nama_sekolah;?></td>
                                            <td style="text-align: left;"><?php echo $row->nama_propinsi;?></td>
                                            <td style="text-align: left;"><?php echo $row->nama_kota;?></td>
                                            <td><?php if ($row->status_lulus) echo '<span class="label label-info">'. $row->status_lulus. '</span>';?></td>
                                            <td style="text-align: left;"><?php if ($row->no_sertifikat) echo $row->no_sertifikat;?></td>
                                            <td style="<?php if(!$user->isProfileModuleExists('17', 'U')){echo 'display:none;';}?>" align="center">
                                                <a href="index.php?do=pn_diklat_sertifikat&amp;action=edit&amp;id=<?php echo $row->id;?>" title="Edit data sertifikat" class="tip marginR10 marginB10"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="index.php?do=pn_diklat_sertifikat&amp;action=validasi&amp;id=<?php echo $row->id;?>" title="Validasi data Peserta" class="tip marginR10 marginB10"><span class="icon12 icomoon-icon-lightning"></span></a>
                                            </td>
                                        </tr>

                                    <?php endforeach;?>
                                    <?php unset($row);?>
                                    <?php endif;?>					

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="8">
                                                <div class="span4">
                                                    <strong>Data&nbsp;:&nbsp;<span class="label label-info"><?php echo number_format($pager->items_total);?></span></strong>
                                                </div>
                                                <div class="span8">
                                                    <div class="right">
                                                        <?php echo $pager->display_pages();?>
                                                    </div>
                                                </div>
                                            </td>											
                                        </tr>										
                                    </tfoot>

                                </table>

                            </div><!-- End .content -->
                        </div><!-- End .box -->  
                                                                
<?php break;?>
<?php endswitch;?>
						
                    </div><!-- End .span12 -->
                </div><!-- End .row-fluid -->  

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
    <script type="text/javascript" src="plugins/forms/validate/jquery.validate.min.js"></script>
            
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
