
<?php 
echo '<hr size=5 color=silver><h2> ReadMe History </h2><hr size=5 color=silver >';
include('custom-table.php'); 
?>
<form action="" method="post">
<table width="60%" border="0">
   <tr>
    <th>No.</th>
    <th>ReadMe Name</th>
    <th>Created On</th>
    <th>Last Updated</th>
    <th>Update Now</th>
    <th>View</th>
  </tr>
  <?php 
  	global $wpdb;
	$n=1;
	$table_name = $wpdb->prefix."readme_creator";
	
	$res=$wpdb->get_results("select * from $table_name");

	foreach($res as $dt)
	{ 
	?>
  <tr>
    <td><?php echo $n."."; ?></td>
    <td><?php echo $dt->rm_plgname; ?></td>
    <td><?php echo $dt->rm_create_date; ?></td>
    <td><?php echo $dt->rm_update_date; ?></td>
    <td><a href="?page=readme&rm_edit=<?php echo $dt->rm_id; ?>" >Edit</a></td>

    <td><!--<input name="download" type="submit" value="Download" />--> <a href="?page=history&rm_view=<?php echo $dt->rm_id; ?>" >
	<button>View</button></a></td>
  </tr>
  <?php   $n++; } ?>
    <tr>
    <th>No.</th>
    <th>ReadMe Name</th>
    <th>Created On</th>
    <th>Last Updated</th>
    <th>Update Now</th>
    <th>View</th>
  </tr>
</table>
</form>

<?php include('js/jquery-latest.php'); ?>

<script type="text/javascript">
	$(document).ready(function() {
	
    $('#dnlreadme').click(function() { 
		
    });
});
</script>


<?php
	if(isset($_GET['rm_view']))
	{
		$rm_view = $_GET['rm_view'];
		global $wpdb;
		$table_name = $wpdb->prefix . "readme_creator";
		$rm = $wpdb->get_row("select * from $table_name where `rm_id`=$rm_view");
		
		?>
		<a href="../wp-content/plugins/readme-creator/demo/readme.txt" target="_blank"><button name="dnlreadme" id="dnlreadme">Downlaod ReadMe</button></a>

		<br /><br />
		
		<p> 
			=== <?php echo $rm->rm_plgname; ?> ===<br />
			Contributors: <?php echo $rm->rm_cntbtr; ?><br />
			Donate link: <?php echo $rm->rm_dntlink; ?><br/>
			Tags: <?php echo $rm->rm_tags; ?><br />
			Requires at least: <?php echo $rm->rm_reqatleast; ?><br />
			Tested up to: <?php echo $rm->rm_testupto; ?><br />
			Stable tag: <?php echo $rm->rm_stbtag; ?><br />
			<pre><?php echo $rm->rm_stdesc; ?></pre>
		</p>
		<p>== Description ==</p>
			<pre><?php echo $rm->rm_lngdesc; ?> </pre>
			<pre><?php echo "[Donate Here:](".$rm->rm_dntlink.")"; ?> </pre>
			
		<p>== Installation ==</p>
			<pre><?php echo $rm->rm_intist; ?> </pre>
			
		<p>== Frequently Asked Questions ==</p>	
			<pre><?php echo $rm->rm_faq; ?> </pre>
		
		<p>== Screenshots ==</p>
		
			<pre><?php echo $rm->rm_fsd; ?> </pre>

			<pre><?php echo $vd=$rm->rm_video; ?></pre>
			
			
		<p>== Changelog ==</p>
			<pre><?php echo $changelg=$rm->rm_chnglg; ?></pre>
			<pre><?php echo $changelg=$rm->rm_arbsect; ?></pre>
				
			
		<p>==ReadMe Creator==</p>
			<pre>This Readme file was generated using ReadMe Creator(Version 1.0) which is designed by Mr. ANKIT AGARWAL, Mr. FARAZ KHAN, Mr. HARI MALIYA.</pre>	
			
<?php

$one =
"=== ".$rm->rm_plgname." ==="."
Contributors: " .$rm->rm_cntbtr ."
Donate link: ".$rm->rm_dntlink ."
Tags: ".$rm->rm_tags."
Requires at least: ".$rm->rm_reqatleast."
Tested up to: ".$rm->rm_testupto."
Stable tag: ".$rm->rm_stbtag."

". $rm->rm_stdesc."

== Description ==

".$rm->rm_lngdesc."

[Donate Here:](".$rm->rm_dntlink.")

== Installation ==

".$rm->rm_intist."

== Frequently Asked Questions ==

".$rm->rm_faq."

== Screenshots ==

".$rm->rm_fsd."
".
$rm->rm_video."

== Change Log =="."

".$rm->rm_chnglg."
".$rm->rm_arbsect."

== ReadMe Creator ==

This Readme file was generated using ReadMe Creator(Version 1.0) developed by Mr. ANKIT AGARWAL, Mr. FARAZ KHAN, Mr. HARI MALIYA.";


	$crt = $one;
	
	$filename = "../wp-content/plugins/readme-creator/demo/readme.txt";
	
	$f = fopen($filename, "w+");
	if($f)
	{
		fwrite($f, $crt);
	}
	fclose($f);		
	

//echo $file = plugins_url()."/readme-creator/demo/readme.txt";

/*header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
header("Content-Type: application/force-download");
header("Content-Length: " . filesize($file));
header("Connection: close");
readfile($file);*/

/*	header('Content-Type: application/download');
    header('Content-Disposition: attachment; filename="readme.txt"');
    header("Content-Length: " . filesize("../wp-content/plugins/readme-creator/demo/readme.txt"));

    $fp = fopen("../wp-content/plugins/readme-creator/demo/readme.txt", "r");
    fpassthru($fp);
    fclose($fp);*/


}
?>

