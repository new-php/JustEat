<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'recipe/cloudflare.php';
require 'recipe/npm.php';

// Project name
set('application', 'JustEat');

// Project repository
set('repository', 'git@github.com:UB-ES-2020/JustEat.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Cloudflare data
set('cloudflare', [
    'api_key' => '0da6e3465f481c6fe36b21917b492868fda20',
	'email' => 'xavidejuan@gmail.com',
	'domain' => 'xavidejuan.com'
]);

// Shared files/dirs between deploys 
add('shared_files', [
	'.env',
]);
add('shared_dirs', [
	'bootstrap/cache',
	'storage',
]);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

inventory('hosts.yml');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

task('npm:run', function () {
    run('cd {{release_path}} && npm run prod');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

// Run npm install after code deploy
after('deploy:update_code', 'npm:install');

// Run npm run prod after npm install
after('npm:install', 'npm:run');

// Clears Cloudflare cache after changing the symlink
after('deploy:symlink', 'deploy:cloudflare');
