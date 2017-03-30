set :application, 'OpenOrchestraFront'

server 'open_orchestra_front_inte_demo', roles: %w{web app db env}
set :deploy_to, '/home/wwwroot/openorchestra/front'
set :branch, 'master'
