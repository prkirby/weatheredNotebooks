<?php get_header(); ?>


<div class="page-wrap container">

	<?php

	$featured_image = false;



	if ( '' != get_the_post_thumbnail() ) :

		$featured_image = true;

	?>

		<div class="post-thumbnail">

			<div class="container">

				<h1 class="post-heading"><?php the_title(); ?></h1>

			</div> <!-- .container -->

		</div> <!-- .post-thumbnail -->

	<?php endif; ?>

	<div id="main-content">

		<div class="main-content-wrap clearfix">

			<div id="content">

				<?php get_template_part( 'includes/breadcrumbs', 'index' ); ?>

				<div id="left-area">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if (et_get_option('nexus_integration_single_top') <> '' && et_get_option('nexus_integrate_singletop_enable') == 'on') echo(et_get_option('nexus_integration_single_top')); ?>



					<article class="entry-content clearfix">

					<?php if ( ! $featured_image ) : ?>

						<h1 class="main-title"><?php the_title(); ?></h1>

					<?php endif; ?>



						<?php //et_nexus_post_meta(); ?>



      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

                                                    <ins class="adsbygoogle" contenteditable="" cite="" accesskey="" style="display:block; margin-bottom:10px; float: right;" data-ad-client="ca-pub-3175234731446667"  data-ad-slot="5944253035"  data-ad-format="auto"></ins>
                                                <script>
                                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                                </script>
						<?php if ( ( $review_rating = get_post_meta( get_the_ID(), '_et_author_rating', true ) ) && '' !== $review_rating ) : ?>

							<span class="review-rating"><span style="width: <?php echo $review_rating * 33.5; ?>px;"></span></span>

						<?php endif; ?>

				<?php

					if ( has_post_format( 'video' ) ) {

						global $wp_embed;



						$video_width = (int) apply_filters( 'nexus_video_width', 838 );



						$et_video_url = get_post_meta( get_the_ID(), '_format_video_embed', true );

						$video = apply_filters( 'the_content', $wp_embed->shortcode( '', esc_url( $et_video_url ) ) );



						$video = preg_replace('/<embed /','<embed wmode="transparent" ',$video);

						$video = preg_replace('/<\/object>/','<param name="wmode" value="transparent" /></object>',$video);



						$video = preg_replace("/width=\"[0-9]*\"/", "width={$video_width}", $video);



						echo '<div class="et-single-video">' . $video . '</div>';

					}

				?>

<?php


						the_content();


?>


<?php
						wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Nexus' ), 'after' => '</div>' ) );

					?>


					</article> <!-- .entry -->


					<?php if (et_get_option('nexus_integration_single_bottom') <> '' && et_get_option('nexus_integrate_singlebottom_enable') == 'on') echo(et_get_option('nexus_integration_single_bottom')); ?>


					<div id="et-box-author">

						<div id="et-bio-author">

							<div class="author-avatar">

								<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>

							</div> <!-- end #author-avatar -->



							<p id="author-info">

								<strong><?php esc_html_e( 'Author', 'Nexus' ); ?>:</strong> <?php the_author_link(); ?>

							</p> <!-- end #author-info -->



							<p><?php the_author_meta( 'description' ); ?></p>

						</div>

						<div id="et-post-share" class="clearfix">

							<span><?php esc_html_e( 'Share This Post On', 'Nexus' ); ?></span>

							<ul id="et-share-icons">

							<?php

								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );

								$title_attribute = the_title_attribute( 'echo=0' );

								$post_permalink  = get_permalink();



								printf( '<li class="google-share"><a href="https://plus.google.com/share?url=%s" target="_blank" class="et-share-button et-share-google">%s</a></li>',

									esc_url( $post_permalink ),

									esc_html__( 'Google', 'Nexus' )

								);



								printf( '<li class="facebook-share"><a href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=%1$s&amp;p[images][0]=%2$s&amp;p[title]=%3$s" target="_blank" class="et-share-button et-share-facebook">%4$s</a></li>',

									esc_url( $post_permalink ),

									esc_attr( $thumbnail[0] ),

									$title_attribute,

									esc_html__( 'Facebook', 'Nexus' )

								);



								printf( '<li class="twitter-share"><a href="https://twitter.com/intent/tweet?url=%1$s&amp;text=%2$s" target="_blank" class="et-share-button et-share-twitter">%3$s</a></li>',

									esc_url( $post_permalink ),

									$title_attribute,

									esc_html__( 'Twitter', 'Nexus' )

								);

							?>

							</ul>

						</div>
					</div>

				<?php

					if ( et_get_option('nexus_468_enable') == 'on' ){

						echo '<div class="et-single-post-ad">';

						//if ( et_get_option('nexus_468_adsense') <> '' ) echo( et_get_option('nexus_468_adsense') );

						//else { ?>

						<!--	<a href="<?php //echo esc_url(et_get_option('nexus_468_url')); ?>"><img src="<?php //echo esc_attr(et_get_option('nexus_468_image')); ?>" alt="468 ad" class="foursixeight" /></a> -->

				<?php //	}

						echo '</div>
  <!-- .et-single-post-ad -->';

					}

				?>
					<?php

						if ( comments_open() && 'on' == et_get_option( 'nexus_show_postcomments', 'on' ) )

							comments_template( '', true );

					?>

				<?php endwhile; ?>
                                            <div id="contentad23079"></div>

<script type="text/javascript">
    (function() {
        var params =
        {
            id: "4fc367d6-daea-48d2-9c18-b4177d01865a",
            d:  "dGhlYW50aW1lZGlhLm9yZw==",
            wid: "23079",
            cb: (new Date()).getTime()
        };

        var qs="";
        for(var key in params){qs+=key+"="+params[key]+"&"}
        qs=qs.substring(0,qs.length-1);
        var s = document.createElement("script");
        s.type= 'text/javascript';
        s.src = "http://api.content.ad/Scripts/widget.aspx?" + qs;
        s.async = true;
        document.getElementById("contentad23079").appendChild(s);
    })();
</script>


				</div>
	<!-- end #left-area -->

			</div>
			<!-- #content -->

			<!-- Sidebar -->
			<?php
				get_sidebar();
			 	get_template_part( 'includes/footer-banner', 'single' );
			?>

		</div>
 <!-- .main-content-wrap -->

	</div>
<!-- #main-content -->

</div>
<!-- .page-wrap .container -->


	<?php get_footer(); ?>
