<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:albisanti/simpleCRM.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
set('use_relative_symlinks', false);
set('ssh_multiplexing', false);
// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('root@65.21.240.251')
    ->set('deploy_path', '/var/www/html');

// Tasks
task('test',function(){
    $rs = run('echo this is a test');
    writeln($rs);
});


task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

