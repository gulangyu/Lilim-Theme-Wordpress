<?php /* 
	  	Template Name: Pixiv (P站排名) 
	  */ ?>
<?php get_header(); ?>
<div id="page-wrap">
	<div class="right-toolbar">
		<span class="tooltip-left" data-tooltip="分享"><i class="tool-icon icon-share"></i></span>
		<span class="tooltip-left" data-tooltip="滚动"><i
				class="tool-icon tool-goto tool-down icon-angle-down"></i></span>
	</div>
	<section id="single" class="pixiv-wrapper page">
		<div id="pixiv">
			<?php
			$rss = simplexml_load_file( 'http://paid.feed43.com/pixiv_daily.xml' );
			?>
			<h1 class="ribbon">
				<strong class="ribbon-content"><?php echo $rss->channel->title; ?></strong>
			</h1>
			<time class="post-time">
				<?php echo $rss->channel->lastBuildDate; ?>
			</time>
			<?php
			$i = 0;
			foreach ( $rss->channel->item as $chan ) {
				if ( $i == 50 ) {
					break;
				}
				else {
					$i ++;
					echo "<section id=\"rank-" . $i . "\" class=\"rank-item\" >";
					echo $chan->description;
					echo "</section>";
				}
			}
			?>
			<?php echo wp_sns_share(); ?>
		</div>
	</section>
</div>

<?php get_footer(); ?>		
