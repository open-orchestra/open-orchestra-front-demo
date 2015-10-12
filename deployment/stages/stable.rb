set :application, 'OpenOrchestraFrontStable'

server 'open_orchestra_front_stable', roles: %w{web app db env}
set :deploy_to, '/var/www/stable-front-open-orchestra'
set :branch, '1.0'