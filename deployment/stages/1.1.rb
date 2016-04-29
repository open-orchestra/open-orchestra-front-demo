set :application, 'OpenOrchestraFront'

server 'open_orchestra_front_inte_1-1', roles: %w{web app db env}
set :deploy_to, '/var/www/front-open-orchestra'
set :update_dir, 'update-vendor-front-inte'
set :git_project_dir, 'open-orchestra-front-demo'
set :branch, '1.1'
