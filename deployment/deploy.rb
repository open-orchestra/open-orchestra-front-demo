set :format, :pretty
set :log_level, :info
set :keep_releases, 2
set :ssh_options, { :forward_agent => true }
set :composer_install_flags, '--no-dev --prefer-dist --no-interaction --optimize-autoloader'
set :linked_files, %w{app/config/parameters.yml}
set :linked_dirs, %w{app/logs web/uploads vendor}

set :repo_url, 'git@github.com:open-orchestra/open-orchestra-front-demo.git'

after 'deploy:finishing', 'deploy:cleanup'
