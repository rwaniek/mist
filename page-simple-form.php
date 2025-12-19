<?php
/**
 * Template Name: Simple Contact Form
 * Description: A minimal page template with a basic HTML form.
 */
get_header();
?>

<main id="primary" class="container-fluid">
  <div class="mx-auto" style="max-width:800px">
  <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <h1 class="pt-3"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <ajax-form>
          <form class="mb-5" action="" method="post">
            <?php wp_nonce_field('bf_form_contact'); ?>
            <input type="hidden" name="bf_action" value="contact">
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input class="form-control" type="text" id="senderName" name="senderName" value="" placeholder="Name" required>
                  <label for="senderName" class="form-label"><?php esc_html_e('Name', 'basic-form');?>:</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input class="form-control" type="email" name="senderEmail" id="senderEmail" value="" placeholder="Email address" required>
                  <label for="senderEmail" class="form-label"><?php esc_html_e('Email address', 'basic-form');?>:</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating">
                  <textarea class="form-control" style="min-height:200px" name="senderMsg" id="senderMsg" placeholder="Your message" required minlength="20" maxlength="1000"></textarea>
                  <label for="senderMsg" class="form-label"><?php esc_html_e('Your message', 'basic-form');?>:</label>
                </div>
              </div>
            </div>
            <div class="mb-4 d-flex gap-2">
              <div class="container-checkbox">
                <input id="consent" type="checkbox" required="">
                <span class="checkmark"></span>
              </div>
              <div>
                <label for="consent"><?php _e('I understand that my personal data will be used to contact me regarding the company services. ', 'basic-form');?></label>
                <span><?php esc_html_e( 'Read how we handle the data in', 'basic-form' ); ?></span> <a href="/privacy-policy/"><?php esc_html_e( 'our privacy policy.', 'basic-form' ); ?>.</a>
              </div>
            </div>

            <button class="btn btn-primary" type="submit"><?php esc_html_e( 'Send', 'basic-form' ); ?></button>
          </form>
        </ajax-form>
  <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
