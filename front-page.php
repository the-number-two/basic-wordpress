<?php

get_header();

$theId = get_the_ID();


?>
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
