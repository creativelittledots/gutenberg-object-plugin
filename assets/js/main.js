import { SaveBlock } from './block-save/block-save';
import { SaveFilters } from './save-filters/index.js';
import BlockRegister from './block-register';

if(wp.data) {

	jQuery( document ).ready(function(){
	  new SaveBlock();
	  new SaveFilters();
	  new BlockRegister();
	});
	
}
