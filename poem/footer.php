<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package poem
 * @since poem 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer menu-expanded" role="contentinfo">
    <div class="post-navigation-menu">
        <?php
        $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
        $pages = array();
        foreach ($pagelist as $page) {
           $pages[] += $page->ID;
        }

        $current = array_search(get_the_ID(), $pages);
        $prevID = $pages[$current-1];
        $nextID = $pages[$current+1];
        ?>

        <span class="menu-left">
          <a href="#" class="index-button">
            <div class="static-menu">
              <div class="button-line"></div>
              <div class="button-line"></div>
              <div class="button-line"></div>
            </div>
          </a>
        </span>
        <?php if (!empty($nextID)) { ?>
        <a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">
          <span class="next-post"><?php echo get_the_title($nextID); ?>
            <span class="arrow right"></span>
          </span>
        </a>
        
        <?php } ?>
    </div>
    <div class="table-of-contents">
      <a href="#" class="index-close"><div class="close"></div></a>
        <h2>Table of Contents</h2>
        <?php wp_nav_menu(); ?>
    </div>
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

<script>
    $(function() {
      $('.index-button').click(function() {
        event.preventDefault();
        $('.site-footer').css('height', '100%');
        $('.site-footer').css('overflow', 'scroll');
        $('#main').css('display', 'none');
        $( ".post-navigation-menu" ).css('display', 'none');
        $( ".table-of-contents" ).show();
      });
    })
    $(function() {
      $('.index-close').click(function() {
        event.preventDefault();
        $('.site-footer').css('height', '49px');
        $('.site-footer').css('overflow', 'none');
        $('#main').css('display', 'block');
        $( ".post-navigation-menu" ).css('display', 'block');
        $( ".table-of-contents" ).hide();
      });
    })
    $(document).keydown(function(e) {
      switch(e.which) {
        <?php if (!empty($prevID)) { ?>
        case 37: // left
          window.location.href = "<?php echo get_permalink($prevID); ?>";
        break;
        <?php } ?>
        <?php if (!empty($nextID)) { ?>
        case 39: // right
          window.location.href = "<?php echo get_permalink($nextID); ?>";
        break;
        <?php } ?>
        case 77: // m
          $('.site-footer').css('height', '100%');
          $('.site-footer').css('overflow', 'scroll');
          $('#main').css('display', 'none');
          $( ".post-navigation-menu" ).css('display', 'none');
          $( ".table-of-contents" ).show();
        break;
        default: return;
      }
      e.preventDefault();
    });
</script>

</body>
</html>