<?php
$b_title = stripslashes($blog['b_title']);
$data['title'] = $b_title;
$data['contact_detail'] = $contact_detail;
$this->load->view('header_view', $data);



//$b_author = stripslashes($blog['b_author']);

$b_desc = html_entity_decode(stripslashes($blog['b_desc']));

$originalDate = $blog['b_date'];
$newDate = date("d-m-Y", strtotime($originalDate));

if ($blog['b_image'] != '') {
	$img = base_url() . '/upload/je/' . stripslashes($blog['b_image']);
} else {
	$img = base_url() . '/assets/site/img/gallery-big-03.jpg';
}


$content = trim($b_desc);
$limit = 600;

/**
 * Split HTML safely near character limit
 */
function splitHtmlSafe($html, $limit = 600)
{
	if (mb_strlen(strip_tags($html)) <= $limit) {
		return [$html, ''];
	}

	$textLen = 0;
	$pos = 0;
	$breakPos = 0;

	// Walk through HTML and count only text (ignore tags)
	while ($pos < strlen($html)) {
		if ($html[$pos] == '<') {
			// Skip tag
			$endTag = strpos($html, '>', $pos);
			if ($endTag === false)
				break;
			$pos = $endTag + 1;
			continue;
		} else {
			$textLen++;
			if ($textLen >= $limit) {
				$breakPos = $pos;
				break;
			}
			$pos++;
		}
	}

	// Move forward to nearest safe closing tag
	$safeTags = ['</p>', '</li>', '</ul>', '</ol>', '<br>', '<br/>', '<br />', '</strong>'];
	$nearestSafe = strlen($html);

	foreach ($safeTags as $tag) {
		$tagPos = stripos($html, $tag, $breakPos);
		if ($tagPos !== false && $tagPos < $nearestSafe) {
			$nearestSafe = $tagPos + strlen($tag);
		}
	}

	if ($nearestSafe == strlen($html)) {
		$nearestSafe = $breakPos; // fallback
	}

	$first = substr($html, 0, $nearestSafe);
	$remaining = substr($html, $nearestSafe);

	return [$first, $remaining];
}

list($firstPart, $remaining) = splitHtmlSafe($content, $limit);

?>

<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle text-center bg-pt"
		style="background-image:url(<?php echo base_url("assets/newsite/images/background/bg5.jpg"); ?>);">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">Blog Detail</h1>
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<!-- contact area -->
	<div class="content-block">
		<!-- About Services info -->
		<div class="section-full content-inner bg-white video-section"
			style="background-image:url('images/background/bg-video.png');">
			<div class="container">
				<h2 class="m-b15 title">
					<span class="text-primary"><?php echo $b_title; ?></span>
				</h2>
				<div class="section-content">
					<!-- <div class="row d-flex">
						<div class="col-lg-5 col-md-12 m-b30">
							<div class="video-bx">
								<img src="<?php echo $img; ?>" alt="">
							</div>
						</div>
						<div class="col-lg-7 col-md-12 m-b30 align-self-center video-infobx">
							<div class="content-bx1">
								<p class="m-b30"><?php echo $b_desc; ?></p>
							</div>
						</div>
					</div> -->


					<div class="row d-flex">

						<!-- Image -->
						<div class="col-lg-6 col-md-12 m-b30">
							<div class="video-bx">
								<img src="<?php echo $img; ?>" alt="" style="width:100%; height:auto;">
							</div>
						</div>

						<!-- Text beside image -->
						<div class="col-lg-6 col-md-12 m-b30 align-self-center video-infobx">
							<div class="content-bx1">
								<?php echo $firstPart; ?>
							</div>
						</div>

						<!-- Remaining text full width -->
						<?php if (!empty(trim(strip_tags($remaining)))) { ?>
							<div class="col-lg-12 col-md-12 m-b30 video-infobx">
								<div class="content-bx1">
									<?php echo $remaining; ?>
								</div>
							</div>
						<?php } ?>

					</div>


				</div>
			</div>
		</div>
		<!-- About Services info END -->
	</div>
	<!-- contact area END -->
</div>
<!-- Content END -->


<?php
$data['page'] = 'about';
$data['contact_detail'] = $contact_detail;
$this->load->view('footer_view');
