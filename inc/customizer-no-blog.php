<?

$wp_customize->add_section('no_blog_section' , array(
    'title'     => __('Disable Blog Features', 'dd_theme'),
    'priority'  => 1020
));

$wp_customize->add_setting('no_blog', array(
    'default'    => '1'
));

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'no_blog',
        array(
            'label'     => __('Disable displaying of comments, authors, post dates, etc.', 'dd_theme'),
            'section'   => 'no_blog_section',
            'settings'  => 'no_blog',
            'type'      => 'checkbox',
        )
    )
);
?>