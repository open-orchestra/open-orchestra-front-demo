set :application, 'OpenOrchestraFront'

server 'open_orchestra_front_inte_2-0', roles: %w{web app db env}
set :deploy_to, '/home/wwwroot/openorchestra/front'
set :update_dir, 'update-vendor-front-inte'
set :git_project_dir, 'open-orchestra-front-demo'
set :branch, 'master'
