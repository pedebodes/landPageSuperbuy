<div class="wrap about-wrap">
    <h1><?php esc_html_e( 'Redux Framework - A Community Effort', 'apparatus' ); ?></h1>

    <div class="about-text">
        <?php esc_html_e( 'We recognize we are nothing without our community. We would like to thank all of those who help Redux to be what it is. Thank you for your involvement.', 'apparatus' ); ?>
    </div>
    <div class="redux-badge">
        <i class="el el-redux"></i>
        <span>
            <?php printf( esc_attr__( 'Version %s', 'apparatus' ), esc_html(ReduxFramework::$_version )); ?>
        </span>
    </div>

    <?php $this->actions(); ?>
    <?php $this->tabs(); ?>

    <p class="about-description">
        <?php echo sprintf( esc_attr__( 'Redux is created by a community of developers world wide. Want to have your name listed too? <a href="%d" target="_blank">Contribute to Redux</a>.', 'apparatus' ), '' );?>
    </p>

    <?php echo wp_kses_post($this->contributors()); ?>
</div>