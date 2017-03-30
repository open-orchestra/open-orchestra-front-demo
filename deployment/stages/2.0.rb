set :application, 'OpenOrchestraFront'

server 'open_orchestra_front_inte_2-0', roles: %w{web app db env}
set :deploy_to, '/home/wwwroot/openorchestra/front'
set :branch, 'master'
