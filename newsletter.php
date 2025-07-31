<!DOCTYPE html>
<?php 
	$page = "newsletter";
?>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:title" content="">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="">
	<meta property="og:url" content="https://www.">
	<meta property="og:image" content="https://www./images/android-icon-192x192.png">
	<meta name="keywords" content="">
	<meta property="og:description" name="description" content="">
	<meta name="robots" content="all">
	<meta name="revisit-after" content="10 Days">
	<meta name="copyright" content="">
	<meta name="language" content="English">
	<meta name="distribution" content="Global">
	<meta name="web_author" content="srisoftwarez.com">
	<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
	<link rel="icon" sizes="192x192"  href="images/android-icon-192x192.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.js"></script>
	<style>
		canvas {
			width: 250px;
			height: 320px;
		}
	</style>
</head>
<body itemscope itemtype="http://schema.org/WebPage">

<?php include('header.php') ?>

<?php 
	$target_dir_front = "admin_rax_uni_lab_30072025/include/images/upload/";
	$newsletter_record = array(); $newsletter_record_count = 0; $newsletter_pdfs = array(); $pdf_names = array();
    $newsletter_record = $obj->getTableRecords($GLOBALS['newsletter_table'],'','','');
    if(!empty($newsletter_record)){
        $newsletter_record_count = count($newsletter_record);
        foreach($newsletter_record as $data){
            if(!empty($data['newsletter_pdfs']) && $data['newsletter_pdfs'] != $GLOBALS['null_value']){
                $newsletter_pdfs = explode("$$$", $data['newsletter_pdfs']);
            }
			if(!empty($data['pdf_name']) && $data['pdf_name'] != $GLOBALS['null_value']){
                $pdf_names = explode(",", $data['pdf_name']);
            }
        }
    } ?>

<div class="breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-white text-center">
				<div class="breadcumb-content">
					<div class="breadcumb-title">Newsletter</div>
					<ul class="breadcumb-menu">
						<li>
							<a href="index.php" class="text-white">Home</a>
						</li>
						<li>Newsletter</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container pad">
	<div class="row">
		<div class="col-lg-12 text-center mb-lg-4 mb-3">
			<div class="heading1 font1 clr2">Newsletter</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-7 col-12 order-lg-1 order-md-1 order-2">
			<div class="row justify-content-center mx-0">
				<?php
					if(!empty($newsletter_pdfs)) {
						for($i=0; $i < count($newsletter_pdfs); $i++) {
							if(!empty($newsletter_pdfs[$i]) && !empty($pdf_names[$i])) {
								?>
								<div class="col-lg-6 col-md-12 col-12 py-2">
									<div class="sticky-top1">
										<div id="pdf-preview-container-<?php echo $i; ?>" style="border:1px solid black; width:252px; height:322px; margin:auto; cursor:pointer;" onclick="Javascript:downloadPDF('<?php echo $target_dir_front.$newsletter_pdfs[$i]; ?>', '<?php echo $pdf_names[$i]; ?>');">
											<script>
												jQuery(document).ready(function(){
													renderFirstPage('<?php echo $target_dir_front.$newsletter_pdfs[$i]; ?>', '<?php echo $i; ?>');
												});
											</script>
										</div>
										<div class="heading5 font1 clr1 text-center"><?php echo $pdf_names[$i]; ?></div>
									</div>
								</div>
								<?php
							}
						}
					}
				?>	
			</div>
		</div>
		<div class="col-lg-4 col-md-5 col-12 order-lg-2 order-md-2 order-1">
			<div class="sticky-top1">
				<div class="service-head">
					<div class="heading4 service-title1 bottom-line font1 clr1 mb-2">
						Newsletter
					</div>
					<ul class="fullpad mainmenu pb-2 pt-2">
						<?php
							if(!empty($newsletter_pdfs)) {
								for($i=0; $i < count($newsletter_pdfs); $i++) {
									if(!empty($newsletter_pdfs[$i]) && !empty($pdf_names[$i])) {
										?>
										<div class="heading5 font1 clr2 py-2">
											<?php echo $pdf_names[$i]; ?>
										</div>
										<?php
									}
								}
							}
						?>	
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('footer.php') ?>
<script src="js/pdfjs/pdf.js"></script>
<script>
    new WOW().init();
</script>
<script>
  // Configure PDF.js worker
  pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/pdfjs/pdf.worker.js';

  function renderFirstPage(pdfUrl, index) {
    const container = document.getElementById('pdf-preview-container-'+index);
    container.innerHTML = ''; // Clear previous preview

    const loadingTask = pdfjsLib.getDocument(pdfUrl);
    loadingTask.promise.then(function(pdf) {
      // Fetch the first page
      pdf.getPage(1).then(function(page) {
        const scale = 1.0;
        const viewport = page.getViewport({ scale: scale });

        // Prepare canvas using PDF page dimensions
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        container.appendChild(canvas);

        // Render PDF page into canvas context
        const renderContext = {
          canvasContext: context,
          viewport: viewport
        };
        page.render(renderContext);
      });
    }, function(reason) {
      console.error('Error loading PDF:', reason);
    });
  }
  function downloadPDF(currentPDFUrl, pdf_name) {
    const link = document.createElement('a');
    link.href = currentPDFUrl;
    link.download = pdf_name+'.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }
</script>

</body>
</html>