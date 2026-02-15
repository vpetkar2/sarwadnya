<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
error_reporting(E_ALL);

//ini_set("display_errors", true);
//include("classes/config.php");

$host = "localhost";
$dbname = "parth_db";
$username = "parth_user";
$password = "(-NbQr8cXw6O";

$link = mysqli_connect($host, $username, $password);
if (! $link) die(mysqli_error($link));
$db = mysqli_select_db($link, $dbname) or die("Couldn't open $dbname: ".mysqli_error());


define("ROOT", "");
define("SITE_URL", "https://www.parthfibrotech.in");
define("SECURE_SITE_URL", "https://www.parthfibrotech.in");

$all_urls = [];

$i=0;
// Product List
$select  = " select pf_product.*, pf_city.name city_name from pf_product left join pf_city on pf_city.id = pf_product.prod_city_id";
$result = mysqli_query($link, $select);
while($row = mysqli_fetch_assoc($result))
{
	$prod_cat_id = $row['prod_cat_id'];
?>
<url><loc><?php echo SITE_URL.strtolower("/{$row['city_name']}/").strtolower($row["prod_url"]); ?></loc></url>
<?php
$i++;
}


// Category List
$select  = " select pf_category.*, pf_city.name city_name from pf_category left join pf_city on pf_city.id = pf_category.city_id";
$result = mysqli_query($link, $select);
while($row = mysqli_fetch_assoc($result))
{
	if($row["slug"]=='') continue;
	
$all_urls[] = "
<url><loc>".SITE_URL."/".strtolower($row['city_name'])."/".strtolower(str_replace(" ","-",$row["slug"]))."</loc></url>
";


$i++;
}

// Blog List
$select  = " select * from pf_blog";
$result = mysqli_query($link, $select);
while($row = mysqli_fetch_assoc($result))
{
	if($row["slug"]=='') continue;
	
$all_urls[] = "
<url><loc>".SITE_URL."/blog/detail/".strtolower($row['slug'])."</loc></url>
";

$i++;
}



array_unique($all_urls);

foreach ($all_urls as $key => $value) {
	echo $value;
}



?>
<url><loc>https://www.parthfibrotech.in/</loc></url>
<url><loc>https://www.parthfibrotech.in/about-us</loc></url>
<url><loc>https://www.parthfibrotech.in/blog</loc></url>
<url><loc>https://www.parthfibrotech.in/carrier</loc></url>
<url><loc>https://www.parthfibrotech.in/contact-us</loc></url>
</urlset>