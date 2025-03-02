== Remember to: ==

0) Have both of your ssh-keys in your .ssh directory
1) Run your Apache2 server (make sure the httpd.conf has the directory/document root put to wherever you have the /prisminspace/src folder)
2) Put "localhost/index/index.php" into your browser
3) Run the MYSQL service on Xampp
4) Make sure to import the sql dump into localhost/phpmyadmin for prisminspacedb (import option on the menubar)

Try to work on one file only when making commits to prevent merge conflicts.
Make incremental small commits once you have finished the implementation (even if its not perfect).
Make sure to let your team members know which files you are editin.

git clone git@github.com:pizzaguyapprentice/prisminspace.git

git pull (if you havent already cloned)
git add (file)
git commit -m "(description)"
git push
