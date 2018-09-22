<?php

class Sb_Social_links_widget extends WP_Widget {
	public function __construct() {
		parent::__construct( 'sb_social_links_widget', __( 'SB Social Links', 'sbsl' ), array(
			'description' => __( 'Add your all social links', 'sbsl' ),
		) );
	}

	public function widget( $args, $instance ) {
		$links      = array(
			'facebook'  => esc_attr( $instance['facebook_link'] ),
			'twitter'   => esc_attr( $instance['twitter_link'] ),
			'instagram' => esc_attr( $instance['instagram_link'] ),
			'linkedin'  => esc_attr( $instance['linkedin_link'] ),
		);
		$icons      = array(
			'facebook'  => esc_attr( $instance['facebook_icon'] ),
			'twitter'   => esc_attr( $instance['twitter_icon'] ),
			'instagram' => esc_attr( $instance['instagram_icon'] ),
			'linkedin'  => esc_attr( $instance['linkedin_icon'] ),
		);
		$icon_width = $instance['icon_width'];
		$sbsl_title = $instance['sbsl_title'];

		echo $args['before_widget'];

		echo $args['before_title'];
		echo $sbsl_title;
		echo $args['after_title'];
		// Call Frontend Function
		$this->getSocialLinks( $links, $icons, $icon_width );

		echo $args['after_widget'];
	}

	// Output the option form on Admin
	public function form( $instance ) {
		// Call Form function
		$this->getForm( $instance );
	}

	// Processing widget options on save
	public function update( $new_instance, $old_instance ) {
		// Processes widget option to be saved
		$instance = array(
			'sbsl_title'     => ( ! empty( $new_instance['sbsl_title'] ) ) ?  $new_instance['sbsl_title'] : '',
			'facebook_link'  => ( ! empty( $new_instance['facebook_link'] ) ) ? strip_tags( $new_instance['facebook_link'] ) : '',
			'facebook_icon'  => ( ! empty( $new_instance['facebook_icon'] ) ) ? strip_tags( $new_instance['facebook_icon'] ) : '',
			'twitter_link'   => ( ! empty( $new_instance['twitter_link'] ) ) ? strip_tags( $new_instance['twitter_link'] ) : '',
			'twitter_icon'   => ( ! empty( $new_instance['twitter_icon'] ) ) ? strip_tags( $new_instance['twitter_icon'] ) : '',
			'instagram_link' => ( ! empty( $new_instance['instagram_link'] ) ) ? strip_tags( $new_instance['instagram_link'] ) : '',
			'instagram_icon' => ( ! empty( $new_instance['instagram_icon'] ) ) ? strip_tags( $new_instance['instagram_icon'] ) : '',
			'linkedin_link'  => ( ! empty( $new_instance['linkedin_link'] ) ) ? strip_tags( $new_instance['linkedin_link'] ) : '',
			'linkedin_icon'  => ( ! empty( $new_instance['linkedin_icon'] ) ) ? strip_tags( $new_instance['linkedin_icon'] ) : '',
			'icon_width'     => ( ! empty( $new_instance['icon_width'] ) ) ? strip_tags( $new_instance['icon_width'] ) : '',
		);

		return $instance;
	}

	// Gets and Displays form
	public function getForm( $instance ) {

	    // Get Title
		if ( isset( $instance['sbsl_title'] ) ) {
			$sbsl_title = esc_html( $instance['sbsl_title'] );
		} else {
			$sbsl_title = __('Follow Us', 'sbsl');
		}

		// Get Facebook Link
		if ( isset( $instance['facebook_link'] ) ) {
			$facebook_link = esc_attr( $instance['facebook_link'] );
		} else {
			$facebook_link = '//www.facebook.com';
		}

		// Get Facebook Link
		if ( isset( $instance['twitter_link'] ) ) {
			$twitter_link = esc_attr( $instance['twitter_link'] );
		} else {
			$twitter_link = '//www.twitter.com';
		}

		// Get Facebook Link
		if ( isset( $instance['instagram_link'] ) ) {
			$instagram_link = esc_attr( $instance['instagram_link'] );
		} else {
			$instagram_link = '//www.instagram.com';
		}

		// Get Google Plus Link
		if ( isset( $instance['linkedin_link'] ) ) {
			$linkedin_link = esc_attr( $instance['linkedin_link'] );
		} else {
			$linkedin_link = '//www.linkedin.com';
		}


		// ICONS
		// Facebook Icons
		if ( isset( $instance['facebook_icon'] ) ) {
			$facebook_icon = esc_attr( $instance['facebook_icon'] );
		} else {
			$facebook_icon = plugins_url() . '/sb-social-links/images/facebook.png';
		}

		// Get Twitter Icon
		if ( isset( $instance['twitter_icon'] ) ) {
			$twitter_icon = esc_attr( $instance['twitter_icon'] );
		} else {
			$twitter_icon = plugins_url() . '/sb-social-links/images/twitter.png';
		}

		// Get Instagram Icon
		if ( isset( $instance['instagram_icon'] ) ) {
			$instagram_icon = esc_attr( $instance['instagram_icon'] );
		} else {
			$instagram_icon = plugins_url() . '/sb-social-links/images/instagram.png';
		}

		// Get Linkedin Icon
		if ( isset( $instance['linkedin_icon'] ) ) {
			$linkedin_icon = esc_attr( $instance['linkedin_icon'] );
		} else {
			$linkedin_icon = plugins_url() . '/sb-social-links/images/linkedin.png';
		}

		// Get Icon Widget
		if ( isset( $instance['icon_width'] ) ) {
			$icon_width = esc_attr( $instance['icon_width'] );
		} else {
			$icon_width = '32';
		}

		?>


        <p>
            <label for="<?php echo $this->get_field_id( 'sbsl_title' ); ?>"><?php _e( 'Widget Title', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sbsl_title' ); ?>"
                   name="<?php echo $this->get_field_name( 'sbsl_title' ); ?>"
                   value="<?php echo esc_html( $sbsl_title ); ?>">
        </p>

        <h4><?php _e( 'Facebook', 'sbsl' ); ?></h4>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php _e( 'Facebook Link', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'facebook_link' ); ?>"
                   value="<?php echo esc_attr( $facebook_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_icon' ); ?>"><?php _e( 'Facebook Icon', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook_icon' ); ?>"
                   name="<?php echo $this->get_field_name( 'facebook_icon' ); ?>"
                   value="<?php echo esc_attr( $facebook_icon ); ?>">
        </p>

        <h4><?php _e( 'Twitter', 'sbsl' ); ?></h4>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>"><?php _e( 'Twitter Link', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'twitter_link' ); ?>"
                   value="<?php echo esc_attr( $twitter_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_icon' ); ?>"><?php _e( 'Twitter Icon', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_icon' ); ?>"
                   name="<?php echo $this->get_field_name( 'twitter_icon' ); ?>"
                   value="<?php echo esc_attr( $twitter_icon ); ?>">
        </p>

        <h4><?php _e( 'Instagram', 'sbsl' ); ?></h4>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram_link' ); ?>"><?php _e( 'Instagram Link', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'instagram_link' ); ?>"
                   value="<?php echo esc_attr( $instagram_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram_icon' ); ?>"><?php _e( 'Instagram Icon', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram_icon' ); ?>"
                   name="<?php echo $this->get_field_name( 'instagram_icon' ); ?>"
                   value="<?php echo esc_attr( $instagram_icon ); ?>">
        </p>

        <h4><?php _e( 'Linkedin', 'sbsl' ); ?></h4>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin_link' ); ?>"><?php _e( 'Linkedin Link', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin_link' ); ?>"
                   name="<?php echo $this->get_field_name( 'linkedin_link' ); ?>"
                   value="<?php echo esc_attr( $linkedin_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin_icon' ); ?>"><?php _e( 'Linkedin Icon', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin_icon' ); ?>"
                   name="<?php echo $this->get_field_name( 'linkedin_icon' ); ?>"
                   value="<?php echo esc_attr( $linkedin_icon ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'icon_width' ); ?>"><?php _e( 'Icon Width', 'sbsl' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon_width' ); ?>"
                   name="<?php echo $this->get_field_name( 'icon_width' ); ?>"
                   value="<?php echo esc_attr( $icon_width ); ?>">
        </p>

		<?php
	}

	public function getSocialLinks( $links, $icons, $icon_width ) {
		?>

        <div class="social-links">
            <a href="<?php echo esc_attr( $links['facebook'] ); ?>" target="_blank">
                <img src="<?php echo esc_attr( $icons['facebook'] ); ?>" width="<?php echo esc_attr( $icon_width ); ?>">
            </a>
            <a href="<?php echo esc_attr( $links['twitter'] ); ?>" target="_blank">
                <img src="<?php echo esc_attr( $icons['twitter'] ); ?>" width="<?php echo esc_attr( $icon_width ); ?>">
            </a>
            <a href="<?php echo esc_attr( $links['instagram'] ); ?>" target="_blank">
                <img src="<?php echo esc_attr( $icons['instagram'] ); ?>"
                     width="<?php echo esc_attr( $icon_width ); ?>">
            </a>
            <a href="<?php echo esc_attr( $links['linkedin'] ); ?>" target="_blank">
                <img src="<?php echo esc_attr( $icons['linkedin'] ); ?>" width="<?php echo esc_attr( $icon_width ); ?>">
            </a>
        </div>

		<?php
	}
}