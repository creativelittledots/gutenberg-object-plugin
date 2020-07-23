<?php

namespace GutesObjectPlugin;

class ACF {

	public function __construct() {
		foreach(get_post_types(['show_in_rest' => true]) as $post_type) {
			add_filter("rest_prepare_$post_type", [ $this, 'transform_acf_prepare_data' ], 12, 3);
		}
	}
	
	public function transform_acf_prepare_data($data, $post, $context) {
		
		foreach($data->data['editor_blocks'] as &$block) {
			
			$this->transform_acf_prepare_block($block);
			
		}
		
		return $data;
		
	}
	
	public function transform_acf_prepare_block($block) {
		
		$has_acf_blocks = false;
		
		if(strpos($block->name, 'acf/') === 0) {
			
			acf_setup_meta( json_decode(json_encode($block->props), true), $block->id, true );
			
			$block->props = get_fields($block->id);
			
			$has_acf_blocks = true;
			
		}
		
		if(!empty($block->innerBlocks) && is_array($block->innerBlocks)) {
			
			foreach($block->innerBlocks as &$innerBlock) {
				
				$this->transform_acf_prepare_block($innerBlock);
				
			}
			
		}
		
	}

}