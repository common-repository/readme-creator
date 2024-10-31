
<?php 
	echo "<hr size=5 color=silver>";
	echo '<h2> Create New Plugin Readme ';
	echo "</h2><hr size=5 color=silver>";

	if(isset($_GET['rm_edit']))
	{
	 $id = $_GET['rm_edit'];
	 global $wpdb;
	 $table_name = $wpdb->prefix."readme_creator";
	 $r = $wpdb->get_row("SELECT * FROM $table_name WHERE rm_id = $id");
	}
?>


<form id="form1" name="form1" method="post" action="" class="redmeForm">

		  <fieldset class="inlineLabels" >
          <legend>Required fields</legend>

          <div class="ctrlHolder">
            <label for="pluginname"><em>*</em>Plugin Name
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Give a plugin name without  any special charcter ."/>
			</label>
            <input name="pluginname" id="pluginname" value="<?php echo $r->rm_plgname; ?>" size="35" class="textInput" type="text">
			
			<p class="formHint"><samp id="pname"></samp></p>
		 </div>

          <div class="ctrlHolder">
            <label for="contributors"><em>*</em>Contributors
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Give contributors name comma separated list usernames"/>
			</label>
            <input name="contributors" id="contributors" value="<?php echo $r->rm_cntbtr; ?>" size="35" class="textInput" type="text">
			
			<p class="formHint">Contributors" is a comma separated list of wp.org/wp-plugins.org usernames	<samp id="cb"></samp> </p>
           
          </div>

          <div class="ctrlHolder">
            <label for="tags"><em>*</em>Tags
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Give searching tags"/>
			</label>
            <input name="tags" id="tags" value="<?php echo $r->rm_tags; ?>" size="35" class="textInput" type="text">
			
			<p class="formHint">"Tags" is a comma separated list of tags that apply to the plugin <samp id="tg"></samp> </p>
           
          </div>

          <div class="ctrlHolder">
            <label for="requires"><em>*</em>Requires at least
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Lowest version that the plugin will work on"/>
			</label>
            <input name="requires" id="requires" value="<?php echo $r->rm_reqatleast; ?>" size="35" class="textInput" type="text">
			
			<p class="formHint">"Requires at least" is the lowest version that the plugin will work on <samp id="rq"></samp></p>
           
          </div>

          <div class="ctrlHolder">
            <label for="tested"><em>*</em>Tested up to
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Highest version that the plugin will work on"/>
			</label>
            <input name="tested" id="tested" value="<?php echo $r->rm_testupto; ?>" size="35" class="textInput" type="text">
			
			<p class="formHint">"Tested up to" is the highest version that you've *successfully used to test the plugin*.
			 Note that it might work on higher versions... this is just the highest one you've verified. <samp id="tu"></samp></p>
          
          </div>

          <div class="ctrlHolder">
            <label for="stable"><em>*</em>Stable Tag
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Give a plugin version"/>
			</label>
            <input name="stable" id="stable" value="<?php echo $r->rm_stbtag; ?>" size="35" class="textInput" type="text">
			
            <p class="formHint">Stable tag should indicate the Subversion "tag" of the latest stable version, 
			or "trunk," if you use `/trunk/` for stable. If no stable tag is provided, it is assumed that trunk is stable,
			 but you should specify "trunk" if that's where you put the stable version, in order to eliminate any doubt. <samp id="st"></samp></p>
          </div>

          <div class="ctrlHolder">
            <label for="shortdesc"><em>*</em>Short Description
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Description of the Plugin"/>
			</label>
            <textarea name="shortdesc" id="shortdesc" rows="3" cols="25" ><?php echo $r->rm_stdesc; ?></textarea>
			<p class="formHint">Description of the Plugin in less than 2 - 3 sentences. Maximum 150 characters, rest will be truncated. <samp id="sd"></samp></p>
          </div>
</fieldset>
 
 <fieldset class="inlineLabels">
 
          <legend>Optional fields</legend>
		  <div class="ctrlHolder">
		 	 <label>Long Description
			 <img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Detailed description of the Plugin"/>
			 </label>
			 <textarea name="longdesc" id="sdesc" rows="3" cols="25" maxlength="150"><?php echo $r->rm_lngdesc; ?></textarea>
			 
			 <p class="formHint">Detailed description of the Plugin. If it is not specified then the short description is used </p>
  			</div>
			 
			<div class="ctrlHolder">
            <label for="tested">Donate Link
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Give a  funding link for plugin  development"/>
			</label>
            <input name="dntlink" id="dntlink" value="<?php echo $r->rm_dntlink; ?>" size="35" class="textInput" type="text">
			
			<p class="formHint">If you accept donations then specify the link to your donations page <samp id="dtl"></samp></p>
  			</div>
		 	
			  <div class="ctrlHolder">
		 	 <label>Installation Instruction
			  <img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Describe how to install the Plugin"/>
			 </label>
			 <textarea name="intist" id="intist" rows="3" cols="25" ><?php echo $r->rm_intist; ?></textarea>
			
			 <p class="formHint">Describe how to install the Plugin and get it working</p>
			 </div>
			 
			  <div class="ctrlHolder">
		 	 <label>Frequently Asked Questions
			  <img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="FAQ about plugin"/>
			 </label>
			 <textarea name="faq" id="faq" rows="3" cols="25" ><?php echo $r->rm_faq; ?></textarea>
			
			 <p class="formHint">Frequently Asked Questions (if any)</p>
			 </div>
			 
			 
			 <!--ChangeLog Part-->
			  <div class="ctrlHolder">
			  <label>Change Log
			  <img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Plugin development history"/>
			  </label>
 			 <textarea name="cnglog" id="cnglog" rows="1" cols="25" ><?php echo $r->rm_chnglg; ?></textarea>
			 <p class="formHint">Change Log (if any)</p>
			 </div>
			 
			 <div class="ctrlHolder">
		 	 <label>Screenshot Description
			  <img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Description for screenshots"/>
			 </label>
			 <textarea name="fsd" id="fsd" rows="3" cols="25" ><?php echo $r->rm_fsd;?></textarea>
			
			 <p class="formHint">Description for screenshots. The file should be named screenshot-1.(png|jpg|jpeg|gif) 
			 and should be placed in the directory of the stable readme.txt. The file extension can be any one of these png, jpg, jpeg, gif</p>
			 </div>
			 <!--Screenshot Part End-->

			 
			 
			 
		 <!--Video Link Part-->
		<div class="ctrlHolder">
		
            <label for="tested">Video Link
			<img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Link of video tutorial for plugin"/>
			</label>
			<textarea name="video" id="video" rows="3" cols="25" ><?php echo $r->rm_video;  ?></textarea>
			
			<p class="formHint">If it is a Youtube or Vimeo video, then enter the video url. If it is a wordpress.tv video, 
			then enter the video 	id.<samp id="vd"></samp></p>
		 </div>
		 <!--Video Link Part End-->
		 
						 
			 <div class="ctrlHolder">
		 	 <label>Arbitrary section
			  <img src="<?php echo plugins_url().'/readme-creator/tooltip/help.png'; ?>" class="vtip"  title="Provide arbitrary information"/>
			 </label>
			 <textarea name="arbsect" id="arbsect" rows="3" cols="25" ><?php echo $r->rm_arbsect; ?></textarea>
			
			 <p class="formHint">You may provide arbitrary information here. This may be of use for extremely complicated plugins where more information needs
			  to be conveyed that doesn't fit into the categories of "description" or "installation." </p>
			 </div>
			 
			  
			  
		  
 </fieldset>	
  <div class="buttonHolder">
  			<?php if(isset($_GET['rm_edit']))
			{
				echo "<input id='up_rm' class='submitButton' type='submit' value='Update Readme' name='up_rm' />";
				echo "<input id='hidden_up' class='submitButton' type='hidden' value='".$_GET['rm_edit']."' name='hidden_up' />";
			}
			else
			{
           		echo "<input class='submitButton' name='sub_rm' type='submit' id='sub_rm' value='Create Readme' />";
			}
			?>
          	<input  id="reset" class="submitButton"  name="" type="reset" />
			
 		</div>
 	  


</form>

<?php 

	// insert readme data 
	if(isset($_POST['sub_rm']))
	{
		$plg_name = $_POST['pluginname'];
		$cntbtr = $_POST['contributors'];
		$tags  = $_POST['tags'];
		$reqatleast  = $_POST['requires'];
		$testupto  = $_POST['tested'];
		$stdtags  = $_POST['stable'];
		$stddesc  = $_POST['shortdesc'];
		$lngdesc  = $_POST['longdesc'];
		$dntlink  = $_POST['dntlink'];
		$intist  = $_POST['intist'];
		$faq  = $_POST['faq'];
		$chnglg  = $_POST['cnglog'];
		$chnglgpnt  = "";
		$fsd  = $_POST['fsd'];
		$ssd  = "";
		$video  = $_POST['video'];
		$arbsect  = $_POST['arbsect'];
		$cdate = date("Y-m-d");
		$udate = date("Y-m-d");
		
		global $wpdb;
		
		$table_name = $wpdb->prefix ."readme_creator";
			
		
		$insert="INSERT INTO $table_name (
				`rm_id` ,
				`rm_plgname` ,
				`rm_cntbtr` ,
				`rm_tags` ,
				`rm_reqatleast` ,
				`rm_testupto` ,
				`rm_stbtag` ,
				`rm_stdesc` ,
				`rm_lngdesc` ,
				`rm_dntlink` ,
				`rm_intist` ,
				`rm_faq` ,
				`rm_chnglg` ,
				`rm_chnglgpnt`,
				`rm_fsd` ,
				`rm_ssd` ,
				`rm_video` ,
				`rm_arbsect`,
				`rm_create_date`,
				`rm_update_date`				
				)
				VALUES (
				NULL , '$plg_name', '$cntbtr', '$tags', '$reqatleast', '$testupto', '$stdtags', '$stddesc', '$lngdesc', '$dntlink', '$intist', '$faq', '$chnglg', '$chnglgpnt', '$fsd', '$ssd', '$video', '$arbsect', '$cdate', '$udate'
				);
				";
					$wpdb -> query($insert);
				?>
				<script>location.href="?page=history";</script>";
				<?php

	}
	

	
	// update readme data 
	if(isset($_POST['up_rm']))
	{
		$plg_name = $_POST['pluginname'];
		$cntbtr = $_POST['contributors'];
		$tags  = $_POST['tags'];
		$reqatleast  = $_POST['requires'];
		$testupto  = $_POST['tested'];
		$stdtags  = $_POST['stable'];
		$stddesc  = $_POST['shortdesc'];
		$lngdesc  = $_POST['longdesc'];
		$dntlink  = $_POST['dntlink'];
		$intist  = $_POST['intist'];
		$faq  = $_POST['faq'];
		$chnglg  = $_POST['cnglog'];
		$chnglgpnt  = "";
		$fsd  = $_POST['fsd'];
		$ssd  = "";
		$video  = $_POST['video'];
		$arbsect  = $_POST['arbsect'];
		//$cdate = date("Y-m-d");
		$udate = date("Y-m-d");
		
		$up_id = $_POST['hidden_up'];
		
		
		
		global $wpdb;
		
		$table_name = $wpdb->prefix ."readme_creator";
			
		
		$update="UPDATE $table_name SET `rm_plgname` = '$plg_name',
				`rm_cntbtr` = '$cntbtr',
				`rm_tags` = '$tags',
				`rm_reqatleast` = '$reqatleast',
				`rm_testupto` = '$testupto',
				`rm_stbtag` = '$stdtags',
				`rm_stdesc` = '$stddesc',
				`rm_lngdesc` = '$lngdesc',
				`rm_dntlink` = '$dntlink',
				`rm_intist` = '$intist',
				`rm_faq` = '$faq',
				`rm_chnglg` = '$chnglg',
				`rm_chnglgpnt` = '$chnglgpnt',
				`rm_fsd` = '$fsd',
				`rm_ssd` = '$ssd',
				`rm_video` = '$video',
				`rm_arbsect` = '$arbsect ',
				`rm_update_date` = '2012-01-06' WHERE `rm_id` = '$up_id';";

					$wpdb -> query($update);
				
				?>
				<script>location.href="?page=history";</script>";
				<?php
	}

?>