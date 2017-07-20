<div class="wrap">	<h2>FeedBurner Stats by <a href="http://devmd.com/" target="_blank">DevMD.com</a></h2>	<?php		# Check feed no post		$data = get_option('DEVMDFBSTATS');		if($data['uri'] != ''){				/*			-----------------------------------------------------------------------------			Time zone fix for FeedBurner			-----------------------------------------------------------------------------			*/			$DEF_TIMEZONE = date_default_timezone_get();			date_default_timezone_set('America/Cayman');						$aw = new AwAPI_DevMD_FBStats($data['uri']);			try{								/*				-----------------------------------------------------------------------------				Get historical data				-----------------------------------------------------------------------------				*/				$res = $aw -> FeedDataHistory(date('Y-m-d', (time() - (86400*365*2))));				if(!is_array($res) || count($res) == 0){					echo '<div id="message" class="error"><p><b>Data not available!</b></p></div>';				}				else{				?>					<script type="text/javascript" src="http://www.google.com/jsapi"></script>					<h3 class="devmdfbstats">Feed Subscribers, Hits And Reach History</h3>					<div id="chart_div" style="width: 700px; height: 300px; background: #F1F1F1;">Please wait...</div>					<script type="text/javascript">						// Load the Visualization API and the Annotated Time Line package.						google.load('visualization', '1', {'packages':['annotatedtimeline']});						// Set a callback to run when the Google Visualization API is loaded.						google.setOnLoadCallback(drawChart);						function drawChart() {							var data = new google.visualization.DataTable();							data.addColumn('date', 'Date');							data.addColumn('number', 'Subscribers');							data.addColumn('number', 'Hits');							data.addColumn('number', 'Reach');					  							data.addRows([							<?php								foreach($res as $r){									$tmp = explode('-', $r['date']);									echo '				[new Date('.$tmp[0].', '.(int)$tmp[1].', '.(int)$tmp[2].'), '.$r['circulation'].', '.$r['hits'].', '.$r['reach'].'],'."\n";								}							?>							]);							var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));							var startDate = new Date(<?php echo date('Y, n, j', (time() - (86400*30*6)))?>);							var endDate = new Date(<?php echo date('Y, n, j', time())?>);							chart.draw(data, {displayAnnotations: false, colors: ['#0099CC', '#00CC00', '#FF0000'], zoomStartTime: startDate, zoomEndTime: endDate, thickness: 2, displayExactValues: true});						  }					</script>				<?php				}				unset($res);								/*				-----------------------------------------------------------------------------				Get current data				-----------------------------------------------------------------------------				*/				$res = $aw -> FeedData();				if(!is_array($res) || count($res) == 0){					echo '<div id="message" class="error"><p><b>Current basic feed data not available!</b></p></div>';				}				else{				?>					<h2>Today's stats:</h2>					<h3 class="devmdfbstats"> 						Subscribers: <span class="devmdfbstats_subscribers"><?=number_format((int)$res['circulation'])?></span> &nbsp;						Hits: <span class="devmdfbstats_hits"><?=number_format((int)$res['hits'])?></span> &nbsp;						Reach: <span class="devmdfbstats_reach"><?=number_format((int)$res['reach'])?></span> &nbsp;					</h3>				<?php				}				unset($res);								/*				-----------------------------------------------------------------------------				Get current feed item data 				-----------------------------------------------------------------------------				*/								//$res = $aw -> ItemData();								$res2 = $aw -> ItemDataHistory(date('Y-m-d', (time() - 172799*2)));				$yesterday = '';				$today = '';				foreach($res2 as $day => $data){					$yesterday = $today;					$today = $day;				}				//echo $today.' '.$yesterday;				//$res2 = $res2[date('Y-m-d', (time() - 172799))]['items'];				$res = $res2[$today]['items'];				$res2 = $res2[$yesterday]['items'];								if(!is_array($res) || count($res) == 0){					echo '<div id="message" class="error"><p><b>Current feed items data is not available!</b></p></div>';				}				else{				?>					<h2>Item stats <small>(<?php echo str_replace('-', '/', $today.' to '.$yesterday)?>)</small>:</h2>					Item statistics and comparisons are shown for the last two days FeedBurner has stats for, so they might be a bit dated.					<div style="width: 700px; margin-top: 12px;">					<table class="widefat">					<thead>						<tr>							<th>Feed Item</th>							<th>Views</th>							<th class="devmdfbstats_al_right"><small>Day before</small></th>							<th>Clicks</th>							<th class="devmdfbstats_al_right"><small>Day before</small></th>						</tr>					</thead>					<tbody>					<?php					$totalViews = 0;					$db_totalViews = 0;					$totalClicks = 0;					$db_totalClicks = 0;					foreach($res as $r){						$totalViews += (int)$r['itemviews'];						$totalClicks += (int)$r['clickthroughs'];						$ccmp_views = 0;						$ccmp_clicks = 0;												if(is_array($res2) && count($res2) > 0){							foreach($res2 as $r2){								if(strcmp($r['url'], $r2['url']) == 0){									$ccmp_views = intval($r2['itemviews']);									$ccmp_clicks = intval($r2['clickthroughs']);								}							}						}						if((int)$ccmp_views < (int)$r['itemviews']){$movementViews = 'devmdfbstats_status_up';}						elseif((int)$ccmp_views == (int)$r['itemviews']){$movementViews = 'devmdfbstats_status_0';}						else{$movementViews = 'devmdfbstats_status_down';}												if((int)$ccmp_clicks < (int)$r['clickthroughs']){$movementClicks = 'devmdfbstats_status_up';}						elseif((int)$ccmp_clicks == (int)$r['clickthroughs']){$movementClicks = 'devmdfbstats_status_0';}						else{$movementClicks = 'devmdfbstats_status_down';}												$db_totalViews += (int)$ccmp_views;						$db_totalClicks += (int)$ccmp_clicks;					?>					   <tr>						 <td><a href="<?php echo $r['url']; ?>" target="_blank"><b><?php echo $r['title']; ?></b></a></td>						 <td class="devmdfbstats_numberRowViews"><span class="<?php echo $movementViews;?>"><?php echo number_format($r['itemviews']);?></span></td>						 <td class="devmdfbstats_al_right"><span><?php echo number_format((int)$ccmp_views);?></span></td>						 <td class="devmdfbstats_numberRowClicks"><span class="<?php echo $movementClicks;?>"><?php echo number_format($r['clickthroughs']);?></span></td>						 <td class="devmdfbstats_al_right"><?php echo number_format((int)$ccmp_clicks);?></td>					   </tr>					<?php } ?>					</tbody>					<tfoot>						<tr>						<th>Today's totals:</th>						<th class="devmdfbstats_numberRowViews"><?php echo number_format($totalViews)?></th>						<th class="devmdfbstats_al_right"><?php echo number_format($db_totalViews);?></th>						<th class="devmdfbstats_numberRowClicks"><?php echo number_format($totalClicks)?></th>						<th class="devmdfbstats_al_right"><?php echo number_format($db_totalClicks);?></th>						</tr>					</tfoot>					</table>					<br />					<span class="devmdfbstats_status_up"></span> - <small>More then previous day</small> &nbsp; &nbsp; &nbsp; &nbsp;					<span class="devmdfbstats_status_down"></span> - <small>Less then previous day</small> &nbsp; &nbsp; &nbsp; &nbsp;					<span class="devmdfbstats_status_0"></span> - <small>No change, equal</small> &nbsp; &nbsp; &nbsp; &nbsp;					</div>				<?php				}				unset($res);			}			catch(Exception $e){echo '<div id="message" class="error"><p><b>ERROR '.$aw -> errcode.': '.$e -> getMessage().'</b></p></div>';}		} # END IF SET URI		else{			echo '<div id="message" class="error"><p><b>You have not configured this plugin yet! <a href="options-general.php?page=devmdfbstats_settings">Click here</a> to configure it!</b></p></div>';		}		date_default_timezone_set($DEF_TIMEZONE);	?>	<br />	This WordPress plugin uses the <a href="http://devmd.com/awapi" target="_blank">FeedBurner Awareness PHP API</a> to access the FeedBurner feed data and the <a href="http://code.google.com/apis/charttools/index.html" target="_blank">Google Visualization API</a> for some charts shown on this page.</div>