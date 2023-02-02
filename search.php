<style>
	.herotext {
  background-image: url('https://thebigstock.com/bigstock/images/website-banner/WEB%20BANNER2.jpg');
  background-position: center;
  background-size: cover;
  margin-top: 57px!important;
  object-fit: cover;
    height: 400px;
   
}
.searchbarar {
    /* background-color: blueviolet; */
    width: 63%;
    display: flex;
    margin: 0px auto;
    position: absolute;
    top: 33%!important;
    left: 16%;
}
.twoportfolio .card img {
    height: 100%;
    width: 100%;
    transition: all 0.5s ease;
    transform: scale(1.2);
    object-fit: contain;
}
.twoportfolio .card {
    width: 23%;
    margin: 20px 10px;
    overflow: hidden;
    position: relative;
    height: 300px;
}
</style>
<?php include("include/header.php") ?>
<?php
// include('function.php');
// $obj = new Operations;
$query = Utils::cleaner($_GET['q'] ?? "");
$currentPageNumber = Utils::cleaner($_GET['page'] ?? 1);

$where = "WHERE `hash_id` = '$query'";
// image_tbl` ORDER BY `image_tbl`.`hash_id`
$imagesList = $obj->getList('image_tbl', $where);

if (!$imagesList) {
	// search category
	// $where = "WHERE category_name like  '" . $query . "%'";
	$where = "WHERE `category_name` REGEXP '(^[:blank:][$query]|^[$query])'";
	if ($query == "")
		$where = "";
	$categoryList = $obj->getList('category_tbl', $where);
	// print_r($categoryList['category_name']);

	$categoryIDs = "";
	foreach ($categoryList as $index => $val) {

		if ($index != 0)
			$categoryIDs .= "," . $val['id'];
		else
			$categoryIDs .= $val['id'];
	}
	// var_dump($categoryIDs);

	// search tags
	$where = "WHERE tags like  '" . $query . "%'";
	$tagsList = $obj->getList('tags_tbl', $where);
	// var_dump($tagsList);

	$tagIDs = "";
	foreach ($tagsList as $index => $val) {

		if ($index != 0)
			$tagIDs .= "," . $val['id'];
		else
			$tagIDs .= $val['id'];
	}
	// var_dump($tagIDs);


	// add where category
	$where = "WHERE `image_name` LIKE '" . $query . "%'";
	if ($categoryIDs != "") {
		$where .= "OR category_id IN ($categoryIDs)";
		// $where .= "WHERE category_id IN ($categoryIDs)";
	}

	// add where tags
	// if ($categoryIDs != "" && $tagIDs != "") {
	// 	$where .= " OR tag_id IN ($tagIDs)";
	// } else if ($tagIDs != "") {
	// 	$where .= "WHERE tag_id IN ($tagIDs)";
	// }
	if ($tagIDs != "") {
		$where .= "OR tag_id IN ($tagIDs)";
	}

	// page count
	$totalImages = $obj->getCounts('image_tbl', $where);

	// if current page samaller then 1
	if ($currentPageNumber < 1)
		$currentPageNumber = 1;

	// default image limit
	$limitLength = 4;
	// new offset
	$fromOffset = $limitLength * ($currentPageNumber - 1);

	// add limit and offset
	$where .= " limit " . $limitLength . " offset " . $fromOffset;
	$imagesList = [];
	if ($where != "")
		$imagesList = $obj->getList('image_tbl', $where);
}
// var_dump($imagesList);
// exit();
?>

<main>
	<!-- Search Bar -->
	<section class="container-fluid herosection">
		<form action="search.php">
			<div class="herotext">
				<h1></h1>
				<div class="container-xl searchbararae">
					<div class="searchbarar">
						<input class="searchinput" type="text" class="form-control" id="category_name" name="q" aria-describedby="text" placeholder="Search" value="<?= $query ?>">
						<button class="btnsearch">Search</button>
					</div>
				</div>
			</div>
		</form>
	</section>

	<!-- Image Section -->
	<section class="imggllerybox">
		<div class="twoportfolio" id="image_section">
			<!-- <h2 class="title">Latest Projects</h2> -->
			<?php foreach ($imagesList as $image) {	?>
				<a href="download.php?id=<?= $image['hash_id'] ?>" class="card">
					<div class="content">
						<span class="title"><?= $image['image_name'] ?></span>
						<span class="category"><?= $category['category_name'] ?></span>
					</div>
					<div class="image">
						<img src="admin/upload/<?= $image['image'] ?>" alt="<?= $image['image_name'] ?>" />
					</div>
				</a>
			<?php }	?>
			<!-- Image Not Found -->
			<?= (count($imagesList) < 1) ? "<h2>nothing to show<h2>" : "" ?>
		</div>
		</div>
	</section>

	<?php
	if ($totalImages > 1) {
		// get page count by per page image limit
		$pageCount = 0;

		if (($totalImages % $limitLength) == 0) {
			$pageCount = $totalImages / $limitLength;
		} else {
			// round off max
			$pageCount = ceil(($totalImages / $limitLength));
		}

		$previous = $currentPageNumber - 1;
		$next = ($currentPageNumber * $limitLength) > $totalImages ? 1 : $currentPageNumber + 1;

		// $page2 = count($images) / 1;
		// $previous = $currentPageNumber - 1;
		// $next = $currentPageNumber + 1;
	?>
		<div class="container paginationarea">
			<nav aria-label="...">
				<ul class="pagination">
					<?php
					// hide for page 1
					if ($currentPageNumber != 1) {
					?>
						<li class="page-item ">
							<a class="page-link" href="search.php?q=<?= $query ?>&page=<?= $previous ?>">
								Previous
							</a>
						</li>
					<?php } ?>
					<?php
					// for ($i = 1; $i <= $page2; $i++) {
					for ($i = 1; $i <= $pageCount; $i++) {
					?>
						<li class="page-item ">
							<a class="page-link" <?= ($currentPageNumber == $i) ? 'style="color: white;background-color: #18cfab!important;"' : '' ?> href="search.php?q=<?= $query ?>&page=<?= $i ?>">
								<?php echo $i ?>
							</a>
						</li>
					<?php } ?>
					<?php
					// hide for last page
					if ($currentPageNumber != $pageCount) {
					?>
						<li class="page-item">
							<a class="page-link" href="search.php?q=<?= $query ?>&page=<?= $next ?>">
								Next
							</a>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	<?php
	}
	?>
</main>
<?php include("include/footer.php") ?>