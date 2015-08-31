set :application, 'OpenOrchestraFront2'

server 'open_orchestra_front2_inte', roles: %w{web app db env}
set :deploy_to, '/var/www/front-open-orchestra2'
