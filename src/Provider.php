<?php
	
	namespace GutesObjectPlugin;
	
	class Provider {
		
		/**
	     * Boot the service provider.
	     *
	     * @return void
	     */
		public function register() {
			
			if( empty( $GLOBALS['gutenbergObjectPlugin'] ) ) {
			
				GutesObjectPlugin::init();
				
			}
			
			action('after_switch_theme', function() {
			
				(new Database())->activate_gutes_array_save();
				
			});
			
			action('switch_theme', function() {
			
				(new Database())->deactivate_gutes_array_save();
				
			});
			
		}
		
	}