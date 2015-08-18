set :application, 'OpenOrchestraFront'

server 'open_orchestra_front_inte', roles: %w{web app db}
set :deploy_to, '/var/www/front-open-orchestra'
