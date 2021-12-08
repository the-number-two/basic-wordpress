<?php

get_header();

$theId = get_the_ID();

//Getting Settings
$mainGroupOptionHome = rwmb_meta( 'main_section_home_page_option', ['object_type' => 'setting'], 'main menu option' );
?>
<? 

  foreach( $mainGroupOptionHome as $mainHomeOption){ 
  $layoutChoose = $mainHomeOption['select_home_section_layout'];  
  
?>
<div class="container">
  <div class="row row-flex-right-container <?echo $layoutChoose;?>">
    <div class="left-col-right-content-wrapper">
      <div class="heading-section-container">
        <h2><? echo $mainHomeOption['home_section_title']  ; ?></h2>
        <h3><? echo $mainHomeOption['main-sub-title-section-option'] ; ?></h3>
      </div>
      <div class="text-content">
      <p class="inner-text">  <? echo $mainHomeOption['main_content_option_home'] ;  ?></p>
      </div>  
    </div>
    <div class="right-col-right-content-wrapper">
      <? $featOptionSectionHomeImg = $mainHomeOption['main_section_featured_image']; ?>
      <img src="<? echo  wp_get_attachment_url($featOptionSectionHomeImg[0]) ;?>" alt="">
    </div>
  </div>
</div>
<? } ?>
<div class="container">
    <h3 class="portfolio-front-page-latest">Latest Posts</h3>
    <div class="row row-flex-front-page-blog">
      <?php 
        $argsPosts = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => -1,
      );
      $getAllPosts = get_posts( $argsPosts );
      ?>

      <?php foreach( $getAllPosts as $post ){ 
        $postFeatImage = get_the_post_thumbnail_url( $post->ID , 'post-thumbnail' );  
        
      ?>

      <div class="card-blog-front-page">
        <div class="card__header-blog-front-page">
          <img src="<? echo $postFeatImage; ?>" alt="card__image" class="card__image-blog-front-page">
        </div>
        <div class="card__body-blog-front-page">
          <span class="tag tag-blue"><?php echo $post->ID; ?></span>
          <h4><? echo $post->post_title; ?></h4>
          <p class="main-card-paragraph"><? echo $post->post_excerpt; ?></p>
        </div>
      </div>

      <?php } ?>

    </div>
</div>
<div class="container">
    <h3 class="portfolio-front-page-latest">Latest Portfolios</h3>
    <div class="row flex-box-card">
        <?
            $argsPortfolioPosts = array(
                'post_type' => 'portfolio',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $getAllPortfolioPosts = get_posts( $argsPortfolioPosts );          
        ?>
        <? foreach($getAllPortfolioPosts as $portfolioPost ){ 
                    $portfolioPostId = $portfolioPost->ID ;
                    $porfolioFeaturedImg = get_the_post_thumbnail_url($portfolioPostId, 'full');
                    $porfolioMainMetas = rwmb_meta( 'main_portfolio_fields', ['object_type' => 'portfolio'], $portfolioPostId );
                    $portfolioMainAttributes = $porfolioMainMetas['portfolio_attribute'];
                    $portfolioGalleryArray = $porfolioMainMetas['portfolio_main_gallery'];
                    
            ?>
             <a class="flex-box-card-item" href="<? echo $portfolioPost->guid ; ?>" class="card" style="background-image: url(<? echo $porfolioFeaturedImg;?>);">
                <div class="inner">
                  <h2 class="title"><? echo $portfolioPost->post_title ; ?></h2>
                  <p class="subtitle"><? echo $portfolioPost->post_excerpt ; ?></p>
                  <div class="main-attribute-portfolio">
             <? foreach($portfolioMainAttributes as $portfolioAttribute ){ ?>
                <?echo '<p>' . $portfolioAttribute['portfolio_main_attribute_label'] . ' : ' . $portfolioAttribute['portfolio_main_attribute_value'] . '</p>' ;?>
                <? 
                }
             ?>
                </div>
            </div>
        </a>
                <? } ?>
    </div>
</div>


<?php

get_footer();

?>