<?php
declare(strict_types=1);

namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';

set( 'application', 'BLN Academy Theme' );
set( 'keep_releases', 3 );

host( 'production' )
    ->setHostname( getenv( 'PROD_HOSTNAME' ) )
    ->setPort( (int) ( getenv( 'PROD_PORT' ) ?: 22 ) )
    ->setRemoteUser( getenv( 'PROD_USER' ) )
    ->setIdentityFile( '~/.ssh/deploy_key' )
    ->setDeployPath( getenv( 'PROD_DEPLOY_PATH' ) . '/wp-content/themes/bln-academy' );

host( 'staging' )
    ->setHostname( getenv( 'STAGING_HOSTNAME' ) )
    ->setPort( (int) ( getenv( 'STAGING_PORT' ) ?: 22 ) )
    ->setRemoteUser( getenv( 'STAGING_USER' ) )
    ->setIdentityFile( '~/.ssh/deploy_key' )
    ->setDeployPath( getenv( 'STAGING_DEPLOY_PATH' ) . '/wp-content/themes/bln-academy' );

task( 'deploy', [
    'deploy:prepare',
    'deploy:push',
    'deploy:clean',
    'success',
] );

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
            upload( __DIR__ . '/' . $file, '{{release_or_current_path}}/' . $file );
        }
    }

    foreach ( $dirs as $dir ) {
        $localPath = __DIR__ . '/' . $dir;
        if ( is_dir( $localPath ) ) {
            upload( $localPath . '/', '{{release_or_current_path}}/' . $dir . '/' );
        }
    }
} );

after( 'deploy:failed', 'deploy:unlock' );
