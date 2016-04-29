set :application, 'OpenOrchestraFront'

server 'open_orchestra_front_inte_1-0', roles: %w{web app db env}
set :deploy_to, '/var/www/front-open-orchestra'
