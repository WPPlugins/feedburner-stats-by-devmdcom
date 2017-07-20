<div class="wrap">
	<h2>Settings for FeedBurner Stats by <a href="http://devmd.com/" target="_blank">DevMD.com</a></h2>
	<?php	
		# Update options
		if (isset($_POST['update_devmdfbstats'])){
			$data['uri'] = attribute_escape(trim($_POST['uri']));
			update_option('DEVMDFBSTATS', $data);
			# Check feed status
			if($data['uri'] != ''){	
				try{
					$aw = new AwAPI_DevMD_FBStats($data['uri']);
					$res = $aw -> FeedDataHistory(date('Y-m-d', (time() - (86400*3))));
					echo '<div id="message" class="updated"><p><b>You have configured this plugin successfully!</b></p></div>';
				}
				catch(Exception $e){
					//if((int)$aw -> errcode != 0){
						echo '<div id="message" class="error"><p><b>ERROR '.$aw -> errcode.': '.$e -> getMessage().'</b></p></div>';
					//}
				}
			}
			
		}
		# Check if plugin is configured
		$data = get_option('DEVMDFBSTATS');
		if($data == false || $data['uri'] == ''){
			echo '<div id="message" class="error"><p><b>You have not configured this plugin yet!</b></p></div>';
		}
		
		# Check feed no post
		if (!isset($_POST['update_devmdfbstats'])){
			if($data['uri'] != ''){	
				try{
					$aw = new AwAPI_DevMD_FBStats($data['uri']);
					$res = $aw -> FeedDataHistory(date('Y-m-d', (time() - (86400*3))));
				}
				catch(Exception $e){
				
					//if((int)$aw -> errcode != 0){
						echo '<div id="message" class="error"><p><b>ERROR '.$aw -> errcode.': '.$e -> getMessage().'</b></p></div>';
					//}
				}
			}
		}
	?>
	In order to use the FeedBurner Stats by DevMD.com plugin for your WordPress FeedBurner feed, you will have to update the feed URI. For example if your FeedBurner feed URL is:
	<em>http://feeds.feedburner.com/<b>devmd</b></em>, the last part in bold is the URI of your feed, in this case "devmd".
	<form method="post">
	<?php wp_nonce_field('update-options'); ?>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><b>Feed URI:</b></th>
			<td>http://feeds.feedburner.com/<input type="text" name="uri" value="<?php echo $data['uri']; ?>" /></td>
		</tr>
	</table>
	<div>
		<p class="submit">
			<input type="submit" class='button-primary' name="update_devmdfbstats" value="Update options!" />
		</p>
	</div>
	</form>
</div>