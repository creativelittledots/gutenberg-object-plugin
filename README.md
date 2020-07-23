# Gutenberg Object Plugin

The purpose of this plugin is to save Gutenberg (New WordPress Editor) data as an array in the database which is accessible via the REST API.

Forked from [royboy789](https://github.com/royboy789/gutenberg-object-plugin), this plugin is intended for to be used with [Rest-Kit](https://github.com/wp-kit/rest-kit). This plugin adds in some ACF support too with a predictable and useful JSON output. It's similar to acf-to-rest-api plugin but applies to Blocks. 

## Installation (With Rest-Kit)
* Run `composer require wp-kit/gutenberg-object-plugin`
* Add `'GUTENBERG_OBJECT_PLUGIN_CPTS' => 'page'` to `resources/config/constants.config.php`
* Add `GutesObjectPlugin\Provider::class` to `resources/config/providers.config.php`

## Installation (Wordpress)
* Download Zip and upload to Wordpress plugin directory
* Add `define('GUTENBERG_OBJECT_PLUGIN_CPTS', 'page');` to `functions.php`
* Add `(new GutesObjectPlugin\Provider)->register();` to `functions.php`

## Database
Data will be saved in a new database table `[prefix]_gutes_arrays`

## JSON
Block data gets appended `editor_blocks` on the normal page/post responses.

## Endpoints
Includes 1 new route:  
* `wp-json/gutes-db/v1/[post-id]` - Supports __GET__ & __POST__
* `wp-json/gutes-db/v1/[post-id]/revisions` - Supports __GET__ only 

### GET  
`GET: wp-json/gutes-db/v1/[post-id]`
__Returns__
* __is_gutes__: Is the post created with Gutenberg
* __post_id__: Post ID
* __data__: Gutenberg Data
* ___embedded['post']__: _optional with \_embed_ - response from WP REST API for post 
