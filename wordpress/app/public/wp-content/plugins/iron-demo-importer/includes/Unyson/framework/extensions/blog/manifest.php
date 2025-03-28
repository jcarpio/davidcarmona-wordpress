<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Blog Posts', 'fw' );
$manifest['description'] = __( 'Blog Posts', 'fw' );
$manifest['version'] = '1.0.2';
$manifest['display'] = false;
$manifest['standalone'] = true;

$manifest['github_update'] = 'ThemeFuse/Unyson-Blog-Extension';

$manifest['github_repo'] = 'https://github.com/ThemeFuse/Unyson-Blog-Extension';
$manifest['uri'] = 'http://manual.unyson.io/en/latest/extension/introduction.html#content';
$manifest['author'] = 'ThemeFuse';
$manifest['author_uri'] = 'http://themefuse.com/';
