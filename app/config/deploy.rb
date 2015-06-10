set :application, "OpenOrchestra-front-bundle"
set :domain,      "open_orchestra_front_inte"
set :deploy_to,   "/var/www/front-open-orchestra"
set :app_path,    "app"
set :user,        "open_orchestra_front_inte"

set :repository,  "git@github.com:open-orchestra/open-orchestra-front-demo.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

# composer settings
set :composer_bin,      "/usr/local/bin/composer"
set :use_composer,      true
set :update_vendors,    false

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set :keep_releases,  3
set :use_sudo,       false
set :writable_dirs,         ["app/cache", "app/logs"]
set :webserver_user,        "www-data"
set :use_set_permissions,   true

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL
Logger::MAX_LEVEL

# deployment tasks
after "symfony:cache:warmup", "symfony:assetic:dump"
after "symfony:project:clear_controllers", "orchestra:second_symlink"
after "deploy", "orchestra:generate_sitemaps"
after "deploy", "orchestra:generate_robots"

namespace :orchestra do
    desc "Generate sitemap.xml files"
    task :generate_sitemaps do
        capifony_pretty_print "--> Generates all sitemap.xml"
        result = capture("cd #{latest_release} && php app/console -e=prod orchestra:sitemaps:generate")
        puts result
    end

    desc "Generate robots.txt files"
    task :generate_robots do
        capifony_pretty_print "--> Generates all robots.txt"
        result = capture("cd #{latest_release} && php app/console -e=prod orchestra:robots:generate")
        puts result
    end

    desc "Add a second symlink to the current version"
    task :second_symlink do
        run "rm #{latest_release}/../../second_version"
        run "ln -s #{latest_release} #{latest_release}/../../second_version"
        capifony_puts_ok
    end
end
