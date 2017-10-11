<?php
	class SL_Widget extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'sl_widget',
				__('Social Links Widget', 'sl'),
				[
					'description' => __('A simple way to add social links to your website', 'sl')
				]
			);
		}



		public function widget($args, $instance)
		{
			$links = [
				'facebook'  => esc_attr($instance['facebook_link']),
				'twitter'   => esc_attr($instance['twitter_link']),
				'linkedin'  => esc_attr($instance['linkedin_link']),
				'instagram' => esc_attr($instance['instagram_link']),
			];

			$icons = [
				'facebook'  => esc_attr($instance['facebook_icon']),
				'twitter'   => esc_attr($instance['twitter_icon']),
				'linkedin'  => esc_attr($instance['linkedin_icon']),
				'instagram' => esc_attr($instance['instagram_icon']),
			];

			$icon_width = $instance['icon_width'];

			echo $args['before_widget'];
				echo $this->displaySocialWidget($links, $icons, $icon_width);
			echo $args['after_widget'];
		}



		public function form($instance)
		{
			// Display the form
			echo $this->getAdminForm($instance);
		}



		public function update($new_instance, $old_instance)
		{
			$instance = [
				'facebook_link' => (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '',
				'facebook_icon' => (!empty($new_instance['facebook_icon'])) ? strip_tags($new_instance['facebook_icon']) : '',
				'twitter_link'  => (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '',
				'twitter_icon'  => (!empty($new_instance['twitter_icon'])) ? strip_tags($new_instance['twitter_icon']) : '',
				'linkedin_link' => (!empty($new_instance['linkedin_link'])) ? strip_tags($new_instance['linkedin_link']) : '',
				'linkedin_icon' => (!empty($new_instance['linkedin_icon'])) ? strip_tags($new_instance['linkedin_icon']) : '',
				'instagram_link' => (!empty($new_instance['instagram_link'])) ? strip_tags($new_instance['instagram_link']) : '',
				'instagram_icon' => (!empty($new_instance['instagram_icon'])) ? strip_tags($new_instance['instagram_icon']) : '',
				'icon_width' => (!empty($new_instance['icon_width'])) ? strip_tags($new_instance['icon_width']) : '',
			];
			return $instance;
		}



		// Build up the form
		private function getAdminForm($instance)
		{
			/* 
			*  Get facebook link via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/ 
			if (isset($instance['facebook_link'])) {
				$facebook_link = esc_attr($instance['facebook_link']);
			}else{
				$facebook_link = 'https://www.facebook.com';
			}

			/* 
			*  Get twitter link via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/
			if (isset($instance['twitter_link'])) {
				$twitter_link = esc_attr($instance['twitter_link']);
			}else{
				$twitter_link = 'https://www.twitter.com';
			}

			/* 
			*  Get linkedin link via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/
			if (isset($instance['linkedin_link'])) {
				$linkedin_link = esc_attr($instance['linkedin_link']);
			}else{
				$linkedin_link = 'https://www.linkedin.com';
			}

			/* 
			*  Get instagram link via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/
			if (isset($instance['instagram_link'])) {
				$instagram_link = $instance['instagram_link'];
			}else{
				$instagram_link = 'https://www.instagram.com';
			}

			/* 
			*  Get facebook icon via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/ 
			if (isset($instance['facebook_icon'])) {
				$facebook_icon = $instance['facebook_icon'];
			}else{
				$facebook_icon = plugins_url() . '/social-links/img/facebook.png';
			}

			/* 
			*  Get twitter icon via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/ 
			if (isset($instance['twitter_icon'])) {
				$twitter_icon = $instance['twitter_icon'];
			}else{
				$twitter_icon = plugins_url() . '/social-links/img/twitter.png';
			}

			/* 
			*  Get linkedin icon via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/ 
			if (isset($instance['linkedin_icon'])) {
				$linkedin_icon = $instance['linkedin_icon'];
			}else{
				$linkedin_icon = plugins_url() . '/social-links/img/linkedin.png';
			}

			/* 
			*  Get instagram icon via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/ 
			if (isset($instance['instagram_icon'])) {
				$instagram_icon = $instance['instagram_icon'];
			}else{
				$instagram_icon = plugins_url() . '/social-links/img/instagram.png';
			}

			/* 
			*  Get icon with via the db instance
			*  If it's there, escape and assign
			*  Else - assign a default value
			*/ 
			if (isset($instance['icon_width'])) {
				$icon_width = $instance['icon_width'];
			}else{
				$icon_width = 32;
			}
			?>
				<p>
					<label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Facebook URL', 'sl'); ?></label>
					<input type="text" class="widefat" value="<?php echo esc_attr($facebook_link); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" id="<?php echo $this->get_field_id('facebook_link'); ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('facebook_icon'); ?>"><?php _e('Facebook Icon', 'sl'); ?></label>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook_icon'); ?>" name="<?php echo $this->get_field_name('facebook_icon'); ?>" value="<?php echo esc_attr($facebook_icon); ?>">
				</p>

				<hr>

				<p>
					<label for="<?php echo $this->get_field_id('twitter_link') ?>"><?php _e('Twitter URL', 'sl'); ?></label>
					<input type="text" name="<?php echo $this->get_field_name('twitter_link') ?>" id="<?php echo $this->get_field_id('twitter_link'); ?>" value="<?php echo esc_attr($twitter_link) ?>" class="widefat">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('twitter_icon'); ?>"><?php _e('Twitter Icon', 'sl'); ?></label>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_icon'); ?>" name="<?php echo $this->get_field_name('twitter_icon'); ?>" value="<?php echo esc_attr($twitter_icon); ?>">
				</p>

				<hr>

				<p>
					<label for="<?php echo $this->get_field_id('linkedin_link') ?>"><?php _e('Linkedin URL', 'sl'); ?></label>
					<input type="text" name="<?php echo $this->get_field_name('linkedin_link') ?>" id="<?php echo $this->get_field_id('linkedin_link'); ?>" value="<?php echo esc_attr($linkedin_link) ?>" class="widefat">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('linkedin_icon'); ?>"><?php _e('Linkedin Icon', 'sl'); ?></label>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin_icon'); ?>" name="<?php echo $this->get_field_name('linkedin_icon'); ?>" value="<?php echo esc_attr($linkedin_icon); ?>">
				</p>

				<hr>

				<p>
					<label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Instagram URL', 'sl') ?></label>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" value="<?php echo esc_attr($instagram_link) ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('instagram_icon'); ?>"><?php _e('Instagram Icon', 'sl'); ?></label>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_icon'); ?>" name="<?php echo $this->get_field_name('instagram_icon'); ?>" value="<?php echo esc_attr($instagram_icon); ?>">
				</p>

				<hr>

				<p>
					<label for="<?php echo $this->get_field_id('icon_width'); ?>"><?php _e('Icon Width (px)', 'sl') ?></label>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon_width'); ?>" name="<?php echo $this->get_field_name('icon_width'); ?>" value="<?php echo esc_attr($icon_width) ?>">
				</p>
			<?php
		}



		private function displaySocialWidget($links, $icons, $icon_width)
		{
		 ?>
			<div class="social-links">
				<a href="<?php echo esc_attr($links['facebook']); ?>" target="_blank">
					<img src="<?php echo esc_attr($icons['facebook']); ?>" width="<?php echo esc_attr($icon_width); ?>">
				</a>

				<a href="<?php echo esc_attr($links['twitter']) ?>" target="_blank">
					<img src="<?php echo esc_attr($icons['twitter']); ?>" width="<?php echo esc_attr($icon_width); ?>">
				</a>

				<a href="<?php echo esc_attr($links['linkedin']) ?>" target="_blank">
					<img src="<?php echo esc_attr($icons['linkedin']); ?>" width="<?php echo esc_attr($icon_width); ?>">
				</a>

				<a href="<?php echo esc_attr($links['instagram']) ?>" target="_blank">
					<img src="<?php echo esc_attr($icons['instagram']); ?>" width="<?php echo esc_attr($icon_width); ?>">
				</a>
			</div>
		<?php
		}
	}