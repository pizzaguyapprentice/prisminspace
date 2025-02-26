PRISMINSPACE is a groundbreaking generational apparel website and brand coming to a screen near you soon!

== Follow these steps: ==

1) Run your Apache2 server (make sure the httpd.conf has the
document root put to wherever you have the /prisminspace/src folder)
2) Put "localhost/index/index.php" into your browser

==RESOURCES USED:==

w3schools

==NOT APPLICABLE==
We are using tailwindcss 3.14.17 CLI standalone version,
meaning we only need to install the node package manager
to run tailwindcss without nodejs (cause we don't need
nodejs for the project.) Make sure you have updated npm to
the latest version.

Do not install the default npm
    //npm install -D tailwindcss
    As this is the v4.0 that came out a month ago or so
    And is extremely broken

Install the following:

npm i tailwindcss@3.4.17
npx tailwindcss init //Generates tailwind.config.js

Ctrl-c and Ctrl-v the following to tailwind.config.js
    content: ["./src/**/*.{html,js,php}, ", "./src/*.php"],
You will figure it out yourself how it works.

Created the styles.css and added inside it:
    @tailwind base;
    @tailwind components;
    @tailwind utilities;

Link the php file with <link rel="stylesheet" href="./output.css">

npx @tailwindcss/cli -i ./src/styles.css -o ./src/output.css --watch //To build tailwindcss

