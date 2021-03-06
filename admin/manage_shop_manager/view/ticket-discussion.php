 <!-- Page Wrapper -->         
<div class="page-wrapper viewtaskpage" style="min-height: 608px;">
  <div class="chat-main-row">
    <div class="chat-main-wrapper">
      <div class="col-lg-7 message-view task-view task-left-sidebar">
        <div class="chat-window">
          <div class="fixed-header">
            <div class="navbar">
              <div class="float-left mr-auto">
                <div class="add-task-btn-wrapper">                                    <span class="add-task-btn btn btn-white btn-sm">                                    View Ticket                                    </span>                                 </div>
              </div>
              <a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>                                                         
            </div>
			<?php //print_r($user);?>
          </div>
          <div class="chat-contents">
            <div class="chat-content-wrap">
              <div class="chat-wrap-inner">
                <div class="chat-box">
                  <div class="task-wrapper">
                    <div class="task-list-container">
                      <div class="task-list-body">
                        <div class="row ticket-viewdiv">
                          <div class="col-sm-12">
                            <div class="form-group"> 
							  <label>Ticket Name : 	</label> <?=$ticket_record->subject?>
							 </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group"> 
							<label>Ticket :</label> <?=$ticket_record->id?>
							</div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
							<label>Subject :</label><?=$ticket_record->subject?>
							</div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">	
							<label>Category :</label><?=$ticket_record->category?>
							</div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">	
							<label>Status  : </label><?php if($ticket_record->status) {echo "Closed";}else{echo "Open";} ?>												  						
							</div>
                          </div>
                        </div>
                        <div class="row ticket-viewdiv">
                          <div class="col-sm-6">
                            <div class="form-group">	
							<label>Start Date :</label><?=date('M d Y h:i A', strtotime($ticket_record->created_at))?>												 					
							</div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
							<label>Assigned To : </label> john deo  												  				
							</div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Description</label>										
                          <div class='description' > 
						  <?=  strip_tags($ticket_record->description)?> 	
						  <?php //  html_entity_decode($ticket_record->description)?>                                         </div>
                        </div>
                         
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title m-b-20">Uploaded files</h5>
                            <ul class="files-list">
                              <?php if($ticket_record->attachment!=""): ?>                                                                   	<?php		
									$attachmentArary= json_decode($ticket_record->attachment);
							///print_r( $d); 
							  foreach($attachmentArary as $attachment ) {
								  ?>         										
                              <li>
                                <div class="files-cont">
                                  <div class="file-type"> 
								  <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>												</div>
								  
                                  <div class="files-info">
                                    <span class="file-name text-ellipsis"><a href="<?=PRD_PLUGIN_URL .'/'.$attachment?>"><?=$attachment?></a></span>													
                                    <!---div class="file-size">Size:<?php echo getimagesize( PRD_PLUGIN_URL .'/'.$attachment);?>
									</div-->
                                  </div>
								  
                                  <!--ul class="files-action">													<li class="dropdown dropdown-action">														<a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>														<div class="dropdown-menu dropdown-menu-right">															<a class="dropdown-item" href="javascript:void(0)">Download</a>															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>															<a class="dropdown-item" href="javascript:void(0)">Delete</a>														</div>													</li>												</ul-->											
                                </div>
                              </li>
							  <?php } ?>
                              <?php else: ?>                                       
                              <li>                                        No attachment.										</li>
                              <?php endif; ?>										 
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="notification-popup hide">
                    <p>                                          <span class="task"></span>                                          <span class="notification-text"></span>                                       </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
        <div class="chat-window">
          <div class="fixed-header">
            <div class="navbar">
              <div class="task-assign">
                <div class="text-right" style=" float: left;">
                  <form class="form-ticketreply" enctype="multipart/form-data" method="post">                      
				  <input type="hidden" name="ticket_close_authorized_executive" >                 
				  <input type="hidden" name="ticket" value="<?= $ticket_record->id ?>">                    
				 
				  <button class="btn btn-primary close-ticket" type="submit">CLOSE TICKET</button>

				  </form>
                </div>
				<?php if($recordDeleteAccess) { ?>
                <div class="text-right" style=" float: left;margin-left:20px">
                  <form class="form-ticketreply" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to Delete this Ticket?');" method="post">							<input type="hidden" name="ticket_delete_authorized_executive" >							<input type="hidden" name="ticket" value="<?= $ticket_record->id ?>">							<button class="btn btn-danger  btn-sm" type="submit">Delete</button>					</form>
                </div>
				<?php } ?>
              </div>
              
            </div>
          </div>
          <div class="chat-contents task-chat-contents">
            <div class="chat-content-wrap">
              <div class="chat-wrap-inner">
                <div class="chat-box">
                  <div class="chats">
                    <h4>Ticket NAME</h4>
                    <div class="task-header">
                      <div class="assignee-info">
                        <a href="#" data-toggle="modal" data-target="#assignee">
                          <div class="avatar">                                                   <img alt="" src="<?php echo esc_url( get_avatar_url($user->ID ) ); ?>">                                                </div>
                          <div class="assigned-info">
                            <div class="task-head-title">Assigned To</div>
                            <div class="task-assignee"><?php echo   $user->display_name  ; ?></div>
                          </div>
                        </a>
                        <span class="remove-icon">                                             <i class="fa fa-close"></i>                                             </span>                                          
                      </div>
               
                    </div>
                    <hr class="task-line">
                    <div class="task-desc">
                      <div class="task-desc-icon">                                             <i class="material-icons">subject</i>                                          </div>
                      <div class="task-textarea">                                             <textarea class="form-control" placeholder="Description"></textarea>                                          </div>
                    </div>
                    <hr class="task-line">
                    <?php if($discussion){     									  									       foreach($discussion as $chat): 		 
					$chatPostion='left';			
					$username='';				
					if($chat->from_id == $call->user_id()) {
						$chatPostion='right';		
						$username="You";		
						}else{				
						$chatPostion='left';
						
						$username=  $this->get_user_field($chat->from_id).'('.$this->get_user_role($chat->from_id).')';
						}  									
	   ?>                                       
                    <div class="chat chat-<?=$chatPostion?>">
                      <div class="chat-avatar">                                             <a href="#" class="avatar">                                             <img alt="" src="<?php echo esc_url( get_avatar_url( $call->user_id() ) ); ?>">                                             </a>                                          </div>
                      <div class="chat-body">
                        <div class="chat-bubble">
                          <div class="chat-content">
                            <?php if($chat->private_ticket): ?>			 												
                            <h4 class="text-danger">Private Note</h4>
                            <?php endif; ?>                                                   <span class="task-chat-user"><?=$username;?></span> <span class="chat-time"><?=date('M d Y h:i A', strtotime($chat->created_at))?></span>                                                   <?php  if($chat->comment!=""){   ?>													   
                            <p><?=$chat->comment?> </p>
                            <?php }												   if($chat->attachment!=""){   ?>													  
                            <ul class="attach-list">
                              <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <?php $call->get_upload_dir_path(); ?> <a href="<?=$call->get_upload_dir_path().$chat->attachment?>" download="">Download (<?= $chat->attachment;?> )</a>													  													  
                             
                              </li>                                                    
                            </ul>
                            <?php }  ?>                                                                                                   
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>            
					<?php } ?>                                            
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="chat-footer"> 
            <form class="form-chat-message" name='form-chat-message' enctype="multipart/form-data" method="post">
              <div class="message-bar">
                <div class="message-inner">
                  <input type="file" name="myfile" id="uploadchatImage" style='display:none'/>     <i class="showonhover fa fa-paperclip"></i>                                  
                  <div class="message-area">
                    <div class="input-group"> 
    					<textarea id="description" name="comment" class="form-control" placeholder="Type message..." required ></textarea>
						<span class="input-group-append">									   <input type="hidden" name="ticket_create_authorized_executive" >                                 
						<input type="hidden" name="ticket" value="<?= $ticket_record->id ?>">
						   <?php if($ticket_record->status == 0): ?><button class="btn btn-primary" type="submit"  id='form-chat-buttonId'  >
						<i class="fa fa-send"></i>
						</button>    <?php endif; ?>   
						</span>       
						</div>
                  </div>
                </div>
            </form>
			 
            </div>                                                 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Page Wrapper -->		
 	 