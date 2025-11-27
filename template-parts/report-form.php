<form action="" method="post">
  <?php wp_nonce_field('bf_form_report_content'); ?>
  <input type="hidden" name="bf_action" value="report_content">
  <input type="hidden" name="postId"  value="<?php echo esc_attr( get_the_ID() ); ?>">
  <input type="hidden" name="postUrl" value="<?php echo esc_url( get_permalink() ); ?>">

  <p>
    <label for="reporterEmail">Your email:</label><br>
    <input type="email" id="reporterEmail" name="reporterEmail" required>
  </p>

  <fieldset>
    <legend>Reason</legend>
    <label><input type="radio" name="reason" value="spam" required> Spam</label><br>
    <label><input type="radio" name="reason" value="offensive"> Offensive</label><br>
    <label><input type="radio" name="reason" value="stolen">    Stolen content</label><br>
    <label><input type="radio" name="reason" value="other">     Other</label>
  </fieldset>

  <p>
    <label for="message">Additional info (optional):</label><br>
    <textarea id="message" name="message"></textarea>
  </p>

  <p><button type="submit">Report</button></p>
</form>
