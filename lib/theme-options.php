<?php
/**
 * Set up the default theme options
 *
 * @since 0.0.1
 */
function perlovs_theme_options() {
	$default_theme_options = array(
		'front_cat_col1' => '#ff0000',
	
	);

	return get_option( 'perlovs_theme_options', $default_theme_options );
}

class Perlovs_Customizer {
	public function __construct() {
		// add_action( 'admin_bar_menu', array( $this, 'admin_bar_menu' ), 1000 );
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	/**
	 * Add a 'customize' menu item to the admin bar
	 *
	 * This function is attached to the 'admin_bar_menu' action hook.
	 *
	 * @since 1.0.0
	 */
	// public function admin_bar_menu( $wp_admin_bar ) {
	//     if ( current_user_can( 'edit_theme_options' ) && is_admin_bar_showing() ) {
	//     	$wp_admin_bar->add_node( array( 'parent' => 'perlovs_toolbar', 'id' => 'customize_theme', 'title' => __( 'Theme Options', 'ward' ), 'href' => admin_url( 'customize.php' ) ) );
 //   			$wp_admin_bar->add_node( array( 'parent' => 'perlovs_toolbar', 'id' => 'documentation_faqs', 'title' => __( 'Documentation & FAQs', 'ward' ), 'href' => 'https://themes.perlovs.com/documentation', 'meta' => array( 'target' => '_blank' ) ) );
 //   		}
	// }

	/**
	 * Adds theme options to the Customizer screen
	 *
	 * This function is attached to the 'customize_register' action hook.
	 *
	 * @param	class $wp_customize
	 *
	 * @since 1.0.0
	 */
	public function customize_register( $wp_customize ) {
		$perlovs_theme_options = perlovs_theme_options();

		// Layout section panel
		$wp_customize->add_section( 'perlovs_adds', array(
			'title' => __( 'Perlovs', 'perlovs' ),
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'perlovs_theme_options[front_cat_col1]', array(
			'default' => $perlovs_theme_options['front_cat_col1'],
			'type' => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize
			, 'perlovs_at_col1', array(
				'label'      => __( 'Front page first category color', 'perlovs' ),
				'section' => 'perlovs_adds',
				'settings' => 'perlovs_theme_options[front_cat_col1]',
        		'priority'   => 1
			)
		) );
	}
}
$perlovs_customizer = new Perlovs_Customizer;