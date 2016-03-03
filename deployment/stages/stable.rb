set :application, 'OpenOrchestraFrontStable'

server 'open_orchestra_front_stable', roles: %w{web app db env}
set :deploy_to, '/var/www/stable-front-open-orchestra'
set :branch, '1.0'
set :update_dir, 'update-vendor-front-stable'
set :git_project_dir, 'open-orchestra-front-demo'
