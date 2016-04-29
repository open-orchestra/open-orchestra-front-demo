set :application, 'OpenOrchestraFront2'

server 'open_orchestra_front2_inte_1-0', roles: %w{web app db env}
set :deploy_to, '/var/www/front-open-orchestra2'
set :update_dir, 'update-vendor-front_inte'
set :git_project_dir, 'open-orchestra-front-demo'
set :branch, '1.0'
