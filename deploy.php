<?php
declare(strict_types=1);

namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';

require 'recipe/common.php';

set( 'application', 'BLN Academy Theme' );
set( 'keep_releases', 3 );
set( 'repository', 'https://github.com/yahyaayman111/bln-academy.git' );

function env( string $name ): string {
    $value = getenv( $name );
    return ( $value === false || $value === '' ) ? '' : $value;
}

host( 'production' )
    ->setHostname( env( 'PROD_HOSTNAME' ) )
    ->setPort( (int) ( env( 'PROD_PORT' ) ?: 22 ) )
    ->setRemoteUser( env( 'PROD_USER' ) )
    ->setIdentityFile( '~/.ssh/deploy_key' )
    ->setDeployPath( env( 'PROD_DEPLOY_PATH' ) . '/wp-content/themes/bln-academy' );

host( 'staging' )
    ->setHostname( env( 'STAGING_HOSTNAME' ) )
    ->setPort( (int) ( env( 'STAGING_PORT' ) ?: 22 ) )
    ->setRemoteUser( env( 'STAGING_USER' ) )
    ->setIdentityFile( '~/.ssh/deploy_key' )
    ->setDeployPath( env( 'STAGING_DEPLOY_PATH' ) . '/wp-content/themes/bln-academy' );

task( 'deploy:update_code', function () {
    // No-op: we use deploy:push to upload files directly
} );

task( 'deploy:env', function () {
    // No-op: we don't use .env files for WordPress theme
} );

task( 'deploy:vendors', function () {
    // No-op: no composer dependencies
} );

task( 'deploy:shared', function () {
    // No-op: no shared files
} );

task( 'deploy:writable', function () {
    // No-op: standard file permissions are fine
} );

task( 'deploy:push', function () {
    $files = [
        'style.css',
        'index.php',
        'page.php',
        'header.php',
        'footer.php',
        'functions.php',
    ];

    $dirs = [
        'assets',
        'template-parts',
    ];

    foreach ( $files as $file ) {
        if ( file_exists( __DIR__ . '/' . $file ) ) {
            upload( __DIR__ . '/' . $file, '{{release_path}}/' . $file );
        }
    }

    foreach ( $dirs as $dir ) {
        $localPath = __DIR__ . '/' . $dir;
        if ( is_dir( $localPath ) ) {
            upload( $localPath . '/', '{{release_path}}/' . $dir . '/' );
        }
    }
} );

after( 'deploy:release', 'deploy:push' );

after( 'deploy:failed', 'deploy:unlock' );
