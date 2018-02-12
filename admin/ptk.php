<?php
  /**
   * Main
   *
   * @package SIM PPPPTK BMTI
   * @author a2ngsa
   * @copyright 2012
   * @version $Id: ptk.php (admin), v1.00 2011-06-05 10:12:05 gewa Exp $
   */
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
	    
?>

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->


<?php switch(Filter::$action): case "edit": ?>

	<?php include ("ptk_edit.php"); ?>

<?php break; ?>

    <!------------------------ add ----------------------------------------------->


<?php case "add": ?>

	<?php include ("ptk_add.php"); ?>

<?php break; ?>


    <!------------------------ list ----------------------------------------------->
	

<?php default: ?>

	<?php		
            if(isset(Filter::$get['propinsi_kode']))
                $propinsi_kode = Filter::$get['propinsi_kode'];
            else
                $propinsi_kode = '';

            if(isset(Filter::$get['kota_kode']))
                $kota_kode = Filter::$get['kota_kode'];
            else
                $kota_kode = '';

            if(isset(Filter::$get['searchfield']))
                $searchfield = Filter::$get['searchfield'];
            else
                $searchfield = 'nama';
                
            if(isset(Filter::$get['searchtext']))
                $searchtext = Filter::$get['searchtext'];
            else
                $searchtext = '';
			
            if(isset(Filter::$get['sortfield']))
                $sortfield = Filter::$get['sortfield'];
            else
                $sortfield = 'pt.nama_lengkap';

            if(isset(Filter::$get['sorttype']))
                $sorttype = Filter::$get['sorttype'];
            else
                $sorttype = 'ASC';
                        
	?>

                <div class="heading">
                    <h3>Data Pengajar dan Tenaga Kependidikan (PTK)</h3>                                         
                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <div class="row-fluid">
                    <div class="span12">
                        
                        <div class="box">

                            <div class="title">
                                <h4>
                                    <span>Filter :</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            
                            <div class="content">
                                <form id="filter_form" class="form form-horizontal" method="get" action="">
                                <fieldset>
                                    <input type="hidden" name="do" value="ptk">

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span2" for="checkboxes">Propinsi:</label>
                                                <div class="span4 controls">
                                                    <?php $propinsi = $content->getPropinsiList();?>						
                                                    <select name="propinsi_kode" id="propinsi_kode" style="width:100%;" placeholder="Select...">
                                                        <option value=""><?php echo lang('SELECT_ALL');?></option>
                                                        <?php if ($propinsi):?>
                                                            <?php foreach ($propinsi as $prow):?>
                                                                <option value="<?php echo $prow->kode;?>" <?php if($prow->kode == $propinsi_kode)echo 'selected="selected"';?>><?php echo $prow->nama_propinsi;?></option>
                                                            <?php endforeach;?>
                                                            <?php unset($prow);?>
                                                        <?php endif;?>						
                                                    </select>
                                                </div>
                                                
                                                <label class="form-label span2" for="checkboxes">Kota/Kab:</label>
                                                <div class="span4 controls">
                                                    <?php $kota = $content->getKotaByPropinsiList($propinsi_kode);?>
                                                    <select name="kota_kode" id="kota_kode" style="width:100%;" placeholder="Select...">
                                                        <option value=""><?php echo lang('SELECT_ALL');?></option>
                                                        <?php if ($kota):?>
                                                            <?php foreach ($kota as $prow):?>
                                                                <option value="<?php echo $prow->kode;?>" <?php if($prow->kode == $kota_kode)echo 'selected="selected"';?>><?php echo $prow->nama_kota;?></option>
                                                            <?php endforeach;?>
                                                            <?php unset($prow);?>
                                                        <?php endif;?>						
                                                    </select>
                                                </div>                                            
                                            </div> <!-- end row-fluid -->
                                        </div> <!-- end .span12 -->                                        
                                    </div> <!-- end form-row row-fluid --> 
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span2" for="checkboxes">Search:</label>
                                                <div class="span2 controls"> 
                                                     <select name="searchfield" id="searchfield" placeholder="Select..." style="width: 100%;">
                                                         <option value="nama_lengkap" <?php if($searchfield == 'nama_lengkap') echo 'selected="selected"';?>>Nama PTK</option>
                                                         <option value="nip" <?php if($searchfield == 'nip') echo 'selected="selected"';?>>NIP</option>
                                                         <option value="nuptk" <?php if($searchfield == 'nuptk') echo 'selected="selected"';?>>NUPTK</option>
                                                         <option value="s.nama_sekolah" <?php if($searchfield == 's.nama_sekolah') echo 'selected="selected"';?>>Nama Sekolah</option>
                                                     </select>
                                                 </div>
                                                
                                                <label class="form-label span2" for="searchtext">Text:</label>
                                                <input class="span4" type="text" name="searchtext" id="searchtext" value="<?php echo $searchtext; ?>" maxlength="50">
                                                <button type="submit" class="btn btn-info">Cari</button>                                                                                                                                                                                                
                                            </div> <!-- end .row-fluid -->
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="sortfield" id="sortfield" value="<?php echo $sortfield; ?>" >
                                    <input type="hidden" name="sorttype" id="sorttype" value="<?php echo $sorttype; ?>" >                                
                                </fieldset>
                                </form>								
                            </div>

                        </div><!-- End filter .box -->

                    </div><!-- End .span12 -->
                </div><!-- End .row-fluid -->  

                <?php $rows = $content->getPTK();?>

                <div class="row-fluid">
                    <div class="span12">

                        <div id="msgholder"></div>

                        <table class="responsive table table-bordered table-striped table-sorting table-condensed">
                            <thead>
                                <tr>
                                    <th id="pt.nuptk" <?php
                                        if ($sortfield == "pt.nuptk") { 
                                            if ($sorttype == "ASC") 
                                                echo 'class="sorting_asc"'; 
                                            elseif ($sorttype == "DESC") 
                                                echo 'class="sorting_desc"'; 
                                            else 
                                                echo 'class="sorting"'; 
                                        } else 
                                            echo 'class="sorting"'; ?> width="70">NUPTK</th>
                                    <th id="pt.nama_lengkap" <?php
                                        if ($sortfield == "pt.nama_lengkap") { 
                                            if ($sorttype == "ASC") 
                                                echo 'class="sorting_asc"'; 
                                            elseif ($sorttype == "DESC") 
                                                echo 'class="sorting_desc"'; 
                                            else 
                                                echo 'class="sorting"'; 
                                        } else 
                                            echo 'class="sorting"'; ?>>Nama Lengkap</th>
                                    <th id="s.nama_sekolah" <?php
                                        if ($sortfield == "s.nama_sekolah") { 
                                            if ($sorttype == "ASC") 
                                                echo 'class="sorting_asc"'; 
                                            elseif ($sorttype == "DESC") 
                                                echo 'class="sorting_desc"'; 
                                            else 
                                                echo 'class="sorting"'; 
                                        } else 
                                            echo 'class="sorting"'; ?>>Sekolah</th>
                                    <th>Alamat Sekolah</th>
                                    <th id="p.nama_propinsi" <?php
                                        if ($sortfield == "p.nama_propinsi") { 
                                            if ($sorttype == "ASC") 
                                                echo 'class="sorting_asc"'; 
                                            elseif ($sorttype == "DESC") 
                                                echo 'class="sorting_desc"'; 
                                            else 
                                                echo 'class="sorting"'; 
                                        } else 
                                            echo 'class="sorting"'; ?>>Propinsi</th>
                                    <th id="k.nama_kota" <?php
                                        if ($sortfield == "k.nama_kota") { 
                                            if ($sorttype == "ASC") 
                                                echo 'class="sorting_asc"'; 
                                            elseif ($sorttype == "DESC") 
                                                echo 'class="sorting_desc"'; 
                                            else 
                                                echo 'class="sorting"'; 
                                        } else 
                                            echo 'class="sorting"'; ?>>Kota/Kabupaten</th>
                                    <th width="100"><button type="button" class="btn btn-mini" onclick="location.href='index.php?do=ptk&amp;action=add'"><span class="icon16 icomoon-icon-plus-2"></span>Tambah</button></th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php if(!$rows):?>
                                    <tr>
                                        <td colspan="7"><?php echo Filter::msgInfo(lang('NO_DATA'), false);?></td>
                                    </tr>

                            <?php else:?>
                            <?php foreach ($rows as $row):?>

                                    <tr>
                                        <td align="center"><?php echo $row->nuptk;?></td>
                                        <td style="text-align: left;"><?php echo $row->nama_lengkap;?></td>
                                        <td style="text-align: left;"><?php echo $row->nama_sekolah;?></td>
                                        <td style="text-align: left;"><?php echo $row->alamat;?></td>
                                        <td style="text-align: left;"><?php echo $row->nama_propinsi;?></td>
                                        <td style="text-align: left;"><?php echo $row->nama_kota;?></td>
                                        <td align="center">
                                            <a href="index.php?do=ptk&amp;action=edit&amp;id=<?php echo $row->id;?>" title="Edit" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                            <a href="javascript:void(0)" title="Hapus" class="tip doDelete" data-id="<?php echo $row->id;?>"><span class="icon12 icomoon-icon-remove"></span></a>
                                        </td>
                                    </tr>

                            <?php endforeach;?>
                            <?php unset($row);?>
                            <?php endif;?>					

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="7">
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

                    </div><!-- End .span12 -->                                        
                </div><!-- End .row-fluid -->  

	<?php echo Core::doDelete(lang('DELCONFIRM_TITLE'), "deletePTK");?>	

	<script type="text/javascript">

            $(document).ready(function () {

                $("#propinsi_kode").change(function() {

                      var kode = $("#propinsi_kode").val();

                      $.ajax({
                              type: 'post',
                              url: "controller.php",
                              data: "loadKotaList=" + kode + ":true",
                              cache: false,
                              success: function(html){
                                      $("#kota_kode").html(html); 
                              }
                      });

                      $("#kota_kode").val("");
                      $.uniform.update("#kota_kode");

                });
                  
                $(".sorting, .sorting_asc, .sorting_desc").click(function(){

                      var sortfield  = $(this).attr("id");
                      var tclass =  $(this).attr("class");

                      if (tclass == "sorting_asc")
                          sorttype = "DESC"
                      else
                          sorttype = "ASC";

                      $('input[name=sortfield]').val(sortfield);
                      $('input[name=sorttype]').val(sorttype);

                      var values = $("#filter_form").serialize();

                    location.href = "index.php?" + values;

                });
                                                

            });		  
		  		 		  
	</script>
		
<?php break;?>
<?php endswitch;?>


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
    <script type="text/javascript" src="plugins/forms/select/select2.min.js"></script>
            
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
