server 'open_orchestra_front_inte', roles: %w{web app db}
set :repo_url, 'git@github.com:open-orchestra/open-orchestra-front-demo.git'
set :deploy_to, '/var/www/front-open-orchestra'
