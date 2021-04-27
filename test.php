<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	</head>
			
    <?php $this->load->view('common/header'); ?>
            
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs" id="breadcrumbs">
			   <ul class="breadcrumb uppercase">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?php echo site_url('dashboard'); ?>">HOME</a>
					</li>
					<li>General Accounts</li>
					<li>Accounts Setup</li>
					<li class="active"><?php echo strstr($title, '-', true) ?></li>
				</ul><!-- /.breadcrumb -->
			</div>
	
			<div class="page-content">
				<?php $this->load->view('common/ace_setting'); ?>
				<div class="row">
					<div class="text-center addFormContent" >
						<!-- PAGE CONTENT BEGINS -->
						<div id="widget-container-col-12" class="col-xs-12 col-md-12 col-lg-12 col-sm-12 widget-container-col ui-sortable">
							<div id="widget-box-11" class="widget-box  ui-sortable-handle">
								<div class="widget-header">
									<h4 class="widget-title panelHeaderTex"><?php echo strstr($title, '-', true) ?></h4>
										<?php $this->load->view('common/minimizePart'); ?>
								</div>
								
								<div class="widget-body ">
									<div class="widget-main padding-4"  style="position: relative;">
										<div class="scroll-content">
											<form class="form-vertical text-left" id="addForm" role="form" action="<?php echo site_url('accountGroup/saveGroupData'); ?>" enctype="multipart/form-data" method="post">
												<input autocomplete="off" type="hidden" class="form-control" name="update_id" id="id"  />
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
                                                            <label class="control-label" for="parent_id">Parent Name<span class="req">*</span> </label>
                                                            <select name="parent_id" id="parent_id" class="chosen-select form-control" required>
                                                                <option value="">--Select One--</option>
                                                                <?php if(!empty($groupList)) :?>
                                                                    <?php foreach($groupList as $g_list) :?>
                                                                        <?php 
                                                                            $length = (strlen($g_list->auto_code) - 2);
                                                                            $widthSpace = ($length * 3);
                                                                        ?>
                                                                        <?php if(empty($g_list->code)):?>
                                                                            <option value="<?php echo $g_list->id; ?>"><?php echo str_repeat('&nbsp;', $widthSpace). $g_list->group_name; ?></option>
                                                                        <?php else: ?>
                                                                            <option value="<?php echo $g_list->id; ?>"><?php echo str_repeat('&nbsp;', $widthSpace). $g_list->group_name.'-'.$g_list->code; ?></option>
                                                                        <?php endif ?>
                                                                    <?php endforeach ?>
                                                                <?php endif ?>
                                                            </select>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label" for="name">Name <span class="req">*</span> </label>
                                                                <input autocomplete="off" name="name" id="name" placeholder="Name" class="form-control">
																
															</div>
														</div>
													</div>
												</div>	
													
												<div class="col-md-12 hideMobile  hr  hr-dotted"></div>	
													
												<div class="col-md-6">
													<div class="form-group">
													    <label class="control-label" for="code">Code </label>
														<input autocomplete="off" name="code" id="code" placeholder="Code" class="form-control">
													</div> 
												</div>

												<div class="col-md-6">
											    	<div class="form-group">
													    <label class="control-label" for="status">Status </label>
														<select id="status" name="status" class="form-control" >
                                                            <option value="1" >Active</option>
                                                            <option value="0" >Inactive</option>
                                                        </select>
													</div>
												</div> 		
												<div class="modal-footer col-md-12">
													<button class="btn btn-sm btn-danger formCancel" type="button">
														<i class="ace-icon fa fa-times"></i>
														Cancel
													</button>
													
													<button class="btn btn-sm btn-primary" type="submit">
														<i class="ace-icon fa fa-check"></i>
														<span class="update"> Submit </span>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- PAGE CONTENT ENDS -->
					</div>
				</div><!-- End Form Part -->

				<?php //if(isset($head_list)){ ?>
				<div class="col-md-12" style="height: 10px;"></div>
				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
						<div class="table-header">
							<?php echo strstr($title, '-', true) ?> List  &nbsp;&nbsp;&nbsp;&nbsp;
							
						</div>
						<!-- div.dataTables_borderWrap -->
						<div id="listView">
							<?php if(!empty($list)):?>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th width="5%" class="text-center">#</th>
										<th class="text-center">Name</th>
										<th class="text-center">Code</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>

								<tbody id="listSetHere">
									<?php
										 $i	= $onset+1;
										 foreach($list as $key=>$row ):
											
										$length     = (strlen($row->auto_code) - 3);
										$widthSpace = $length * 3;   
										?>
										<tr>
											<td class="text-center"><?php echo $i++; ?></td>
											<td><?php echo str_repeat('&nbsp;', $widthSpace).$row->group_name ;?></td>
											<td  class="text-center"><?php echo $row->code ?: 'N/A' ;?></td>
											<td class="text-center">
												<?php if($row->row_status == 1) :?>
													Active
												<?php else :?>
													Inactive
												<?php endif ;?>
											</td>
											<td  class="text-center">
												<?php if($row->edit_status == 1 ) :?>
												<div class="btn-group">
													<button class="btn btn-xs btn-info editGroup" data-id="<?php echo $row->id ?>" data-rel="tooltip" title="Edit" data-placement="bottom">
														<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button>
												</div>
												<?php else :?>
													N/A
												<?php endif; ?>
											</td>
										</tr>

									<?php endforeach; ?>
                                </tbody>
							</table>
							<label class="pos-rel"><span class="lbl"></span></label>

								<ul class="pagination-sm list-inline pull-right no-margin">
									<li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
								</ul>
							<?php else :?>
							<div class="col-md-12">
								<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>Oh snap! Account Group is Empty!</h4> <p>System could not find anything information.</p>  </div>

							</div>
							<?php endif?>
						</div>
					</div>
				</div> <!-- End Table Part -->
				<?php //} ?>
				<!-- PAGE CONTENT ENDS -->
			</div>
	    </div><!-- /.page-content -->
	</div>
        
        <!-- inline scripts related to this page -->
	
	 <?php $this->load->view('common/jsLinkPage'); ?>	
     <?php $this->load->view('common/footer'); ?>
	<script type="text/javascript">
		$( "#addForm").submit(function(e)
		{	
			var x	= confirm("Are You Sure to Submit?");
			if(!x) { return false; }
			$('button').attr('disabled', 'disabled');
			$('.update').text('Please Wait...');
			var formURL = $(this).attr('action');
			$('#loading').css('display', 'block');
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data: new FormData(this), 
				dataType: "html",
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             
				processData:false,  
				success:function(data){
					location.reload();
				}
			});
			$('#loading').css('display', 'none');
			e.preventDefault();
		});
		//update data by ajax
		$(document).on("click", ".editGroup", function(e) {
			var id 		= $(this).attr("data-id");
			var formURL = "<?php echo site_url('accountGroup/edit/account_groups/id'); ?>";
			$('#loading').css('display', 'block');
			$.ajax({
				url 	: formURL,
				type 	: "POST",
				data 	: {id: id},
				dataType: "json",
				
				success :function(data){
					//console.log(data);
					$('#id').val(data.id);
					$('#parent_id').val(data.parent_id).trigger("chosen:updated.chosen");
					$('#name').val(data.group_name);
					$('#code').val(data.code);
					$('#status').val(data.row_status);
					$('.update').text("Update");
					

					$("html, body").animate({ scrollTop: 0 }, "slow");
					$('#loading').css('display', 'none');
				}
			});
			
			e.preventDefault();
		});


	</script>
