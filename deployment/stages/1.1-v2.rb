set :application, 'OpenOrchestraFront2'

server 'open_orchestra_front2_inte_1-1', roles: %w{web app db env}
set :deploy_to, '/var/www/front-open-orchestra2'
set :update_dir, 'update-vendor-front-inte2'
set :git_project_dir, 'open-orchestra-front-demo'
set :branch, 'master'
