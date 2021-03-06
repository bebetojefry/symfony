set :application, "set your application name here"
set :domain,      "11.11.11.11"
set :user,        "vagrant"
set :use_sudo,   false
set :deploy_to,   "/vagrant"
set :app_path,    "app"

set :repository,  "file:///Library/WebServer/Documents/Symfony"
set :deploy_via,  :copy
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :shared_files,        [app_path+"/config/parameters.yml"]
set  :shared_children,     [app_path+"/logs"]

set  :user_composer,       true
set  :update_vendors,      true   

set  :keep_releases,  3

task :upload_parameters do
  origin_file = "app/config/parameters.yml"
  destination_file = shared_path + "/app/config/parameters.yml" # Notice the
  shared_path

  try_sudo "mkdir -p #{File.dirname(destination_file)}"
  top.upload(origin_file, destination_file)
end

after "deploy:setup", "upload_parameters"

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL