<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$base_url_https = "https://sarwadnyaplay.com/";
$base_url_http = "http://sarwadnyaplay.com/";

// DATABASE CONNECTION
$conn = new mysqli("localhost","sarwadnya","-NuHZk{Ta_Zc","sarwadnya");

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// CREATE XML
$xml = new DOMDocument("1.0","UTF-8");
$xml->formatOutput = true;

$urlset = $xml->createElement("urlset");
$urlset->setAttribute("xmlns","http://www.sitemaps.org/schemas/sitemap/0.9");

// HTTPS
addURL($xml,$urlset,$base_url_https,"1.0",date("Y-m-d"));
addURL($xml,$urlset,$base_url_https."about-us","0.9",date("Y-m-d"));
addURL($xml,$urlset,$base_url_https."blog","0.9",date("Y-m-d"));
addURL($xml,$urlset,$base_url_https."career","0.9",date("Y-m-d"));
addURL($xml,$urlset,$base_url_https."contact-us","0.9",date("Y-m-d"));

// HTTP
addURL($xml,$urlset,$base_url_http,"1.0",date("Y-m-d"));
addURL($xml,$urlset,$base_url_http."about-us","0.9",date("Y-m-d"));
addURL($xml,$urlset,$base_url_http."blog","0.9",date("Y-m-d"));
addURL($xml,$urlset,$base_url_http."career","0.9",date("Y-m-d"));
addURL($xml,$urlset,$base_url_http."contact-us","0.9",date("Y-m-d"));

// FUNCTION TO ADD URL
function addURL($xml,$urlset,$loc,$priority="0.8",$lastmod=null){

    $url = $xml->createElement("url");

    $loc_tag = $xml->createElement("loc",$loc);
    $url->appendChild($loc_tag);

    if($lastmod){
        $lastmod_tag = $xml->createElement("lastmod",$lastmod);
        $url->appendChild($lastmod_tag);
    }

    $priority_tag = $xml->createElement("priority",$priority);
    $url->appendChild($priority_tag);

    $urlset->appendChild($url);
}

// HOMEPAGE
// addURL($xml,$urlset,$base_url,"1.0",date("Y-m-d"));


// ------------------------------------
// BLOG URLS
// ------------------------------------

$blog_query = "SELECT slug,b_date FROM pf_blog WHERE b_status='active'";
$blogs = $conn->query($blog_query);

while($row = $blogs->fetch_assoc()){

    $url_https = $base_url_https."blog/detail/".$row['slug'];
    $url_http = $base_url_http."blog/detail/".$row['slug'];

    $lastmod = date("Y-m-d",strtotime($row['b_date']));

    addURL($xml,$urlset,$url_https,"0.7",$lastmod);
    // addURL($xml,$urlset,$url_http,"0.7",$lastmod);
}


// ------------------------------------
// CITY BASED Category URLS
// ------------------------------------
$city_query = "SELECT id,name FROM pf_city";
$cities = $conn->query($city_query);

while($city = $cities->fetch_assoc()) {

    $city_slug = strtolower(str_replace(" ","-",$city['name']));

    // Get categories for this city
    $cat_query = "SELECT slug FROM pf_category WHERE city_id=".$city['id']." AND cat_status='active'";
    $categories = $conn->query($cat_query);

    while($cat = $categories->fetch_assoc()){

        $url_https = $base_url_https.$city_slug."/".$cat['slug'];
        $url_http = $base_url_http.$city_slug."/".$cat['slug'];

        addURL($xml,$urlset,$url_https,"0.8",date("Y-m-d"));
        // addURL($xml,$urlset,$url_http,"0.8",date("Y-m-d"));
    }
}

// ------------------------------------
// CITY BASED PRODUCT URLS
// ------------------------------------
$city_query = "SELECT id,name FROM pf_city";
$cities = $conn->query($city_query);

while($city = $cities->fetch_assoc()){

    $city_slug = strtolower(str_replace(" ","-",$city['name']));

    // Get products for this city
    $product_query = "SELECT prod_url FROM pf_product WHERE prod_city_id=".$city['id'];
    $products = $conn->query($product_query);

    while($p = $products->fetch_assoc()){

        $url_https = $base_url_https.$city_slug."/".$p['prod_url'];
        $url_http = $base_url_http.$city_slug."/".$p['prod_url'];

        addURL($xml,$urlset,$url_https,"0.8",date("Y-m-d"));
        // addURL($xml,$urlset,$url_http,"0.8",date("Y-m-d"));
    }
}

// ADD TO XML
$xml->appendChild($urlset);


// SAVE (OVERWRITE EXISTING FILE)
$file = "sitemap.xml";

if(file_exists($file)){
    unlink($file);
}

$xml->save($file);


echo "Sitemap generated successfully!";

$conn->close();

?>